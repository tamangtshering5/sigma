@extends('backend.pages.master')
@section('body')

    <!-- start widget -->
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="dash-box dash-box-color-1">
                        <div class="dash-box-icon">
                            <i class="glyphicon glyphicon-cloud"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{count($tour)}}</span>
                            <span class="dash-box-title">Tours Packages</span>
                        </div>

                        <div class="dash-box-action">
                            <button type="button"><a href="{{route('tour')}}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-box dash-box-color-2">
                        <div class="dash-box-icon">
                            <i class="glyphicon glyphicon-download"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{count($daytour)}}</span>
                            <span class="dash-box-title">One Day Tour Packages</span>
                        </div>

                        <div class="dash-box-action">
                            <button type="button"><a href="{{route('day_tour')}}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-box dash-box-color-3">
                        <div class="dash-box-icon">
                            <i class="glyphicon glyphicon-heart"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{count($adventure)}}</span>
                            <span class="dash-box-title">Adventure Packages</span>
                        </div>

                        <div class="dash-box-action">
                            <button type="button"><a href="{{route('adventure')}}">More Info</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dash-box dash-box-color-1">
                        <div class="dash-box-icon">
                            <i class="glyphicon glyphicon-cloud"></i>
                        </div>
                        <div class="dash-box-body">
                            <span class="dash-box-count">{{count($india)}}</span>
                            <span class="dash-box-title">India Tour Packages</span>
                        </div>

                        <div class="dash-box-action">
                            <button type="button"><a href="{{route('india_tour')}}">More Info</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end widget -->

    @endsection