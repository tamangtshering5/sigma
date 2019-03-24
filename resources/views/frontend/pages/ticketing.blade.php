@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Air Ticketing</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Service Single -->
    <section id="services" class="services single section archive">
        <div class="container">
            <div class="row">
                @foreach($ticketing as $data)
                <div class="col-lg-12 col-12">
                    <!-- single service -->
                    <div class="single-service">
                        <img src="{{URL::to('backend/images/ticketing/'.$data->image)}}" alt="#" style="height:545px;width:960px;">
                        <h2><a href="#">Air Ticketing</a></h2>
                        <div class="content">
                            <p>{!! $data->detail !!}</p>
                        </div>
                    </div>
                    <!--/ End single service -->
                </div>
                    @endforeach
            </div>
        </div>
        </div>
    </section>
    <!--/ End Services -->

    @endsection