@extends('master.front')
@section('title')
    {{__('Orders')}}
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
                    <li>{{__('Orders')}}</li>
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
<div class="card table_times_s">
            <div class="card-body">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th>{{__('Order')}} #</th>
                <th>{{__('Total')}}</th>
                <th>{{__('Order Status')}}</th>
                <th>{{__('Payment Status')}}</th>
                <th>{{__('Date Purchased')}}</th>
                <th>{{__('Action')}}</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($orders as $order)
             <tr>
              <td data-label="Order"><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{$order->orderNumber}}</a></td>
              <td data-label="Total">
                @if ($setting->currency_direction == 1)
                {{$order->currency_sign}}{{PriceHelper::OrderTotal($order)}}
                @else
                {{PriceHelper::OrderTotal($order)}}{{$order->currency_sign}}
                @endif

              </td>
              <td data-label="Order Status">
                @if($order->order_status == 'Pending')
                <span class="text-info">{{$order->order_status}}</span>
                @elseif($order->order_status == 'In Progress')
                <span class="text-warning">{{$order->order_status}}</span>
                @elseif($order->order_status == 'Delivered')
                <span class="text-success"> {{$order->order_status}}</span>
                 @elseif($order->order_status == 'Return')
                <span class="text-success"> {{$order->order_status}}</span>
                @else
                <span class="text-danger">{{__('Canceled')}}</span>
                @endif
              </td>
              <td data-label="Payment Status">
                @if($order->payment_status == 'Paid')
                <span class="text-success">{{$order->payment_status}}</span>
                @else
                <span class="text-danger">{{$order->payment_status}}</span>
                @endif
              </td>

              <td  data-label="Date" >{{$order->created_at->format('D/M/Y')}}</td>
              <td data-label="Action">


@if($order->order_status == 'Canceled')
                 @elseif($order->order_status !== 'Delivered')
                   <a href="{{route('user.order.cancel',$order->id)}}" class="badge badge-pill badge-primary">Cancel Order</a>


@endif

 @if($order->order_status == 'Delivered')
                   <a href="{{route('user.order.return',$order->id)}}" class="badge badge-pill badge-success">Return Order</a>

                   @endif

                                      @if($order->order_status == 'Delivered' && $order->payment_status == 'Paid')

                  <a href="{{route('user.order.invoice',$order->id)}}" class="btn btn-info btn-sm">{{__('Invoice')}}</a>
              @endif
              </td>
            </tr>
             @endforeach
            </tbody>
          </table>
            </div>
        </div>

      </div>
    </div>
 </div>


@endsection

