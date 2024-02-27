@extends('master.front')
@section('title')
    {{__('Password Reset')}}
@endsection
@section('content')
<!-- Page Title-->
<div class="breadcum_oddk_category ">

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
                    <li class="separator"></li>
                    <li>{{__('Forgot Password')}}</li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <form class="card mt-4" method="POST" action="{{route('user.forgot.submit')}}">
                @csrf
              <div class="card-body login_form">
                <div class="form-group">
                <h4 class="d-block mb-4">{{__('Forgot Your Password')}}</h4>
                  <label for="email-for-pass">{{__('Enter your email address')}}</label>
                  <input class="form-control" type="text" name="email" required id="email-for-pass" placeholder="{{__('Enter your email address')}}">
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <small class="text-muted">{{__('Type in the email address you used when you registered with our website')}}</small>
                </div>
                <button class="btn btn-primary " type="submit"><span>{{__('Get New Password')}}</span></button>
                <a href="{{route('user.login')}}" class="btn btn-info" ><span><i class="fa fa-lock"></i> {{__('Login')}}</span></a>
              </div>
            </form>
          </div>
        </div>
  </div>
@endsection
