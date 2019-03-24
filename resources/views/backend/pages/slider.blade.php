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
                                        <h3 class="panel-title">Slider</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i>Add here</button>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">

                                    <table class="table table-striped table-bordered table-list">
                                        <thead>
                                        <tr>
                                            <th class="hidden-xs">Image</th>
                                            <th class="hidden-xs">Title</th>
                                            <th><em class="fa fa-cog"></em></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datas as $da)
                                            <tr>
                                               <td><img src="{{URL::to('backend/images/slider/'.$da->image)}}" style="height:100px;height:100px;"> </td>
                                                <td>{{$da->title}}</td>
                                                <td algn="center">
                                                    <form action="{{route('slider_del',['id'=>$da->id])}}" method="post">
                                                        {{csrf_field()}}
                                                        <button class="btn btn-danger" title="delete"><em class="fa fa-trash"></em></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>


                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Company</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                              action="{{route('slider_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="scroll_image[]" required  class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Title <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="title" required  class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">URL <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="url" required  class="form-control" >
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" id="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
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