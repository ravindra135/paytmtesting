@extends('master.front')
@section('title')
    {{__('Regsiter')}}
@endsection
@section('content')


<div class="breadcum_oddk_category ">

    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
                <li class="separator"></li>
                <li>{{__('Login/Register')}}</li>
              </ul>
          </div>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-2x mb-1">
  <div class="row">

          <div class="col-md-6 offset-md-3">
            <div class="card register-area">
                <div class="card-body login_form">
                    <h4 class="margin-bottom-1x ">{{__('Register')}} </h4>
            <form class="row" action="{{route('user.register.submit')}}" method="POST">
                @csrf
             
              <div class="col-sm-12">
                <div class="form-group">
                  <input required class="form-control" type="email" name="email" placeholder="{{__('E-mail Address')}}" id="reg-email" value="{{old('email')}}">
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @endif
                </div>
              </div> 
                @if ($setting->recaptcha == 1)
              <div class="col-lg-12 mb-4">
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                  @if ($errors->has('g-recaptcha-response'))
                  @php
                      $errmsg = $errors->first('g-recaptcha-response');
                  @endphp
                  <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                  @endif
              </div>
              @endif
              <div class="col-12">
                <button class="btn btn-primary margin-bottom-none" type="submit"><span>{{__('Register')}}</span></button>

                <a href="{{route('user.login')}}" class="btn btn-info" ><span><i class="fa fa-lock"></i> {{__('Login')}}</span></a>
              </div>
            </form>
                </div>
            </div>
          </div>
        </div>
  </div>
  <!-- Site Footer-->
@endsection
