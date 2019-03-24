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
                                        <h3 class="panel-title">Our Companies</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i>Add here</button>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">
                                @foreach($company as $data)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card-container">
                                            <div class="card">
                                                <div class="card-image">
                                                    <img src="{{URL::to('backend/images/company/'.$data->image)}}" alt="" style="height:275px;width:100%;"/>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-title">{{$data->company_name}}</div>
                                                    <div class="card-detail">
                                                        Overview:{!! str_limit($data->detail,350) !!}</div>
                                                </div>
                                                <div class="card-social">
                                                    <ul>
                                                        <li><a href="{{route('company_edit',['id'=>$data->id])}}"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                                        </li>

                                                        <form method="post" action="{{route('company_del',['id'=>$data->id])}}">
                                                            <li>
                                                                {{csrf_field()}}
                                                                <button type="submit" class="btn btn-link" title="delete" style="color: white;font-size: 20px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </li>
                                                        </form>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
                                        <h4 class="modal-title">Add Company</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                              action="{{route('company_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Company Name <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="name" id="name" value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Slug <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="slug" id="slug" required  class="form-control" readonly>
                                                </div>
                                            </div>


                                            <script>
                                                $(document).ready(function(){

                                                    $("input#name").keyup(function(){

                                                        var val = $(this).val();
                                                        val = val.replace(/[^\w]+/g,"-");
                                                        $("input#slug").val(val);

                                                    });


                                                });
                                            </script>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Detail <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="detail" name="detail" ></textarea>
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