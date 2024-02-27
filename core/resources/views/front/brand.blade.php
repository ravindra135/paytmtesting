@extends('master.front') @section('title') Our Brands
 @endsection @section('content') 
@include('front.common.page_tabs')
<!-- Page Title-->
<br />
<!-- Page Content-->
<div class="pt-6 pb-1 ">
  <div class="container-fluid ">
    <!-- Categories-->
    <h2 class="d-block text-center page_heading">
      <br />
      <div class="buy_Fromm">Our Brands <br />
      </div>
    </h2>
    <div class="col-md-8 offset-md-2">
       
        
         <div class=" pt-0 pb-5">
    <div class="row g-3">
        @foreach ($brands as $brand)
            <div class="col-lg-4 col-md-4 col-6">
                <a class="b-p-s-b" href="{{$brand->url }}">
                    <img class="img-thumbnail"
                        src="{{ asset('assets/images/' . $brand->photo) }}"
                        alt="{{ $brand->name }}" title="{{ $brand->name }}">
                </a>
            </div>
        @endforeach
    </div>
  </div>
    </div>
    <br />
  </div> @endsection