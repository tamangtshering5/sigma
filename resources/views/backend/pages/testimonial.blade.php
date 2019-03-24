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
                                        <h3 class="panel-title">Airlines</h3>
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
                                        <th class="hidden-xs">ID</th>
                                        <th class="hidden-xs">Image</th>
                                        <th class="hidden-xs">Name</th>
                                        <th class="hidden-xs">Profession</th>
                                        <th class="hidden-xs">Detail</th>
                                        <th><em class="fa fa-cog"></em></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($testi as $data)
                                        <tr>
                                            <td class="hidden-xs">{{$data->id}}</td>
                                            <td><img src="{{URL::to('backend/images/testimonial/'.$data->image)}}" style="height:100px;width:100px;"> </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->profession}}</td>
                                            <td>{!! $data->detail !!}</td>
                                            <td algn="center">
                                                <a href="{{route('testimonial_edit',['id'=>$data->id])}}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>

                                                <form action="{{route('testimonial_del',['id'=>$data->id])}}" method="post">
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
                                              action="{{route('testimonial_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Name <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="name" required  class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Profession <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="profession" required  class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12" id="dynamic_field">
                                                <label for="category">Detail <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="detail" name="detail" required> </textarea>
                                                </div>
                                            </div>
                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'detail' );
                                            </script>
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