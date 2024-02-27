@extends('master.front')

@section('title')
    {{__('Billing')}}
@endsection

@section('content')

<div class="breadcum_oddk_category ">

    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
          <li class="separator"></li>

            @if(Auth::user())
          <li>{{__('Billing address')}}</li>
          @else
 <li>Guest Checkout</li>
    @endif
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1 checkut-page">
<!--<div class="col-md-10 offset-md-1"> -->
      <!-- Billing Adress-->
            <div class="row">

      <div class="col-xl-9 col-lg-8">
        <div class="steps flex-sm-nowrap mb-3"><a class="step active" href="{{route('front.checkout.billing')}}">
          <h4 class="step-title">1. {{__('Billing Address')}}</h4>
          </a><a class="step" href="javascript:;">
          <h4 class="step-title">2. {{__('Shipping Address')}}:</h4>
          </a><a class="step" href="{{route('front.checkout.payment')}}">
          <h4 class="step-title">3. {{__('Review and pay')}}</h4>
          </a>
        </div>
        <div class="card">
            <div class="card-body">
                @if(!Auth::user())
<p class="mb-3">Have an account?   <a href="{{'/user/login'}}"><b>Log in</b></a> 
 <br/></p>
                @endif
                <h6>{{__('Billing Address')}}</h6>

          <form id="checkoutBilling" action="{{route('front.checkout.store')}}" method="POST">
            @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-fn">First Name</label>
              <input class="form-control" name="bill_first_name" type="text" required id="checkout-fn" value="{{isset($user) ? $user->first_name : ''}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-ln">Last Name</label>
              <input class="form-control" name="bill_last_name" type="text" required id="checkout-ln" value="{{isset($user) ? $user->last_name : ''}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout_email_billing">{{__('E-mail Address')}}</label>


                            <input  class="form-control" name="bill_email"  type="email" required id="checkout_email_billing" value="{{isset($user) ? $user->email : ''}}">

            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-phone">{{__('Phone Number')}}</label>
              <input class="form-control" name="bill_phone" type="phone" id="checkout-phone" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits phone number" required value="{{isset($user) ? $user->phone : ''}}">
            </div>
          </div>
        </div>
        @if (PriceHelper::CheckDigital())
       
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address1">{{__('Address')}} 1</label>
              <input class="form-control" name="bill_address1" required type="text" id="checkout-address1" value="{{isset($user) ? $user->bill_address1 : ''}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-address2">{{__('Address')}} 2/Locality</label>
              <input class="form-control" name="bill_address2" type="text" id="checkout-address2" value="{{isset($user) ? $user->bill_address2 : ''}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">

 <label for="checkout-zip">{{__('Pin Code')}}</label>
              <input class="form-control" name="bill_zip" type="phone" id="checkout-zip" maxlength="6" pattern="\d{06}" title="Please enter exactly 6 digits PIN Code" required value="{{isset($user) ? $user->bill_zip : ''}}">

            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="checkout-city">{{__('City')}}</label>
              <input class="form-control" name="bill_city" type="text" required id="checkout-city" value="{{isset($user) ? $user->bill_city : ''}}">
            </div>
          </div>
        </div>
       
        @endif




        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="same_address" name="same_ship_address" {{Session::has('shipping_address') ? 'checked' : ''}} >
            <label class="custom-control-label" for="same_address">{{__('Same as billing address')}}</label>
          </div>
        </div>

        @if ($setting->is_privacy_trams == 1)
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="trams__condition" >
            <label class="custom-control-label" for="trams__condition">This site is protected by reCAPTCHA and the <a href="{{$setting->policy_link}}" target="_blank">Privacy Policy</a> and <a href="{{$setting->terms_link}}" target="_blank">Terms of Service</a> apply.</label>
          </div>
        </div>
        @endif

        <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <a class="btn btn-primary btn-sm" href="{{route('front.cart')}}"><span class="hidden-xs-down"><i class="icon-arrow-left"></i>{{__('Back To Cart')}}</span></a>
            @if ($setting->is_privacy_trams == 1)
            <button disabled id="continue__button" class="btn btn-primary  btn-sm" type="button"><span class="hidden-xs-down">{{__('Continue')}}</span><i class="icon-arrow-right"></i></button>
            @else
            <button class="btn btn-primary btn-sm" type="submit"><span class="hidden-xs-down">{{__('Continue')}}</span><i class="icon-arrow-right"></i></button>
            @endif
          </div>
        </form>
            </div>
        </div>
      </div>
      <!-- Sidebar          -->
      @include('includes.checkout_sitebar',$cart)
    </div>
        <!--</div> -->

  </div>
@endsection
