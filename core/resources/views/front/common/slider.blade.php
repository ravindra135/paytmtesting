<div class="col-md-12">
  <div class="marginooooo">
    <div class="hero-area3">
      <div class="heroarea-slider owl-carousel"> 
        @foreach ($sliders as $slider) 
        <a href="{{$slider->link}}">
        @if ($agent->isMobile()) 
        <div class="test">
        <img src="{{ asset('assets/images/' . $slider->logo) }}">
      </div>
        @else
         <div class="item" style="background: url('{{ asset('assets/images/' . $slider->photo) }}')">
           
         </div>
          @endif 
        </a>
        @endforeach 
      </div>
    </div>
  </div>
</div>