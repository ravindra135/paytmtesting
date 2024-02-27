<?php

namespace App\Http\Controllers\Back;

use App\{
    Models\Order,
    Models\PromoCode,
    Models\TrackOrder,
            Models\Transaction,

     Models\UserOrderStatus,
    Http\Controllers\Controller,
        Models\User,
    Models\Setting,
    Helpers\EmailHelper,
};
use App\Helpers\SmsHelper;
use App\Models\Notification;
use Carbon\Carbon;
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
        $this->middleware('auth:admin');
        $this->middleware('adminlocalize');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->type) {
            if ($request->start_date && $request->end_date) {
                $datas = $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
                $datas = Order::latest('id')->whereOrderStatus($request->type)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
            } else {
                $datas = Order::latest('id')->whereOrderStatus($request->type)->get();
            }
        } else {
            if ($request->start_date && $request->end_date) {
                $datas = $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
                $datas = Order::latest('id')->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
            } else {
                $datas = Order::latest('id')->get();
            }
        }
        return view('back.order.index', compact('datas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('back.order.invoice', compact('order', 'cart'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printOrder($id)
    {
        $order = Order::findOrfail($id);
        $cart = json_decode($order->cart, true);
        return view('back.order.print', compact('order', 'cart'));
    }


    /**
     * Change the status for editing the specified resource.
     *
     * @param  int  $id
     * @param  string  $field
     * @param  string  $value
     * @return \Illuminate\Http\Response
     */
    public function status($id, $field, $value)
    {
        $order = Order::find($id);
        if ($field == 'payment_status') {
            if ($order['payment_status'] == 'Paid') {
                return redirect()->route('back.order.index')->withErrors(__('Order is already paid.'));
            }
        }
        if ($field == 'order_status') {
            if ($order['order_status'] == 'Deliveredd') {
                return redirect()->route('back.order.index')->withErrors(__('Order is already Delivered.'));
            }
        }
        $order->update([$field => $value]);
        if ($order->payment_status == 'Paid') {
            $this->setPromoCode($order);
        }
        $message = $this->setTrackOrder($order);
        if($message!=""){
            return redirect()->route('back.order.index')->withErrors(__($message));
        }
        $sms = new SmsHelper();
        $user_number = $order->user->phone;
        if ($user_number) {
            $sms->SendSms($user_number, "'order_status'", $order->transaction_number);
        }

        return redirect()->route('back.order.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Custom Function
     */
    public function setTrackOrder($order)
    {


        if ($order->order_status == 'In Progress') {

              
            if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                $response = $this->shipRocketPlaceOrder($order);
                if(isset($response["status_code"]) && $response["status_code"] == 1 && $response["status"] == "NEW"){
                    $order->shiprocket_response_order_id = $response["order_id"];


                    $order->save();


       $user = User::where('id', $order->user_id)->first();

        $emailData = [
            'to' => $user->email,
            'type' => "Shiprocket",
            'user_name' => $user->first_name,
            'track_id' => $order->shiprocket_response_order_id,
            'site_title' => Setting::first()->title,
        ];


        $email = new EmailHelper();
        $email->Shiprocket($emailData);

                    TrackOrder::create([
                        'title' => 'In Progress',
                        'order_id' => $order->id
                    ]);
                }else{
                    return $response["message"];

                }
            }
        }


        /* Returned order */

              if ($order->order_status == 'Return') {
                $response = $this->shipRocketReturnOrder($order);

               
                if(isset($response["status_code"]) && $response["status_code"] == 21 && $response["status"] == "RETURN PENDING"){
                    $order->shiprocket_response_order_id = $response["order_id"];
                    $order->save(); 


    if (UserOrderStatus::where('order_id', '=', $order->id)->exists() ){

    $order_status_up =UserOrderStatus::where('order_id', $order->id)->first();

          $order_status_up->admin_status = 'Returned';
          $order_status_up->save();

}
       $user = User::where('id', $order->user_id)->first();

        $emailData = [
            'to' => $user->email,
            'type' => "ShiprocketReturn",
            'user_name' => $user->first_name,
            'track_id' => $order->shiprocket_response_order_id,
            'site_title' => Setting::first()->title,
        ];
        $email = new EmailHelper();
        $email->ShiprocketReturn($emailData);
 
                }else{
                    return $response["message"];

                }
           
        }

        /* Returned order */
        if ($order->order_status == 'Canceled') {



                $this->shipRocketCancelOrder($order->shiprocket_response_order_id);

      
           if (UserOrderStatus::where('order_id', '=', $order->id)->exists() ){

    $order_status_up =UserOrderStatus::where('order_id', $order->id)->first();

          $order_status_up->admin_status = 'Canceled';
          $order_status_up->save();



}
                if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                    TrackOrder::create([
                        'title' => 'In Progress',
                        'order_id' => $order->id
                    ]);
                }
                if (!TrackOrder::whereOrderId($order->id)->whereTitle('Delivered')->exists()) {
                    TrackOrder::create([
                        'title' => 'Delivered',
                        'order_id' => $order->id
                    ]);
                }

                if (!TrackOrder::whereOrderId($order->id)->whereTitle('Canceled')->exists()) {
                    TrackOrder::create([
                        'title' => 'Canceled',
                        'order_id' => $order->id
                    ]);


                }
            
        }

        if ($order->order_status == 'Delivered') {

            if (!TrackOrder::whereOrderId($order->id)->whereTitle('In Progress')->exists()) {
                TrackOrder::create([
                    'title' => 'In Progress',
                    'order_id' => $order->id
                ]);
            }

            if (!TrackOrder::whereOrderId($order->id)->whereTitle('Delivered')->exists()) {
                TrackOrder::create([
                    'title' => 'Delivered',
                    'order_id' => $order->id
                ]);
            }
        }
    }


public function cancellation_return(Request $request)
    {


        $datas = UserOrderStatus::latest('id')->get();

        return view('back.order.cancellation_return', compact('datas'));
    }
    public function setPromoCode($order)
    {

        $discount = json_decode($order->discount, true);
        if ($discount != null) {
            $code = PromoCode::find($discount['code']['id']);
            $code->no_of_times--;
            $code->update();
        }
    }


    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->tranaction->delete();
        if (Notification::where('order_id', $id)->exists()) {
            Notification::where('order_id', $id)->delete();
        }
        if (count($order->tracks_data) > 0) {
            foreach ($order->tracks_data as $track) {
                $track->delete();
            }
        }
        $order->delete();
        return redirect()->back()->withSuccess(__('Order Deleted Successfully.'));
    }

     public function cancellation_return_delete($id)
    {
        $return_delete = UserOrderStatus::findOrFail($id);
       
       
        $return_delete->delete();
        return redirect()->back()->withSuccess(__('Item Deleted Successfully.'));
    }

    function  shipRocketToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n    \"email\": \"vickyaggarwal74@gmail.com\",\n    \"password\": \"vickyaggarwal7476%#\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));
        $SR_login_Response = curl_exec($curl);
        curl_close($curl);
        $SR_login_Response_out = json_decode($SR_login_Response);
        return $SR_login_Response_out->{'token'};
    }

    function shipRocketPlaceOrder($order)
    {

        $transaction = Transaction::where('order_id', $order->id)->first();
        $token = $this->shipRocketToken();
        $order_date_str=$order->created_at;
        $order_date_str=strtotime($order_date_str);
        $order_date=date('Y-m-d h:i',$order_date_str);
        $cart = json_decode($order->cart,true);
        $shipping_info = json_decode($order->shipping_info,true);
        $billing_info = json_decode($order->billing_info,true);
        $cart_items='';
        foreach($cart as $cart_item){
            $sku=rand(111111,999999);
            $cart_items.='{
              "name": "'.$cart_item['name'].'",
              "sku": "'.$sku.'",
              "units": '.$cart_item['qty'].',
              "selling_price": '.$cart_item['price'].',
              "discount": "",
              "tax": "",
              "hsn": ""
            },';
        }
        $cart_items=rtrim($cart_items,",");
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{
            "order_id": "'.$order->id.'",
            "order_date": "'.$order_date.'",
            "pickup_location": "NISA VILLA",
            "billing_customer_name": "'.$billing_info["bill_first_name"].'",
            "billing_last_name": "'.$billing_info["bill_last_name"].'",
            "billing_address": "'.$billing_info["bill_address1"].'",
            "billing_address_2": "'.$billing_info["bill_address2"].'",
            "billing_city": "'.$billing_info["bill_city"].'",
            "billing_pincode": "'.$billing_info["bill_zip"].'",
            "billing_state": "'.$billing_info["bill_city"].'",
            "billing_country": "India",
            "billing_email": "'.$billing_info["bill_email"].'",
            "billing_phone": "'.$billing_info["bill_phone"].'",
            "shipping_is_billing": true,
            "shipping_customer_name": "'.$shipping_info["ship_first_name"].'",
            "shipping_last_name": "'.$shipping_info["ship_last_name"].'",
            "shipping_address": "'.$shipping_info["ship_address1"].'",
            "shipping_address_2": "'.$shipping_info["ship_address2"].'",
            "shipping_city": "'.$shipping_info["ship_city"].'",
            "shipping_pincode": "'.$shipping_info["ship_zip"].'",
            "shipping_country": "India",
            "shipping_state": "'.$shipping_info["ship_city"].'",
            "shipping_email": "'.$shipping_info["ship_email"].'",
            "shipping_phone": "'.$shipping_info["ship_phone"].'",
            "order_items": [
                '.$cart_items.'
            ],
            "payment_method": "'.$order->payment_method.'",
            "shipping_charges": 0,
            "giftwrap_charges": 0,
            "transaction_charges": 0,
            "total_discount": 0,
           "sub_total": "'.$transaction->amount.'",
            "length": 1,
            "breadth": 1,
            "height": 1,
            "weight": 1
            }',
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer $token"
            ),
        ));
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $response;
    }


    function shipRocketReturnOrder($order)
    {

        $transaction = Transaction::where('order_id', $order->id)->first();
        $token = $this->shipRocketToken();

$todayDate = Carbon::now()->format('Y-m-d H:i:s');
   
       // $order_date_str=strtotime($order_date_str);
       // $order_date=date('Y-m-d h:i',$order_date_str);
        $cart = json_decode($order->cart,true);
        $shipping_info = json_decode($order->shipping_info,true);

        $discount = json_decode($order->discount,true);
        $cart_items='';
        foreach($cart as $cart_item){
            $sku=rand(111111,999999);
            $cart_items.='{
             "name": "'.$cart_item['name'].'",
              "sku": "'.$sku.'",
              "units": '.$cart_item['qty'].',
              "selling_price": '.$cart_item['price'].',
              "discount": "",
              "tax": "",
              "hsn": ""

            },';
        }
        $cart_items=rtrim($cart_items,",");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/return',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{

  "order_id": "'.$order->id.'ReturnOrder",
  "order_date": "'.$todayDate.'", 
  "channel_id": "",
  "pickup_customer_name": "'.$shipping_info["ship_first_name"].'",
  "pickup_last_name": "'.$shipping_info["ship_last_name"].'",
  "company_name":"",
  "pickup_address": "'.$shipping_info["ship_address1"].'",
  "pickup_address_2": "'.$shipping_info["ship_address2"].'",
  "pickup_city": "'.$shipping_info["ship_city"].'",
  "pickup_state":"'.$shipping_info["ship_city"].'",
  "pickup_country": "India",
  "pickup_pincode": '.$shipping_info["ship_zip"].',
  "pickup_email": "'.$shipping_info["ship_email"].'",
  "pickup_phone": "'.$shipping_info["ship_phone"].'",
  "pickup_isd_code": "91",
  "shipping_customer_name": "Sakhil",
  "shipping_last_name": "Khan",
  "shipping_address": "0, Nisa Villa, Coffee House Road",
  "shipping_address_2": "Sabzibagh, Ashok Rajpath, Bankipore",
  "shipping_city": "Patna",
  "shipping_country": "India",
  "shipping_pincode": 800004,
  "shipping_state": "Bihar",
  "shipping_email": "tqpl@timesquartz.com",
  "shipping_isd_code": "91",
  "shipping_phone": 9304893084,
   "order_items": [
                '.$cart_items.'
            ],
             "payment_method": "'.$order->payment_method.'",

  "total_discount": "0",
 "sub_total": '.$transaction->amount.',
  "length": 1,
  "breadth": 1,
  "height": 1,
  "weight": 1

}',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
                "Authorization: Bearer $token"
  ),
));

$response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $response;

    }


    function shipRocketCancelOrder($orderId) {
        $token = $this->shipRocketToken();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n  \"ids\": [".intval($orderId)."]\n}",
            CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "Authorization: Bearer $token"
            ),
        ));
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $response;
    }
}
