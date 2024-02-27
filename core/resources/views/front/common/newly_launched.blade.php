<section class="selected-product-section speacial-product-sec mt-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="section-title section-title2 section-title3section-title section-title2 section-title3">
          <h2 class="h3 text-center">Newly Arrived</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="type_product_view d-none">
        <img src="{{asset('assets/images/ajax_loader.gif')}}" alt="">
      </div>
      <div class="col-lg-12" id="type_product_view">
        <div class="row"> @foreach ($products->orderBy('id','DESC')->get() as $item) <div class="slider-item col-sm-6 col-xs-6  col-md-3">
            <div class="product-card ">
              <div class="product-thumb"> @if (!$item->is_stock()) <div class="product-badge bg-secondary border-default text-body
                                                    ">{{__('out of stock')}}</div> @endif <a href="{{route('front.product',$item->slug)}}">
                  <img class="lazy" src="{{asset('assets/images/featuredimage/'.$item->thumbnail)}}" alt="{{$item->name}}">
                </a>
                <div class="product-button-group">
                  <a class="product-button wishlist_store" href="{{route('user.wishlist.store',$item->id)}}" title="{{__('Wishlist')}}">
                    <i class="icon-heart"></i>
                  </a> @include('includes.item_footer',['sitem' => $item])
                </div>
              </div>
              <div class="product-card-inner">
                <div class="product-card-body">
                  <h3 class="product-title">
                    <a href="{{route('front.product',$item->slug)}}">
                      <div class="hidden-sm-down"> {{ strlen(strip_tags($item->name)) > 29 ? substr(strip_tags($item->name), 0, 29) : strip_tags($item->name) }}
                      </div>
                      <div class="hidden-md-up">
                        {{ strlen(strip_tags($item->name)) > 25 ? substr(strip_tags($item->name), 0, 25) : strip_tags($item->name) }}
                      </div>
                    </a>
                  </h3>
                  

                   <h4 class="product-price"> @if ($item->previous_price !=0) <del>{{PriceHelper::setPreviousPrice($item->previous_price)}}</del> @endif @if($item->previous_price && $item->previous_price !=0) <span style="color:green">{{PriceHelper::DiscountPercentage($item)}} off </span> @endif <span class="mrp"> {{PriceHelper::grandCurrencyPrice($item)}}</span>
          </h4>
                  <br />
                </div>
              </div>
            </div>
          </div> @endforeach </div>
      </div>
      <div class="col-sm-12 text-center">
        <br />
        <div class="p-action-button">
          <a href="{{url('products')}}" class=" btn-primary2 m-0 a-t-c-mr" id="add_to_cart">View All</a>
        </div>
        <br />
      </div>
    </div>
  </div>
</section>