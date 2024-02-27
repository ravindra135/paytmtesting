

@if ($extra_settings->is_t3_brand_section == 1)
       

        <section class="brand-section mb-50">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="section-title section-title2 section-title3">
                            <h2 class="h3 text-center">You Will Also Find Our Products On</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider owl-carousel">
                            @foreach ($brands as $brand)
                            <div class="slider-item">
                                
                                    <img class="d-block hi-50 lazy"
                                    src="{{ asset('assets/images/' . $brand->photo) }}"
                                        alt="{{ $brand->name }}" title="{{ $brand->name }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @endif
