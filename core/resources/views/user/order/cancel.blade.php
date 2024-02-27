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
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
                    <li class="separator"></li>
                    <li>Cancel Order</li>
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
                        <h5 class="mb-0">Cancellation</h5>
                        <a href="{{ route('user.order.index') }}" class="btn btn-primary btn-sm m-0"><span>{{__('Back')}}</span></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user.order.submit_cancel')}}" method="post" enctype="multipart/form-data" class="contact-form">
                        @csrf
                        <div class="row">

 <input type="hidden" id="order_id" name="order_id" value="{{$id}}">

                            <div class="form-group">
                                        <label for="role_id">Cancellation Reason *</label>
                                        <select required="true" name="reason" id="reason" class="form-control" >
                                           
                                   <option value="Long delivery time">Long delivery time</option>
                                   <option value="Changed my mind">Changed my mind</option>
                                   <option value="Ordered by Mistake">Ordered by mistake</option>
                                   <option value="Product Price too High">Product price too high</option>
                                   <option value="Other Reason">Other Reason</option>
                                        </select>
                                    </div>
                          

                            <div class="col-12 form-group">
                                <label for="inputMessage">{{__('Any Message')}} </label>
                                <textarea name="notes" class="form-control" rows="3"></textarea>
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
