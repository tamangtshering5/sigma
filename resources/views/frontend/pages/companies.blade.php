@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Companies</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Service Single -->
    <section id="services" class="services single section archive">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <!-- single service -->
                    <div class="single-service">
                        <img src="{{URL::to('backend/images/company/'.$company->image)}}" alt="#">
                        <h2>{{$company->company_name}}</h2>
                        <div class="content">
                            <p>{!! $company->detail !!}</p>
                        </div>
                    </div>
                    <!--/ End single service -->
                </div>
                <div class="col-lg-4 col-12">
                    <!-- Trip Sidebar -->
                    <div class="sidebar-main">
                        <div class="single-widget categories">
                            <h2>Related Companies</h2>
                            <ul>
                                @foreach($overseas as $data)
                                <li ><a href="{{route('company_details',['slug'=>$data->slug])}}" class="active">{{$data->company_name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!--/ End Trip Sidebar -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--/ End Services -->


@endsection