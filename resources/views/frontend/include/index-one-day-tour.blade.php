<!-- Popular Trips -->
<section id="popular-trips" class="popular-trips section overlay">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="title-line center">
                    <h2 >One Day Tours </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-delay="0.4s">
                <div class="trips-main">
                    <!-- Trips Slider -->
                    <div class="trips-slider">
                        <!-- Single Slider -->
                        <!--/ End Single Trips -->
                        <!-- Single Slider -->
                        @foreach($one_day as $data)
                            @if($data->status=='1')
                        <div class="single-slider">
                            <div class="trip-head">
                                @if($data->discount!='')
                                    <div class="trip-offer">{{$data->discount}}% OFF</div>
                                @endif
                                <img src="{{URL::to('backend/images/daytour/'.$data->image)}}" style="height:259px;">
                            </div>
                            <div class="trip-details">
                                <div class="left">
                                    <h4><a href="{{route('daytour_details',['slug'=>$data->slug])}}">{{$data->title}}</a></h4>
                                    <p><i class="fa fa-clock-o"></i>{{$data->package}}</p>
                                </div>
                                <a href="{{route('daytour_details',['slug'=>$data->slug])}}" class="btn">View More</a>
                            </div>
                        </div>
                            @endif
                        @endforeach
                        <!--/ End Single Trips -->
                    </div>
                    <!--/ End Trips Slider -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Popular Trips -->