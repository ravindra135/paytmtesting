<?php

namespace App\Http\Controllers\User;

use App\{
    Models\Order,
    Models\TrackOrder,
         Models\UserOrderStatus,

    Http\Controllers\Controller,
};
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('localize');

    }

    public function index()
    {
        $orders = Order::whereUserId(Auth::user()->id)->latest('id')->get();
        return view('user.order.index',compact('orders'));
    }

  
    public function details($id)
    {
        $user = Auth::user();
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('user.order.invoice',compact('user','order','cart'));
    }

    public function printOrder($id)
    {
        $user = Auth::user();
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('user.order.print',compact('user','order','cart'));
    }

     public function cancel($id)
    {
        $user = Auth::user();
        $order = Order::findOrfail($id);
       
        return view('user.order.cancel',compact('user','order','id'));
    }



      public function submit_cancel(Request $request)
    {

 if (UserOrderStatus::where('order_id', '=', $request->order_id)->exists() ){
 Session::flash('error',__('Product Already Cancelled & Notified to Company, We will let you know'));
                    return redirect()->back();
 }
 else{
        $request->validate([
            'reason' => 'required|max:50',
        ]);

          $item = new UserOrderStatus;
          $item->user_id = Auth::user()->id;
           $item->order_id = $request->order_id;
          $item->status = 1;
          $item->reason =  $request->reason;
          $item->notes = $request->notes;
          $item->save();


        return redirect()->route('user.order.index')->withSuccess(__('Submitted Successfully.'));
    }
}

 public function return($id)
    {
       
        $order = Order::findOrfail($id);
       
        return view('user.order.return',compact('order','id'));
    }

     public function submit_return(Request $request)
    {

 if (UserOrderStatus::where('order_id', '=', $request->order_id)->exists() ){
 Session::flash('error',__('Product Already Returned & Notified to Company, We will let you know'));
                    return redirect()->back();
 }
 else{
        $request->validate([
            'reason' => 'required|max:50',
        ]);

          $item = new UserOrderStatus;
          $item->user_id = Auth::user()->id;
           $item->order_id = $request->order_id;
          $item->status = 2;
          $item->reason =  $request->reason;
          $item->notes = $request->notes;
          $item->save();


        return redirect()->route('user.order.index')->withSuccess(__('Submitted Successfully.'));
    }
}

}
