@extends('master.front')
@section('title')
    {{__('Login')}}
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
            <form class="card" method="post" action="{{route('user.login.submit')}}">
                @csrf
              <div class="card-body login_form">
                <h4 class="margin-bottom-1x ">{{__('Login')}}</h4>

                <div class="form-group input-group">
                  <input required class="form-control" type="email" name="login_email" placeholder="{{ __('Email') }}" value="{{old('login_email')}}"><span class="input-group-addon"><i class="icon-mail"></i></span>
                </div>
                @error('login_email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror

                <div class="form-group input-group">
                  <input required class="form-control" type="password" name="login_password" placeholder="{{ __('Password') }}" ><span class="input-group-addon"><i class="icon-lock"></i></span>
                </div>
                @error('login_password')
                    <p class="text-danger">{{$message}}</p>
                @enderror

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

           
                <div class="">
                  <button class="btn btn-primary margin-bottom-none" type="submit"><span>{{ __('Login') }}</span></button>
                </div>

                    <br/>
                 <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="remember_me">
                    <label class="custom-control-label" for="remember_me">{{__('Remember me')}}</label> 
                      
                  </div>


<a class="navi-link registe" href="{{url('user/register')}}"><b><i class="icon-user"></i> Register Now</b></a>
                  <a class="navi-link" href="{{route('user.forgot')}}">{{__('Forgot password?')}}</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt-3">
                    @if($setting->facebook_check == 1)
                    <a class="facebook-btn mr-2" href="{{route('social.provider','facebook')}}">{{ __('Facebook login') }}
                    </a>
                    @endif
                    @if($setting->google_check == 1)
                    <a class="google-btn" href="{{route('social.provider','google')}}"> {{ __('Google login') }}
                    </a>
                    @endif
                  </div>
                  </div>
              </div>
            </form>
          </div>
        
        </div>
  </div>
  <!-- Site Footer-->
@endsection
