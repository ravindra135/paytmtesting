@extends('master.back-login')

@section('content')
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src=" {{asset('assets/images/times-quartz-admin.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="{{ route('back.login.submit') }}" method="POST">

                         @csrf
<h4 class="text-center"><b>TimesQuartz</b></h4>
<h5 class="text-center"> Admin Panel</h5>

<br/>
                        @include('alerts.alerts')
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>

                          <input id="username" name="login_email" type="email" class="form-control input_user" value="{{ old('login_email') }}"  placeholder="Enter Email Address">

                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                         <input id="password" name="login_password" type="password" class="form-control input_pass" placeholder="Password">

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center mt-3 login_container">

                                                <button type="submit" class="btn btn-secondary  btn-login">{{ __('Sign In') }}</button>

                   </div>
                    </form>
                </div>
        
               
            </div>
        </div>
    </div>
       
@endsection
