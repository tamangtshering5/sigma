@extends('backend.pages.master')
@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
                <div class="x_panel">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error )
                            <p class=" alert-success">{{$error}}</p>

                        @endforeach
                    @endif

                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif
                    <div class="x_content">
                        <br>
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <h3 class="panel-title">Gallery</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i>Add here</button>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">
                                @foreach($datas as $da)
                                    <div class="col-md-3 col-sm-3 col-xs-3">

                                        <form method="post" action="{{route('gallery_del',['id'=>$da->id])}}">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger" title="delete"><i class="fa fa-trash m-right-xs"></i></button>
                                            <br><img src="{{URL::to('backend/images/gallery/'.$da->image)}}" style="height:120px;width:160px;" alt="image">
                                        </form>
                                        <br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Gallery</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                              action="{{route('gallery_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="scroll_image[]" required  class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" id="submit" class="btn btn-success pull-right" style="background: #1abb9c; border-color:#1abb9c; ">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection