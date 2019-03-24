@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Explore Gallery</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    @foreach($gallery as $data)
                        <div class="col-lg-4 col-md-4 col-12">
                            <ul class="grid cs-style-4">
                            <li>
                                <figure>
                                    <div>
                                        <a href="{{URL::to('backend/images/gallery/'.$data->image)}}" data-fancybox="photo">
                                        <img src="{{URL::to('backend/images/gallery/'.$data->image)}}" alt="img05" style="height:300px;width:350px;">
                                        </a>
                                    </div>
                                    <figcaption>
                                        <h3>Safari</h3>
                                        <span>Jacob Cummings</span>
                                        <a href="http://dribbble.com/shots/1116775-Safari">Take a look</a>
                                    </figcaption>
                                </figure>
                            </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <!--/ End gallery -->

    @endsection