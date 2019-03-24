<!-- Popular Trips -->
<section id="popular-trips" class="popular-trips section overlay">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="title-line center">
                    <h2 >Adventure Tour </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-delay="0.4s">
                <div class="clients-slider">
                    <!-- Single Clients -->
                    @foreach($adventure as $data)
                        @if($data->status=='1')
                    <div class="single-clients">
                        <a href="{{route('adventure_details',['slug'=>$data->slug])}}"  ><img src="{{URL::to('backend/images/adventure/'.$data->image)}}"  style=" border-radius: 50% !important; height: 170px; width: 170px;" ></a>
                    </div>
                        @endif
                    @endforeach

                    <!--/ End Single Clients -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Popular Trips -->