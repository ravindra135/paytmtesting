<section class="selected-product-section speacial-product-sec mt-20">
            <div class="container">
             <div class="row">
                    <div class="col-lg-12 ">
                        <div class="section-title section-title2 section-title3section-title section-title2 section-title3">
                            <h2 class="h3">Newly Launched</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="type_product_view d-none">
                        <img  src="{{asset('assets/images/ajax_loader.gif')}}" alt="">
                    </div>
                    <div class="col-lg-12" id="type_product_view">

                        <div class="dashboard-product  owl-carousel" >
                            @foreach ($products->orderBy('id','DESC')->get()  as $item)
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <div class="product-thumb">
                                                @if (!$item->is_stock())
                                                    <div class="product-badge bg-secondary border-default text-body
                                                    ">{{__('out of stock')}}</div>
                                                @endif

                                             
                                              
                                               <a href="{{route('front.product',$item->slug)}}"> <img class="lazy" src="{{asset('assets/images/featuredimage/'.$item->thumbnail)}}" alt="Product"> </a>
                                                <div class="product-button-group"><a class="product-button wishlist_store" href="{{route('user.wishlist.store',$item->id)}}" title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                                    <a data-target="{{route('fornt.compare.product',$item->id)}}" class="product-button product_compare" href="javascript:;" title="{{__('Compare')}}"><i class="icon-repeat"></i></a>
                                                    @include('includes.item_footer',['sitem' => $item])
                                                </div>
                                            </div>
                                            <div class="product-card-inner">
                                            <div class="product-card-body">
                                                <h3 class="product-title"><a href="{{route('front.product',$item->slug)}}">
                                                     <div class="hidden-sm-down"> {{ strlen(strip_tags($item->name)) > 20 ? substr(strip_tags($item->name), 0, 20) : strip_tags($item->name) }}
                                                   </div>
                                                    <div class="hidden-md-up"> 
                                                        {{ strlen(strip_tags($item->name)) > 20 ? substr(strip_tags($item->name), 0, 20) : strip_tags($item->name) }}
                                                   </div>
                                                </a></h3>
                                                <!--<div class="rating-stars">
                                                    {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                </div>-->
                                                <h4 class="product-price">
                                                @if ($item->previous_price != 0)
                                                <del>{{PriceHelper::setPreviousPrice($item->previous_price)}}</del>
                                                @endif 

                                                @if($item->previous_price && $item->previous_price !=0)
                                            <span style="color:green">{{PriceHelper::DiscountPercentage($item)}} off  </span>
                                                @endif
                                                {{PriceHelper::grandCurrencyPrice($item)}}

                                                 
                                                </h4>
<br/>
                                                 @if ($item->is_stock())
    <a class="product-button add_to_single_cart btn-grad   btn-block "  data-target="{{ $item->id }}" href="javascript:;"  title="{{__('To Cart')}}"><i class="icon-shopping-cart"></i> Add to Cart
    </a>
    @else
    <a class="product-button btn  btn-grad btn-block mt-2" href="{{route('front.product',$item->slug)}}" title="{{__('Details')}}"><i class="icon-arrow-right"></i> Add to Cart</a>
    @endif
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>