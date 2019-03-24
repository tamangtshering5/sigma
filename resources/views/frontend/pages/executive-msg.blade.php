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
                @foreach($msg as $data)
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
                            <h4>Message From Executive Director </h4>
                        </div>
                        <div class="about-main">
                            <p>{!! $data->message !!}</p>

                        </div>
                    </div>
                    <!--/ End About Right -->
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--/ End About Us -->
    @endsection