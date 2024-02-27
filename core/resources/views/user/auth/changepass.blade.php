@extends('master.front')
@section('title')
    {{__('Change Reset')}}
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
                    <li>{{__('Change Reset')}}</li>
                  </ul>
            </div>
        </div>
    </div>
  </div>

</div>

   <div class="container padding-bottom-3x mb-1">
  <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <form class="card mt-4" method="POST" action="{{ route('user.change.password') }}">
                @csrf
               @include('alerts.alerts')
              <div class="card-body login_form">
                <div class="form-group">
                <h4 class="d-block mb-4">{{__('Change your password?')}}</h4>
                  <label for="email-for-pass">Enter Password</label>

               <input id="new_password" name="new_password" type="password" class="form-control input-border-bottom" placeholder="{{__('Change Your Password')}}">

              <input type="hidden" name="file_token" value="{{ $token }}">


                </div>
                 <div class="form-group">
                  <label for="email-for-pass">Retype Password</label>


                            <input id="renew_password" name="renew_password" type="password" class="form-control input-border-bottom" placeholder="{{__('Retype Your Password')}}" >


                </div>
                <button class="btn btn-primary btn-sm" type="submit"><span>Submit</span></button>
                <a href="{{route('user.login')}}" class="btn btn-primary btn-sm" ><span>{{__('Login')}}</span></a>
              </div>
            </form>
          </div>
        </div>
  </div>

        


@endsection
