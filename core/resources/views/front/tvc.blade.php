@extends('master.front')
@section('meta')
<meta name="keywords" content="{{$setting->meta_keywords}}">
<meta name="description" content="{{$setting->meta_description}}">
@endsection
@section('title')
   Times TVC
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
               
                </li>
                <li class="separator"></li>
                <li>TIMES TVC</li>              </ul>
          </div>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container pb-5 time_junmo">
    <div class="row g-3">
        <div class="col-md-6 yoputube_border">
<iframe width="560" height="315" src="https://www.youtube.com/embed/yK6pPVittXc?si=HXSMyMyLz-tXgsuQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 ">

            <div class="times_headertvc">
<h2>TIMES TVC</h2>
<p>Times TVC is our premium collection of watches. What attracts our buyers most is our stylish design at an affordable price. Watch is a wearable item that is loved by people of all ages, be it a kid or an adult and we have a wide range of collections for all of them. If you are looking for a watch shop then kindly visit the shop of Times Quartz we are waiting to offer you a fantastic watch. 

</p>
<div class="p-action-button mt-40">
          <a target="_blank" href="https://www.flipkart.com/watches/wrist-watches/timesquartz~brand/pr?sid=r18%2Cf13&page=1" class=" btn-primary2 btn-primary3  m-0 a-t-c-mr" id="add_to_cart">Buy on Flipkart</a>  
          <a target="_blank" href="https://www.amazon.in/stores/page/BAE380AB-F8C2-4966-86B1-326044B9B0CE" class=" btn-primary2 btn-primary3 m-0 a-t-c-mr" id="add_to_cart">Buy On Amazon</a>
           <a target="_blank" href="https://www.jiomart.com/fashion/b/timesquartz-yuba-dilo-ki-dharkan/102016" class=" btn-primary2 btn-primary3 m-0 a-t-c-mr" id="add_to_cart">Buy On JioMart</a>
        </div>

            </div>
        </div>
    </div>
  </div>
@endsection
