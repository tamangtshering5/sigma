@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- About Us -->
    <section id="about-us" class="about-us section" style="padding: 1px !important;">
        <div class="container">
            <div class="row">
                @foreach($intro as $data)
                <div class="col-lg-5 col-12">
                    <!-- About Left -->
                    <div class="about-left">
                        <br/><br/><br/>
                        <img src="{{URL::to('backend/images/about/'.$data->image)}}" alt="#">
                    </div>
                    <!--/ End About Left -->
                </div>
                <div class="col-lg-7 col-12">
                    <!-- About Right -->
                    <div class="about-right">
                        <div class="title-line">
                            <h4>Introduction </h4>
                        </div>
                        <div class="about-main">
                            <p>{!! $data->intro !!}</p>

                        </div>
                    </div>
                    <!--/ End About Right -->

                </div>
                <div class="col-lg-6 col-12">
                    <!-- About Left -->
                    <div class="title-line">
                        <h4>Mission & Vision </h4>
                    </div>
                    <div class="about-main">
                        <p>{!! $data->goal !!}</p>

                    </div>
                    <!--/ End About Left -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- About Right -->
                    <div class="title-line">
                        <h4>Why sigma Travels?</h4>
                    </div>
                    <div class="about-main">
                        <p>{!! $data->why_us !!}</p>

                    </div>
                </div>
                <!--/ End About Right -->
@endforeach
            </div>
        </div>
        </div>
    </section>
    <!--/ End About Us -->
    <hr>

    <!-- Counter -->
    <section id="counter" class="counter overlay section" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                @foreach($intro as $data)
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Single Count -->
                    <div class="single-count">
                        <h2><span class="number">{{$data->experiance_years}}</span> Years of Experience</h2>
                        <p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
                    </div>
                    <!--/ End Single Count -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Single Count -->
                    <div class="single-count">
                        <h2><span class="number">{{count($company)}}</span> Groups of Companies</h2>
                        <p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
                    </div>
                    <!--/ End Single Count -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Single Count -->
                    <div class="single-count">
                        <h2><span class="number">{{$data->customers}}</span> Satisfied Customer</h2>
                        <p>We are technology leaders and have crafted intuitive and lasting online and mobile experiences</p>
                    </div>
                    <!--/ End Single Count -->
                </div>
@endforeach
            </div>
        </div>
    </section>
    <!--/ End Counter -->


    <!-- Clients -->
    <div id="clients" class="clients section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="clients-slider">
                        <!-- Single Clients -->
                        @foreach($airlines as $data)
                        <div class="single-clients">
                            <a href="#" target="_blank"><img src="{{URL::to('backend/images/airline/'.$data->image)}}" ></a>
                        </div>
                        @endforeach
                        <!--/ End Single Clients -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Clients -->

    @endsection