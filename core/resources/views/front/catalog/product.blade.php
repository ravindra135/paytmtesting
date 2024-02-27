@extends('master.front')

@section('title')

{{$item->name}}
@endsection

@section('meta')
<meta name="keywords" content="{{$item->meta_keywords}}">
<meta name="description" content="{{$item->meta_description}}">
@endsection

@section('content')


<div class="breadcum_oddk_category ">


<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
                <li class="separator"></li>
                <li> <a href="{{url('products?category=')}}{{$slug_Category->slug}}">{{$slug_Category->name}} </a></li>
                </li>
                <li class="separator"></li>
                <li>{{$item->name}}</li>              </ul>
          </div>
      </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
<div class="container-fluid padding-bottom-1x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-xxl-5 col-lg-6 col-md-6">
        <div class="product-gallery">
            @if ($item->video)
            <div class="gallery-wrapper">
                <div class="gallery-item video-btn text-center">
                    <a href="{{ $item->video }}" title="Watch video"></a>
                </div>
            </div>
          @endif
          @if($item->is_stock())
          <span class="product-badge
          @if($item->is_type == 'feature')
          bg-warning
          @elseif($item->is_type == 'new')
          bg-success
          @elseif($item->is_type == 'top')
          bg-info
          @elseif($item->is_type == 'best')
          bg-dark
          @elseif($item->is_type == 'flash_deal')
            bg-success
          @endif
          ">{{  $item->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$item->is_type)) : ''   }}</span>

          @else
          <span class="product-badge bg-secondary border-default text-body
          ">{{__('out of stock')}}</span>
          @endif

          @if($item->previous_price && $item->previous_price !=0)
          <div class="product-badge bg-goldenrod  ppp-t"> {{PriceHelper::DiscountPercentage($item)}}</div>
          @endif

          <div class="product-thumbnails insize remove_back_nav">
            <div class="product-details-slider remove_back_nav owl-carousel" >
            <div class="item"><img src="{{asset('assets/images/featuredimage/'.$item->photo)}}" alt="zoom"  /></div>
            @foreach ($galleries as $key => $gallery)
            <div class="item"><img src="{{asset('assets/images/gallery/'.$gallery->photo)}}" alt="zoom"  /></div>
            @endforeach
        </div>
      </div>
        </div>
      </div>

        @php
        function renderStarRating($rating,$maxRating=5) {

            $fullStar = "<i class = 'fa fa-star filled'></i>";
            $halfStar = "<i class = 'fa fa-star-half filled'></i>";
            $emptyStar = "<i class = 'fa fa-star'></i>";
            $rating = $rating <= $maxRating?$rating:$maxRating;

            $fullStarCount = (int)$rating;
            $halfStarCount = ceil($rating)-$fullStarCount;
            $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

            $html = str_repeat($fullStar,$fullStarCount);
            $html .= str_repeat($halfStar,$halfStarCount);
            $html .= str_repeat($emptyStar,$emptyStarCount);
            $html = $html;
            return $html;
        }
        @endphp
        <!-- Product Info-->
        <div class="col-xxl-7 col-lg-6 col-md-6">
            <div class="details-page-top-right-content d-flex align-items-center">
                <div class="div w-100">
                    <input type="hidden" id="item_id" value="{{$item->id}}">
                    <input type="hidden" id="demo_price" value="{{PriceHelper::setConvertPrice($item->discount_price)}}">
                    <input type="hidden" value="{{PriceHelper::setCurrencySign()}}" id="set_currency">
                    <input type="hidden" value="{{PriceHelper::setCurrencyValue()}}" id="set_currency_val">
                    <input type="hidden" value="{{$setting->currency_direction}}" id="currency_direction">

                     @if ($item->brand_id)
                            <div class="pt-1 mb-1"><span class="text-medium">{{__('Brand')}}:</span>
                                    <a href="{{route('front.catalog').'?brand='.$item->brand->slug}}">{{$item->brand->name}}</a>
                                </div>
                            @endif
                    <h4 class="mb-2 p-title-main">{{$item->name}}</h4>
                    <div class="mb-3">
                        <div class="rating-stars d-inline-block gmr-3">
                        {!!renderStarRating($item->reviews->avg('rating'))!!}
                        </div>
                        @if ($item->is_stock())
                            <span class="text-success  d-inline-block">{{__('In Stock')}}</span>
                        @else
                            <span class="text-danger  d-inline-block">{{__('Out of stock')}}</span>
                        @endif
                    </div>


                    @if($item->is_type == 'flash_deal')
                    @if (date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y'))
                    <div class="countdown countdown-alt mb-3" data-date-time="{{ $item->date }}">
                    </div>
                    @endif
                    @endif
                <div class="mrp">
                    <span class="">
                    @if ($item->previous_price != 0)
                        <div class="d-inline-block previous"><del>MRP. {{PriceHelper::setPreviousPrice($item->previous_price)}}</del></div>
                    @endif
                </span>
            </div>
            <div class="selling">
                    <span id="main_price" class="main-price">SELLING PRICE : <b style="font-size:22pt">₹ {{$item->discount_price}}</b>   @if($item->previous_price && $item->previous_price !=0)<span class="label label-default button_span">  Save {{PriceHelper::DiscountPercentage($item)}}</span> @endif</span>



      
          
                    <p>(Inclusive of all taxes)</p>
                </div>

                    <p class="text-muted">{{$item->sort_details}} <a href="#details" class="scroll-todd">{{__('Read more')}}</a></p>

                    <div class="row ">
                        @foreach($attributes as $attribute)
                        @if($attribute->options->count() != 0)
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="{{ $attribute->name }}"><b>{{ $attribute->name }}</b></label>
                                <select class="form-control attribute_option" id="{{ $attribute->name }}">
                                    @foreach($attribute->options->where('stock','!=','0') as $option)
                                    <option value="{{ $option->name }}" data-type="{{$attribute->id}}" data-href="{{$option->id}}" data-target="{{PriceHelper::setConvertPrice($option->price)}}">{{ $option->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row align-items-end pb-4">
                        <div class="col-sm-12">
                            @if ($item->item_type == 'normal')
                            <div class="qtySelector product-quantity">
                              <span class="decreaseQty subclick"><i class="fas fa-minus "></i></span>
                              <input type="text" class="qtyValue cart-amount" value="1">
                              <span class="increaseQty addclick"><i class="fas fa-plus"></i></span>
                                <input type="hidden" value="3333" id="current_stock">
                            </div>
                            @endif

                          

                        </div>

                          
                    </div>

                    <div class="div">
                        <div class="t-c-b-area">
                           

                               <!-- <div class="pt-1 mb-1"><span class="text-medium">Product {{__('Category')}}:</span>
                                    <a href="{{route('front.catalog').'?category='.$item->category->slug}}">{{$item->category->name}}</a>
                                        @if ($item->subcategory->name)
                                        /
                                        @endif
                                    <a href="{{route('front.catalog').'?subcategory='.$item->subcategory->slug}}">{{$item->subcategory->name}}</a>
                                        @if ($item->childcategory->name)
                                        /
                                        @endif
                                    <a href="{{route('front.catalog').'?childcategory='.$item->childcategory->slug}}">{{$item->childcategory->name}}</a>
                                </div> -->
                               
                               
                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
        <br/>
<hr/>
<br/>
@include('front.common.crafted_in')

        <div class=" padding-top-1x mb-3 " id="details">
            <div class="col-lg-12 tab_Bar">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">{{__('Descriptions')}}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">{{__('Specifications')}}</a>
                </li>
<li class="nav-item" role="presentation">
                    <a class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="false">Return Policy</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content card">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                {!! $item->details !!}
                </div>
                <div class="tab-pane fade show" id="return" role="tabpanel" aria-labelledby="return-tab">
<ul>
    <li>Free replacement will be provided within 7 days if the product is delivered in defective/damaged</li>
    <li>
 Refunds for Prepaid orders would directly be initiated to source account.</li>

<li>Defective Products, Wrong Products or Damaged Products issue should be raised within 24 hrs of delivery</li>
<li>Return Policies may vary based on products and promotions.For more details on our Returns Policies, please <a href="{{url('return-policy')}}">click here</a></li>
</ul>
</div>
                <div class="tab-pane fade show" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                {!! $item->specification !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

 @include('front.common.times_quartz_20')
 @include('front.common.testimonial')

  <!-- Reviews-->
    <div  id="reviews">

  <div class="container  review-area" id="reviews">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2 class="h3">Customer Reviews</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
              @forelse ($reviews as $review)
              <div class="single-review">
                  <div class="comment">
                    <div class="comment-author-ava"><img class="lazy" data-src="{{asset('assets/images/'.$review->user->photo)}}" alt="Comment author"></div>
                    <div class="comment-body">
                      <div class="comment-header d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="comment-title mb-1">{{$review->subject}}</h4>
                            <span>{{$review->user->first_name}}</span>
                            <span class="ml-3">{{$review->created_at->format('M d, Y')}}</span>
                        </div>
                        <div class="mb-2">
                          <div class="rating-stars">
                            @php
                                for($i=0; $i<$review->rating;$i++){
                                 echo "<i class = 'fa fa-star filled'></i>";
                                }
                            @endphp
                          </div>
                        </div>
                      </div>
                      <p class="comment-text  mt-2">{{$review->review}}</p>

                    </div>
                  </div>
              </div>
              @empty
              <div class="card">
                {{__('No Reviews Found For this Product !')}}
              </div>
              @endforelse
              <div class="row mt-15">
                <div class="col-lg-12 text-center">
                    {{$reviews->links()}}
                </div>
            </div>

          </div>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <div class="d-inline align-baseline display-3 mr-1">{{ round($item->reviews->avg('rating'),2)}}</div>
                  <div class="d-inline align-baseline text-sm text-warning mr-1">
                    <div class="rating-stars">{!!renderStarRating($item->reviews->avg('rating'))!!}</div>
                  </div>
                </div>
               
                @if (Auth::user())
                    <div class="pb-2"><a class="btn2 btn-block" href="#" data-bs-toggle="modal" data-bs-target="#leaveReview"><span><i class="fa fa-pencil"></i> {{__('Write a Review')}}</span></a></div>
                    @else
                    <div class="pb-2"><a class="btn btn-primary btn-block" href="{{route('user.login')}}" ><span>{{__('Login')}}</span></a></div>
                @endif
              </div>
            </div>
          </div>


    </div>
  </div>
</div>

  @if(count($related_items)>0)
  <div class="relatedproduct-section container padding-bottom-1x mb-1 s-pt-30">
    <!-- Related Products Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2 class="h3">{{ __('You May Also Like') }}</h2>
            </div>
        </div>
    </div>
    <!-- Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="relatedproductslider owl-carousel" >
                @foreach ($related_items as $related)
                    <div class="slider-item">
                        <div class="product-card">

                            @if ($related->is_stock())
                                @if($related->is_type == 'new')
                                @else
                                    <div class="product-badge
                                    @if($related->is_type == 'feature')
                                    bg-warning

                                    @elseif($related->is_type == 'top')
                                    bg-info
                                    @elseif($related->is_type == 'best')
                                    bg-dark
                                    @elseif($related->is_type == 'flash_deal')
                                    bg-success
                                    @endif
                                    ">{{  $related->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$related->is_type)) : ''   }}</div>
                                    @endif
                                    @else
                                    <div class="product-badge bg-secondary border-default text-body
                                    ">{{__('out of stock')}}</div>
                            @endif
                                    @if($related->previous_price && $related->previous_price !=0)
                                  
                            @endif

                            @if($related->previous_price && $related->previous_price !=0)
                           
                            @endif
                            <div class="product-thumb">
                                <img class="lazy" data-src="{{asset('assets/images/featuredimage/'.$related->thumbnail)}}" alt="Product">
                                <div class="product-button-group">
                                    <a class="product-button wishlist_store" href="{{route('user.wishlist.store',$related->id)}}" title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                   
                                    @include('includes.item_footer',['sitem' => $related])
                                    </div>
                                </div>
                            <div class="product-card-body">
                              <div class="product-category"><a href="{{route('front.catalog').'?category='.$related->category->slug}}">{{$related->category->name}}</a></div>
                              <h3 class="product-title"><a href="{{route('front.product',$related->slug)}}">
                                {{ strlen(strip_tags($related->name)) > 29 ? substr(strip_tags($related->name), 0, 29) : strip_tags($related->name) }}
                            </a></h3>
                              <h4 class="product-price">
                                @if ($related->previous_price !=0)
                                    <del>{{PriceHelper::setPreviousPrice($related->previous_price)}}</del>
                                @endif
                                 <span class="mrp" > {{PriceHelper::grandCurrencyPrice($item)}}</span> </h4>
                            </div>

                          </div>
                    </div>
                @endforeach
              </div>
        </div>
    </div>
  </div>
  @endif




@auth
<form class="modal fade ratingForm" action="{{route('front.review.submit')}}" method="post" id="leaveReview" tabindex="-1">
  @csrf
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{__('Write a Review')}}</h4>
        <button class="close modal_close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        @php
            $user = Auth::user();
        @endphp
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-name">{{__('Your Name')}}</label>
              <input class="form-control" type="text" id="review-name" value="{{$user->first_name}}" required>
            </div>
          </div>
          <input type="hidden" name="item_id" value="{{$item->id}}">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-email">{{__('Your Email')}}</label>
              <input class="form-control" type="email" id="review-email" value="{{$user->email}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-subject">{{__('Subject')}}</label>
              <input class="form-control" type="text" name="subject" id="review-subject" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-rating">{{__('Rating')}}</label>
              <select name="rating" class="form-control" id="review-rating">
                <option value="5">5 {{__('Stars')}}</option>
                <option value="4">4 {{__('Stars')}}</option>
                <option value="3">3 {{__('Stars')}}</option>
                <option value="2">2 {{__('Stars')}}</option>
                <option value="1">1 {{__('Star')}}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="review-message">Write Your Experience </label>
          <textarea class="form-control" name="review" id="review-message" rows="4" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><span>{{__('Submit Review')}}</span></button>
      </div>
    </div>
  </div>
</form>
@endauth

@endsection
