
@php
    $cart = Session::has('cart') ? Session::get('cart') : [];
    $total =0;
    $option_price = 0;
    $cartTotal = 0;
@endphp



<div class="row">
<div class="col-md-10 offset-md-1">

<div class="card table_times_s">
    <div class="card-body">
        <div class="table-responsive shopping-cart">
            <table class="table table-bordered">

              <thead>
                <tr>
                  <th>{{__('Product Name')}}</th>
                  <th>{{__('Product Price')}}</th>
                  <th>{{__('Quantity')}}</th>
                  <th>{{__('Total')}}</th>
                  <th><a class="btn btn-sm btn-primary" href="{{route('front.cart.clear')}}"><span>{{__('Clear Cart')}}</span></a></th>
                </tr>
              </thead>

              <tbody id="cart_view_load" data-target="{{route('cart.get.load')}}">

                @foreach ($cart as $key => $item)
                @php

                    $cartTotal +=  ($item['main_price'] + $total + $item['attribute_price']) * $item['qty'];
                @endphp
                <tr>
                    <td class="" data-label="Product Name">

                      


                     <img width="60px" src="{{asset('assets/images/featuredimage/'.$item['photo'])}}" alt="Product">

 <a target="_blank" href="{{route('front.product',$item['slug'])}}">
                            {{ strlen(strip_tags($item['name'])) > 35 ? substr(strip_tags($item['name']), 0, 35) . '...' : strip_tags($item['name']) }}

                        </a>
 @foreach ($item['attribute']['option_name'] as $optionkey => $option_name)
                          <span><em>{{$item['attribute']['names'][$optionkey]}}:</em> {{$option_name}} ({{PriceHelper::setCurrencyPrice($item['attribute']['option_price'][$optionkey])}})</span>
                          @endforeach
                        </div>
                      </div>
                    </td>
                    <td class=" " data-label="Product Price">{{PriceHelper::setCurrencyPrice($item['main_price'])}}</td>

                    <td class="" data-label="Quantity">
                     @if ($item['item_type'] != 'digital')
                        <div class="qtySelector product-quantity">
                        <span class="decreaseQtycart cartsubclick" data-id="{{$key}}" data-target="{{PriceHelper::GetItemId($key)}}"><i class="fas fa-minus"></i></span>
                        <input type="text" disabled class="qtyValue cartcart-amount" value="{{$item['qty']}}">
                        <span class="increaseQtycart cartaddclick" data-id="{{$key}}" data-target="{{PriceHelper::GetItemId($key)}}"><i class="fas fa-plus"></i></span>
                          <input type="hidden" value="3333" id="current_stock">
                      </div>
                     @endif

                    </td>
                    <td class="" data-label="Total">{{PriceHelper::setCurrencyPrice($item['main_price'] * $item['qty'])}}</td>

                    <td  data-label="Remove Product"><a class="remove-from-cart" href="{{route('front.cart.destroy',$key)}}" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i> </a></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
    </div>
</div>


  <div class="card mt-4">
      <div class="card-body">
        <div class="shopping-cart-footer">
            <div class="column">
                <form class="coupon-form" method="post" id="coupon_form" action="{{route('front.promo.submit')}}">
                @csrf
                <input class="form-control form-control-sm" name="code" type="text" placeholder="{{__('Coupon code')}}" required>
                <button class="btn btn-sm" type="submit"><span>{{__('Apply Coupon')}}</span></button>
                </form>
            </div>

            <div class="text-right text-lg column {{Session::has('coupon') ? '' : 'd-none'}}"><span class="text-muted">{{__('Discount')}} ({{Session::has('coupon') ? Session::get('coupon')['code']['title'] : ''}}) : </span><span class="text-gray-dark">{{PriceHelper::setCurrencyPrice(Session::has('coupon') ? Session::get('coupon')['discount'] : 0)}}</span></div>

            <div class="text-right column "><span class="text-muted">{{__('Subtotal')}}: </span><span class="text-gray-dark">{{PriceHelper::setCurrencyPrice($cartTotal - (Session::has('coupon') ? Session::get('coupon')['discount'] : 0))}}</span></div>


        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-primary " href="{{route('front.catalog')}}"><span><i class="icon-arrow-left"></i> {{__('Back to Shopping')}}</span></a></div>

         
 <div class="column">

    <a class="btn btn-primary" href="{{route('front.checkout.billing')}}"><span>{{__('Checkout')}}</span></a> 


    @if(!Auth::check()) 

    <a class="btn " href="{{route('front.guest_checkout.billing')}}"><span>Guest Checkout</span></a>

    @endif

</div>


        </div>
      </div>
  </div>
</div>


</div>
</div>