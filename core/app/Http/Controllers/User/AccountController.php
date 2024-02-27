<?php

namespace App\Http\Controllers\User;

use App\{
    Http\Requests\UserRequest,
    Http\Controllers\Controller,
    Repositories\Front\UserRepository
};
use App\Helpers\ImageHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Item;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{

    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\UserRepository $repository
     *
     */
    public $repository;
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->middleware('localize');
        $this->repository = $repository;
    }

    public function index()
    {

        if (auth()->user()->change_pass == 1) {

        return view('user.dashboard.dashboard', [
            'allorders' => Order::whereUserId(Auth::user()->id)->count(),
            'products' => Item::with('category')->where('is_type', '!=', 'feature')->whereStatus(1),

            'pending' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('pending')->count(),
            'progress' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('In Progress')->count(),
            'delivered' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('Delivered')->count(),
            'canceled' => Order::whereUserId(Auth::user()->id)->whereOrderStatus('Canceled')->count()

        ]);
    }
    else{
    Session::flash('error', __('Your Password is Not Set Yet, Kindly Set the Password First'));
        return redirect()->route('user.profile')->withInput();
    }
    }


   
  public function profile()
    {
        $user = Auth::user();
        $check_newsletter = Subscriber::where('email',$user->email)->exists();
        return view('user.dashboard.index',[
            'user' => $user,
            'check_newsletter' => $check_newsletter,
        ]);
    }



    public function profileUpdate(Request $request)
    {

         $request->validate([
            'change_pass'   => 'exists:users,change_pass',
            'first_name' => 'required|max:35',
            'last_name' => 'required|max:35',
            'phone'      => ['required', 'digits:10'],
        'password'      => 'required_without:change_pass',


        ]);

         $user =  Auth::user();
        $input = $request->all();


               $user =  Auth::user();
                $user->first_name = $request->first_name;
                $user->last_name  = $request->last_name;
                $user->phone      = $request->phone;


                    if($request->password){
            $input['password'] = bcrypt($input['password']);
            $user->password = $input['password'];
            $user->update();
        }


        if ($file = $request->file('photo')) {
            $input['photo'] = ImageHelper::handleUpdatedUploadedImage($file,'/assets/images',$user,'/assets/images/','photo');
        }

        if($request->newsletter){
            if(!Subscriber::where('email',$user->email)->exists()){
                Subscriber::insert([
                    'email' => $user->email
                ]);
            }
        }else{
            Subscriber::where('email',$user->email)->delete();
        }
                 $user->change_pass      = 1;
                $user->save();
        Session::flash('success', __('Profile Updated Successfully.'));
        return redirect()->route('user.profile', ['token' => $request->email_token])->withInput();;
    }

    public function addresses()
    {
        $user = Auth::user();
        return view('user.dashboard.address', [
            'user' => $user
        ]);
    }

    public function billingSubmit(Request $request)
    {

        $request->validate([
            'bill_address1' => 'required|max:100',
            'bill_address2' => 'nullable|max:100',
            'bill_zip'      => 'nullable|max:100',
            'bill_city'      => 'required|max:100',
        ]);
        $user =  Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('success', __('Address update successfully'));
        return back();
    }

    public function shippingSubmit(Request $request)
    {
        $request->validate([
            'ship_address1' => 'required|max:100',
            'ship_address2' => 'nullable|max:100',
            'ship_zip'      => 'nullable|max:100',
            'ship_city'      => 'required|max:100',
        ]);
        $user =  Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('success', __('Address update successfully'));
        return back();
    }


    public function removeAccount()
    {
        $user = User::where('id', Auth::user()->id)->first();
        ImageHelper::handleDeletedImage($user, 'photo', 'assets/images/');
        $user->delete();
        Session::flash('success', __('Your account successfully remove'));
        return redirect(route('front.index'));
    }
}
