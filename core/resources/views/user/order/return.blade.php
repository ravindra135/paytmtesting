@extends('master.front')
@section('title')
    {{__('Dashboard')}}
@endsection
@section('content')
  <div class="breadcum_oddk_category ">

<!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="{{__('front.index')}}">{{__('Home')}}</a> </li>
                    <li class="separator"></li>
                    <li>Return Order</li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row">
         @include('includes.user_sitebar')
          <div class="col-lg-8 dashboard_tab">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <h5 class="mb-0">Return Order </h5>
                        <a href="{{ route('user.order.index') }}" class="btn btn-primary btn-sm m-0"><span>{{__('Back')}}</span></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user.order.submit_return')}}" method="post" enctype="multipart/form-data" class="contact-form">
                        @csrf
                        <div class="row">

 <input type="hidden" id="order_id" name="order_id" value="{{$id}}">

                            <div class="form-group">
                                        <label for="role_id">Return Reason *</label>
                                        <select required="true" name="reason" id="reason" class="form-control" >
                                           
                                   <option value="Defective Product">Defective Product</option>
                                   <option value="Different from i see on website">Different from i see on website</option>
                                   <option value="Arrived too late">Arrived too late</option>
                                   <option value="Damaged during shipping">Damaged during shipping</option>
                                   <option value="Missing Items">Missing Item</option>
                                   <option value="Other Reason">Other Reason</option>
                                        </select>
                                    </div>
                          

                            <div class="col-12 form-group">
                                <label for="inputMessage">Full Bank Details (If Online Payment Done) </label>
                                <textarea name="notes" class="form-control" rows="4"></textarea>
                                @error('message')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                      

                        <div class="d-flex justify-content-between mt-1">
                            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Submit')}}</span></button>
                        </div>
                    </form>
                </div>
            </div>

          </div>
        </div>
  </div>
@endsection
