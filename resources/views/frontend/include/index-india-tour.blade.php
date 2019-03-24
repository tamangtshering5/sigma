<!-- Popular Trips -->
<section id="popular-trips" class="popular-trips style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-line center">
                    <h2> India Tour</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="trips-main">
                    <!-- Trips Slider -->
                    <div class="trips-slider">
                        <!-- Single Slider -->
                        @foreach($india as $data)
                            @if($data->status=='1')
                        <div class="single-slider">
                            <div class="trip-head">
                                <img src="{{URL::to('backend/images/india_tour/'.$data->image)}}" alt="image" style="height:259px;">
                            </div>
                            <div class="trip-details">
                                <div class="left">
                                    <h4><a href="trip-single.html">{{$data->title}}</a></h4>
                                    <p><i class="fa fa-clock-o"></i>{{$data->package}}</p>
                                </div>
                                <a href="trip-single.html" class="btn">View More</a>
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
