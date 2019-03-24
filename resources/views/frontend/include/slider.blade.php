<!-- Hero Area Slider -->
            <section id="hero-area" class="hero-area overlay style2">
                <!-- Slider Area -->
                <div class="slider-active">
                    @foreach($slider as $data)
                    <div class="single-slider overlay" style="background-image:url('{{URL::to('backend/images/slider/'.$data->image)}}')">
                        <div class="container">
                            <div class="row">

                                <div class="col-12">
                                    <div class="hero-inner">
                                        <!-- Welcome Text -->
                                        <div class="welcome-text">
                                            <div class="welcome-text">
                                                <h1>{{$data->title}} </h1>
                                                <a href="{{$data->url}}" class="btn">Explore Now</a>
                                            </div>
                                        </div>
                                        <!--/ End Welcome Text -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--/ End Slider Area -->
            </section>
            <!--/ End Hero Area Slider -->
