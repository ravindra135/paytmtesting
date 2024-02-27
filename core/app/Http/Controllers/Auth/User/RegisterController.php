<?php

namespace App\Http\Controllers\Auth\User;


use App\{
    Http\Requests\UserRequest,
    Http\Controllers\Controller,
    Repositories\Front\UserRepository
};
use App\Models\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{


 public function __construct(UserRepository $repository)
    {

                $this->repository = $repository;

        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);

        $setting = Setting::first();
        if($setting->recaptcha == 1){
            Config::set('captcha.sitekey', $setting->google_recaptcha_site_key);
            Config::set('captcha.secret', $setting->google_recaptcha_secret_key);
        }
    }

    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\UserRepository $repository
     *
     */
    


    public function showForm()
    {
      return view('user.auth.register');
    }


    public function register(UserRequest $request)
    {   
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $this->repository->register($request);
                Session::flash('success', __('A Verifcation link send to your email address please check your email address'));

        return redirect()->back();
        
    }
    


    public function verify($token)
    {

          $verifyUser = User::where('email_token', $token)->first();

    $message = 'Sorry your email cannot be identified' ;
//   dd($verifyUser);
    if(!is_null($verifyUser) ){
        $user = $verifyUser->user;
        //   dd($user );
          if($verifyUser->is_verified==null)         {
            $verifyUser->is_verified = 1;
            $verifyUser->email_token = null;

      $verifyUser->save();
      Auth::login($verifyUser);             
            Session::flash('success', __('Thank you for activating your email, please update your profile with password'));
        return redirect()->route('user.profile');
        } 

        else {
            $message = "Your e-mail is already verified.";
            Session::flash('error', __('Your e-mail is already verified.'));

        return redirect()->back();
        }
    }


    else{
                    Session::flash('error', __('Email Cannot be Verified'));

            return redirect(route('user.login'));
        }

    
}
}
