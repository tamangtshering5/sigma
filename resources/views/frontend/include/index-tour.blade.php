<!-- Popular Trips -->
<section id="popular-trips" class="popular-trips style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-line center">
                    <h2> Tour</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="trips-main">
                    <!-- Trips Slider -->
                    <div class="trips-slider">
                        <!-- Single Slider -->
                        @foreach($tour as $data)
                            @if($data->status=='1')
                        <div class="single-slider">
                            <div class="trip-head">
                                @if($data->discount!='')
                                    <div class="trip-offer">{{$data->discount}}% OFF</div>
                                @endif
                                <img src="{{URL::to('backend/images/tour/'.$data->image)}}" alt="#" style="height:259px;">
                            </div>
                            <div class="trip-details">
                                <div class="left">
                                    <h4><a href="{{route('tour_details',['slug'=>$data->slug])}}">{{$data->title}}</a></h4>
                                    <p><i class="fa fa-clock-o"></i>{{$data->package}}</p>
                                </div>
                                <a href="{{route('tour_details',['slug'=>$data->slug])}}" class="btn">View More</a>
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