@extends('master.front') @section('title') Where to Buy From TimesQuartz Product? @endsection @section('content') 
@include('front.common.page_tabs')
<!-- Page Title-->
<br />
<!-- Page Content-->
<div class="pt-6 pb-1 ">
  <div class="container-fluid ">
    <!-- Categories-->
    <h2 class="d-block text-center page_heading">
      <br />
      <div class="buy_Fromm"> We Are Also Selling on India's Best Ecommerce Portal <br />
      </div>
    </h2>
    <div class="col-md-4 offset-md-4">
      <div class="row">
     
        
        
         <div class="col-md-4">
          <div class="product-card ">
            <div class="product-thumb">
              <a target="_blank" class="" href="https://www.amazon.in/stores/page/BAE380AB-F8C2-4966-86B1-326044B9B0CE">
                <img class="lazy" alt="Product" src="{{asset('assets/images/selling_on/amazon.png')}}" style="">
              </a>
              
            </div>
          </div>
        </div>
         <div class="col-md-4">
          <div class="product-card ">
            <div class="product-thumb">
              <a target="_blank" class="" href="https://www.flipkart.com/watches/wrist-watches/timesquartz~brand/pr?sid=r18%2Cf13&page=1">
                <img class="lazy" alt="Product" src="{{asset('assets/images/selling_on/flipkart.png')}}" style="">
              </a>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-card ">
            <div class="product-thumb">
              <a target="_blank" class="" href="https://www.jiomart.com/fashion/b/timesquartz-yuba-dilo-ki-dharkan/102016">
                <img class="lazy" alt="Product" src="{{asset('assets/images/selling_on/jiomart.png')}}" style="">
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
  </div> @endsection