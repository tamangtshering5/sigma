@extends('frontend.include.master')
@section('body')

    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact +
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-line center">
                        <h2><span>Get in Touch</span></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact">
                        <div class="row">
                            @foreach($branch as $data)
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Single Contact -->
                                <div class="single-contact">
                                    <h4 ><i class="fa fa-home"></i><br/>
                                        {{$data->office_type}}</h4>
                                    <hr>
                                    <p><i class="fa fa-map-marker"></i>&nbsp; {{$data->address}}</p>
                                    <p><i class="fa fa-phone"></i>&nbsp; {{$data->phone}}</p>
                                    <p><i class="fa fa-envelope"></i>&nbsp; {{$data->mail}}</p>
                                </div>
                                <!--/ End Single Contact -->
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Single Contact -->
                                <div class="single-contact">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7062.9703700506925!2d85.31818855985807!3d27.733177274703998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19269f04f43b%3A0x801a6fc6a6ced894!2ssigma+travels+%26+tours!5e0!3m2!1sen!2snp!4v1528606797161" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                                <!--/ End Single Contact -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Single Contact -->
                                <div class="single-contact">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7062.9703700506925!2d85.31818855985807!3d27.733177274703998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19269f04f43b%3A0x801a6fc6a6ced894!2ssigma+travels+%26+tours!5e0!3m2!1sen!2snp!4v1528606797161" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                                <!--/ End Single Contact -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Single Contact -->
                                <div class="single-contact">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7062.9703700506925!2d85.31818855985807!3d27.733177274703998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19269f04f43b%3A0x801a6fc6a6ced894!2ssigma+travels+%26+tours!5e0!3m2!1sen!2snp!4v1528606797161" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                                <!--/ End Single Contact -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    @endsection