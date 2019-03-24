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
                                        <h3 class="panel-title">Adventure</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i>Add here</button>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-body">
                                @foreach($adven as $data)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card-container">
                                            <div class="card">
                                                <div class="card-image">
                                                    <img src="{{URL::to('backend/images/adventure/'.$data->image)}}" alt="" style="height:275px;width:100%;"/>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-title">{{$data->title}}</div>
                                                    <div class="card-detail">
                                                        <b>Overview:</b>"{!! str_limit($data->overview,200) !!}"<br><br>
                                                        <b>Package:</b>{{$data->package}}<br><br>
                                                        @if($data->status==1)
                                                            <b>Status:</b>enable
                                                        @else
                                                            <b>Status:</b>disable
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-social">
                                                    <ul>
                                                        <li><a href="{{route('adventure_edit',['id'=>$data->id])}}"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                                                        </li>

                                                        <form method="post" action="{{route('adventure_del',['id'=>$data->id])}}">
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
                                        <h4 class="modal-title">Add Packages</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                              action="{{route('adventure_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-6">
                                                <label for="category">Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Scroll-Image <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="file" name="scroll_image[]"  required  class="form-control" multiple>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Title <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="title" id="title" value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Slug <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="slug" id="slug" required  class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Discount </label>
                                                <div>
                                                    <input type="text" name="discount" id="discount" class="form-control">
                                                </div>
                                            </div>


                                            <script>
                                                $(document).ready(function(){

                                                    $("input#title").keyup(function(){

                                                        var val = $(this).val();
                                                        val = val.replace(/[^\w]+/g,"-");
                                                        $("input#slug").val(val);

                                                    });


                                                });


                                            </script>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Package <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <input type="text" name="package"  value="" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">overview <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="overview" name="overview" ></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12" id="dynamic_field">
                                                <label for="category">Itenerary <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="itenerary" name="itenerary" ></textarea>
                                                </div>
                                                <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                            </div>


                                            {{--<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'overview' );
                                            </script>
                                            <script>
                                                CKEDITOR.replace( 'itenerary' );
                                            </script>

                                            <script type="text/javascript"  src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }} " >
                                                $(document).ready(function(){
                                                    var i=1;

                                                    $('#add').click(function(){
                                                        i++;
                                                        $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group col-lg-12" id="dynamic_field"> <label for="category">Itenerary <span class="required" style="color:red;">*</span> </label> <div> <textarea class="form-control" id="next_itenerary" name="next_itenerary[]" ></textarea> </div> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');

                                                    });


                                                    $(document).on('click', '.btn_remove', function(){
                                                        var button_id = $(this).attr("id");
                                                        $('#row'+button_id+'').remove();
                                                    });


                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });
                                                });

                                            </script>

                                            <script>
                                                CKEDITOR.replace( 'next_itenerary[]' );
                                            </script>--}}
                                            <div class="form-group col-lg-12" id="dynamic_field">
                                                <label for="category">Trip Details <span class="required" style="color:red;">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="trip_detail" name="trip_detail" required></textarea>
                                                </div>
                                            </div>
                                            <script>
                                                CKEDITOR.replace( 'trip_detail' );
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