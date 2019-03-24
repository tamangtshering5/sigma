<!-- Testimonials -->
<section id="testimonials" class="testimonials style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-line center">
                    <h2><span>Clients</span> Experience</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-slider-two">
                    <!-- Single Slider -->
                    @foreach($testimonial as $data)
                    <div class="single-slider">
                        <div class="t-content">
                            <img src="{{URL::to('frontend/images/quote-icon.png')}}" alt="#">
                            <p>{!! $data->detail !!}"</p>
                        </div>
                        <div class="author">
                            <img src="{{URL::to('backend/images/testimonial/'.$data->image)}}" alt="#">
                            <h2>{{$data->name}}<span>{{$data->profession}}</span></h2>
                        </div>
                    </div>
                    @endforeach
                    <!--/ End Single Slider -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Testimonials -->