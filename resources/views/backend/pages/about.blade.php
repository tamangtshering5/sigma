@extends('backend.pages.master')
@section('body')



    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 16%">
                <div class="x_panel">
                    @if(session('success'))
                        <center>
                            <div class="alert alert-success alert-dismissible" style="width:800px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('success')}}</strong>
                            </div>

                        </center>
                    @endif
                    @if(session('error'))
                        <center>
                            <div class="alert alert-danger alert-dismissible" style="width:800px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{session('error')}}</strong>
                            </div>

                        </center>
                    @endif
                    @if(session('alert'))
                        <p class="alert alert-success"> {{session('alert')}}   </p>
                    @endif
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <div class="x_title">

                        <h2><i class="fa fa-tag"></i> About Us </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#introduction" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Introduction</a>
                                </li>
                                <li role="presentation" class=""><a href="#ceo" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Message Chairman</a>
                                </li>
                                <li role="presentation" class=""><a href="#director" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Executive Director</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                {{--///////////////company detail/////////////--}}
                                <div role="tabpanel" class="tab-pane fade active in" id="introduction" aria-labelledby="home-tab">
                                    @foreach($intro as $data)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('intro_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-6">
                                                <label>Image</label>
                                                <input type="file" name="image" class="btn btn-default">
                                                <div class="jumbotron jumbotron-fluid">
                                                    <div class="container">
                                                        <img src="{{URL::to('backend/images/about/'.$data->image)}}" style="height:100px;width:120px;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Introduction </label>
                                                <div>
                                                    <textarea class="form-control" id="intro" name="intro" >{!! $data->intro !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Goal & Mission </label>
                                                <div>
                                                    <textarea class="form-control" id="goal" name="goal" >{!! $data->goal !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Why-Us </label>
                                                <div>
                                                    <textarea class="form-control" id="whyus" name="whyus" >{!! $data->why_us !!}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Years of Experience</label>
                                                <div>
                                                    <input type="text" name="experience"  value="{{$data->experiance_years}}" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Number of Customers </label>
                                                <div>
                                                    <input type="text" name="customer"  value="{{$data->customers}}" required class="form-control">
                                                </div>
                                            </div>
                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'intro' );
                                            </script>
                                            <script>
                                                CKEDITOR.replace( 'goal' );
                                            </script>
                                            <script>
                                                CKEDITOR.replace( 'whyus' );
                                            </script>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach

                                </div>

                                {{--///////////////ceo message///////////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="ceo" aria-labelledby="profile-tab">
                                    @foreach($ceo as $data)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('ceo_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-6">
                                                <label>Image</label>
                                                <input type="file" name="image" class="btn btn-default">
                                                <div class="jumbotron jumbotron-fluid">
                                                    <div class="container">
                                                        <img src="{{URL::to('backend/images/about/'.$data->image)}}" style="height:100px;width:120px;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Message </label>
                                                <div>
                                                    <textarea class="form-control" id="message" name="message" >{!! $data->message !!}</textarea>
                                                </div>
                                            </div>

                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'message' );
                                            </script>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach



                                </div>


                                {{--////////////director message///////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="director" aria-labelledby="profile-tab">

                                    @foreach($direc as $data)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('direc_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-6">
                                                <label>Image</label>
                                                <input type="file" name="image" class="btn btn-default">
                                                <div class="jumbotron jumbotron-fluid">
                                                    <div class="container">
                                                        <img src="{{URL::to('backend/images/about/'.$data->image)}}" style="height:100px;width:120px;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Message </label>
                                                <div>
                                                    <textarea class="form-control" id="dmessage" name="message" >{!! $data->message !!}</textarea>
                                                </div>
                                            </div>

                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'dmessage' );
                                            </script>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach





                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection