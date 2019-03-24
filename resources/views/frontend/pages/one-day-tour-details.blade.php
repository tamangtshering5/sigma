@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$daytour->title}}</h2>
                </div>

            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Trip Single -->
    <section id="trip-single" class="trip-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="trip-details">
                        <!-- Trip Gallery -->

                        <div class="trip-gallery">

                            <div class="gallery-slider">
                                @foreach($daytour->daytourscrollimg as $data)
                                    <div class="single-slider"><img src="{{URL::to('backend/images/daytour/'.$data->image)}}" alt="#"></div>
                                @endforeach
                            </div>

                        </div>
                        <div class="trip-tab">
                            <div class="trip-tab-inner">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab8" role="tab">TRIP OVERVIEW</a></li>
                                    <?php $i = 0; ?>
                                    @foreach($daytour->daytouritenerary as $ite)
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$ite->id}}" role="tab">Itenerary{{++$i}}</a></li>
                                    @endforeach
                                </ul>
                                <!--/ End Tab Nav -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Tab Single -->
                                    <div class="tab-pane fade show active" id="t-tab8" role="tabpanel">
                                        <p>{!! $daytour->overview !!}</p>
                                    </div>
                                    <!--/ End Tabn Single -->
                                    <!-- Tab Single -->
                                    @foreach($daytour->daytouritenerary as $ite)
                                        <div class="tab-pane fade" id="{{$ite->id}}" role="tabpanel" >
                                            <p>{!! $ite->itenerary !!}</p>
                                        </div>
                                @endforeach
                                <!--/ End Tabn Single -->
                                    <!-- Tab Single -->
                                </div>
                            </div>
                            <!--/ End Post Tab -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <!-- Trip Sidebar -->
                    <div class="sidebar-main">
                        <!-- Booking Form -->
                        <div class="single-widget trip-details">
                            <h2>Trip Detailes</h2>
                            <div class="trip-list">

                                <!-- single list -->
                                @foreach($trip->daytripdetail as $tr)
                                <div class="single-list">
                                    {!! $tr->trip_details !!}
                                </div>
                                @endforeach
                                <!--/ End single list -->

                            </div>
                        </div>
                        <!-- End Booking Form -->

                        <div class="single-widget other-trips">
                            <h2>Papular   Trips</h2>
                            <div class="trips">
                                <!-- Single Trip -->
                                @foreach($popularity as $data)
                                <div class="signle-trip">
                                    <img src="{{URL::to('backend/images/daytour/'.$data->image)}}" alt="#">
                                    <div class="text">
                                        <h4><a href="{{route('daytour_details',['slug'=>$data->slug])}}">{{$data->title}}</a></h4>
                                        <p>{!! str_limit($data->overview,50) !!} </p>
                                    </div>
                                </div>
                                @endforeach
                                <!--/ End Single Trip -->
                            </div>
                        </div>
                    </div>
                    <!--/ End Trip Sidebar -->
                </div>
            </div>
        </div>
    </section>

@endsection