<div class="testimonials-wrap ">
  <div class="container-fluid">
    <div class="heading-section heading_h2">
      <h2>OUR CUSTOMERS SPEAK FOR US </h2>
      <p class="starrating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </p>
      <p>
        <u>From 1249+ Reviews</u>
      </p>
    </div>
    <div class="col-md-8 offset-md-2 main_nav_carous">
      <div class="carousel-testimonial owl-carousel "> @php $reviews = App\Models\Review::whereStatus(1)->take(10)->get(); @endphp @foreach ($reviews as $key => $review) <div class="item">
          <div class="testimonial-box d-flex">
            <div class="user-img img-thumbnail" ">
                            <a href=" {{url('/product')}}/{{$review->item->slug}}">
              <img src="{{ $review->item->thumbnail ? asset('assets/images/'.$review->item->thumbnail) : asset('assets/images/placeholder.png') }} ">
              </a>
            </div>
            <div class="text pl-4">
              <p class="starrating"> @for($i=1;$i<=5;$i++) @if($i <=$review->rating) <i class="fa fa-star"></i> @else <i class="far fa-star "></i> @endif @endfor </p>
              <p class="desccc">{{$review->review}}</p>
              <p class="name">{{ $review->user->displayName() }}</p>
            </div>
          </div>
        </div> @endforeach </div>
    </div>
  </div>
</div>