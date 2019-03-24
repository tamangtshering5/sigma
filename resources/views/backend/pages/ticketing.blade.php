@extends('backend.pages.master')
@section('body')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 18%">
            <div class="x_panel">

                <div class="x_title">
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
                    <h2><i class="fa fa-tag"></i> Ticketing </h2>
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
                            <li role="presentation" class="active"><a href="#ticketing" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Ticketing</a>
                            </li>


                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="ticketing" aria-labelledby="home-tab">
                                @foreach($ticket as $data)
                                    <form class="form-horizontal form-label-left" method="post" action="{{route('ticketing_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group col-lg-6">
                                            <label>Image</label>
                                            <input type="file" name="image" class="btn btn-default">
                                            <div class="jumbotron jumbotron-fluid">
                                                <div class="container">
                                                    <img src="{{URL::to('backend/images/ticketing/'.$data->image)}}" style="height:160px;width:200px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label for="category">Detail </label>
                                            <div>
                                                <textarea class="form-control" id="detail" name="detail" >{!! $data->detail !!}</textarea>
                                            </div>
                                        </div>
                                        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                        <script>
                                            CKEDITOR.replace( 'detail' );
                                        </script>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;border-color:#1abb9c; ">Update</button>
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