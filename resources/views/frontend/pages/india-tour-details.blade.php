@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{$india->title}}</h2>
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
                                @foreach($india->indiascrollimg as $data)
                                    <div class="single-slider"><img src="{{URL::to('backend/images/india_tour/'.$data->image)}}" alt="#"></div>
                                @endforeach
                            </div>

                        </div>
                        <div class="trip-tab">
                            <div class="trip-tab-inner">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab8" role="tab">TRIP OVERVIEW</a></li>
                                    <?php $i = 0; ?>
                                    @foreach($india->indiaitenerary as $ite)
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$ite->id}}" role="tab">Itenerary{{++$i}}</a></li>
                                    @endforeach
                                </ul>
                                <!--/ End Tab Nav -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Tab Single -->
                                    <div class="tab-pane fade show active" id="t-tab8" role="tabpanel">
                                        <p>{!! $india->overview !!}</p>
                                    </div>
                                    <!--/ End Tabn Single -->
                                    <!-- Tab Single -->
                                    @foreach($india->indiaitenerary as $ite)
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
                                <div class="single-list">
                                    <div class="left">Categories:</div>
                                    <div class="right">Europe Tour</div>
                                </div>
                                <!--/ End single list -->
                                <!-- single list -->
                                <div class="single-list">
                                    <div class="left">Duration:</div>
                                    <div class="right">7 Nights 8 Days</div>
                                </div>
                                <!--/ End single list -->
                                <!-- single list -->
                                <div class="single-list">
                                    <div class="left">Price:</div>
                                    <div class="right">$355.00</div>
                                </div>
                                <!--/ End single list -->
                                <!-- single list -->
                                <div class="single-list">
                                    <div class="left">Difficulty:</div>
                                    <div class="right">Moderate</div>
                                </div>
                                <!--/ End single list -->
                                <!-- single list -->
                                <div class="single-list">
                                    <div class="left">Departure:</div>
                                    <div class="right">Feb 17 March 06 March 14</div>
                                </div>
                                <!--/ End single list -->
                                <!-- single list -->
                                <div class="single-list">
                                    <div class="left">HOTEL:</div>
                                    <div class="right">Europe Tour</div>
                                </div>
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
                                    <img src="{{URL::to('backend/images/india_tour/'.$data->image)}}" alt="#">
                                    <div class="text">
                                        <h4><a href="{{route('indiatour_details',['slug'=>$data->slug])}}">{{$data->title}}</a></h4>
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