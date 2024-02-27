<section class="service-section mt-10 pt-0">
            <div class="container-fluid">
                                                    <div class="col-md-10 offset-md-1">

                <div class="row">

                    @foreach ($services as $service)
                        <div class=" col-lg-3 col-md-3    col-xs-6 col-sm-6 text-center mb-10">
                            <div class="single-service single-service2">
                                <img src="{{ asset('assets/images/'.$service->photo) }}" alt="Shipping">
                                <div class="content">
                                    <h6 class="mb-2">{{ $service->title }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </section>