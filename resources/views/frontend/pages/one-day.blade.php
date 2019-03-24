@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>One Day Tours</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Tour Package -->
    <section id="top-destination" class="top-destination section" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-line center">
                        <h2>One Day Tours Package</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($one_day as $data)
                    @if($data->status=='1')
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Package -->
                    <div class="single-package">
                        <div class="trip-head">
                            @if($data->discount!='')
                                <div class="trip-offer">{{$data->discount}}% OFF</div>
                            @endif
                            <img src="{{URL::to('backend/images/daytour/'.$data->image)}}" alt="#" style="height:259px;">
                        </div>
                        <div class="trip-details">
                            <div class="left">
                                <h4><a href="#">{{$data->title}}</a></h4>
                                <p><i class="fa fa-clock-o"></i>{{$data->package}}</p>
                            </div>
                            <a href="{{route('daytour_details',['slug'=>$data->slug])}}" class="btn primary">View Details</a>
                        </div>
                    </div>
                    <!--/ End Single Package -->
                </div>
                @endif
                @endforeach

            </div>
            <br>
            <div style="margin-left: 50%">
                {{$one_day->links()}}
            </div>

        </div>
    </section>
    <!--/ End Tour Package -->


@endsection