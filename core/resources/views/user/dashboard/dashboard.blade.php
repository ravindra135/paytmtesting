@extends('master.front')
@section('title')
    {{__('Dashboard')}}
@endsection
@section('content')

  @php
        function renderStarRating($rating, $maxRating = 5)
        {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating ? $rating : $maxRating;

            $fullStarCount = (int) $rating;
            $halfStarCount = ceil($rating) - $fullStarCount;
            $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

            $html = str_repeat($fullStar, $fullStarCount);
            $html .= str_repeat($halfStar, $halfStarCount);
            $html .= str_repeat($emptyStar, $emptyStarCount);
            $html = $html;
            return $html;
        }
    @endphp

<!-- Page Title-->
<div class="breadcum_oddk_category ">

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="{{__('front.index')}}">{{__('Home')}}</a> </li>
                    <li class="separator"></li>
                    <li>{{__('Dashboard')}} </li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
</div>
@php
    $user = Auth::user();
@endphp
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row">
         @include('includes.user_sitebar')
          <div class="col-lg-8 dashboard_tab">
                <div class="row u-d-d">
<br/>
<div class="times_dashbaoard text-center">
                    <h3 >Welcome </h3>
                    <h4 class="usr_na">{{$user->first_name}} {{$user->last_name}}</h4>
                    <h4>Customer Care Support: <a class="underline" href="tel:{{$setting->footer_phone}}">{{$setting->footer_phone}}</a></h4>
                </div>
                    <div class="col-md-4 col-xs-6 mb-1">
                         <a href="{{url('user/orders')}}">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">{{__('All Order')}}</p>
                                <h4><b>{{$allorders}}</b></h4>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-4 col-xs-6 mb-1">
                        <a href="{{url('user/orders')}}">
                            <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">{{__('Completed Order')}}</p>
                                <h4><b>{{$delivered}}</b></h4>
                            </div>
                        </div>
                    </a>
                    </div>
                   
                    <div class="col-md-4 col-xs-6 mb-1">
                         <a href="{{url('user/orders')}}">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">{{__('Canceled Order')}}</p>
                                <h4><b>{{$canceled}}</b></h4>
                            </div>
                        </div>
                    </a>
                    </div>
                   
                </div>
                          @include('front.common.dashboard_product')

          </div>


        </div>
  </div>
@endsection
