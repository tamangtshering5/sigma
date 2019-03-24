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
                                        <h3 class="panel-title">Products</h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <a href="{{route('adventure')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#edit" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Adventure</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#slider" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Slider Images</a>
                                        </li>

                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="edit" aria-labelledby="home-tab">
                                            <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                                  action="{{route('adventureedit_action',['id'=>$datas->id])}}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group col-lg-6">
                                                    <label for="category">Image  </label>
                                                    <div>
                                                        <input type="file" name="image"   class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="category">Add Extra Scroll-Image  </label>
                                                    <div>
                                                        <input type="file" name="scroll_image[]"    class="form-control" multiple>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Title  </label>
                                                    <div>
                                                        <input type="text" name="title" id="title"  value="{{$datas->title}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Slug <span class="required">*</span> </label>
                                                    <div>
                                                        <input type="text" name="slug" id="slug" value="{{$datas->slug}}"  class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Discount <span class="required">*</span> </label>
                                                    <div>
                                                        <input type="text" name="discount" id="discount" value="{{$datas->discount}}" class="form-control">
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
                                                    <label for="category">Package  </label>
                                                    <div>
                                                        <input type="text" name="package"  value="{{$datas->package}}"  class="form-control"n>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12" >
                                                    <label for="select-from">Select Status:</label>

                                                    <select class="form-control" id="status" name="status">
                                                        <option value="">Select status</option>
                                                        <option value="1" @if($datas->status=='1') selected @endif>enable </option>
                                                        <option value="0"@if($datas->status=='0') selected @endif >disable </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">overview  </label>
                                                    <div>
                                                        <textarea class="form-control" id="overview" name="overview" >{!! $datas->overview !!}</textarea>
                                                    </div>
                                                </div>


                                                <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                                <script>
                                                    CKEDITOR.replace( 'overview' );
                                                </script>
                                                <script>
                                                    CKEDITOR.replace( 'itenerary' );
                                                </script>
                                                {{--////////////////script for add more field///////////////--}}

                                                <script type="text/javascript"  >
                                                    $(document).ready(function(){
                                                        var i=1;

                                                        $('#add').click(function(){
                                                            i++;
                                                            $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group col-lg-12" id="dynamic_field"> <label for="category">Itenerary  </label> <div> <textarea class="form-control" id="next_itenerary" name="next_itenerary[]" ></textarea> </div> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div> ');

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


                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" id="submit" class="btn btn-success" style="background: #1abb9c;margin-left: 50%;">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                            {{--/////////////////////////trip details edit/////////////////////////--}}
                                            <h2 style="margin-top:30px;"><i class="fa fa-tag"></i>&nbsp;Trip Details</h2>
                                            @foreach($datas->adventuretripdetail as $data)
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <form method="post" action="{{route('adventripedit_action',['id'=>$data->id])}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group col-lg-12">
                                                            <label for="category">trip details  </label>
                                                            <div>
                                                                <textarea class="form-control" id="trip_detail" name="trip_detail" >{!! $data->trip_details !!}</textarea>
                                                            </div>
                                                        </div>

                                                        <span style="float: left;">
                                                     <div class="form-group">
                                                         <div>
                                                             <button type="submit" id="submit" class="btn btn-success" style="background: #1abb9c;margin-left: 400px;">Update</button>
                                                         </div>
                                                     </div>
                                                     </span>

                                                    </form>
                                                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                                    <script>
                                                        CKEDITOR.replace( 'trip_detail' );
                                                    </script>
                                                </div>
                                            @endforeach
                                            <br><br>

                                            {{--/////////////////itenerary edit/////////////////////////////////--}}
                                            <h2 style="margin-top:30px;"><i class="fa fa-tag"></i>&nbsp;Itenerary</h2>
                                            @foreach($datas->adventureitenerary as $data)
                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                    <form method="post" action="{{route('adveniteedit_action',['id'=>$data->id])}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group col-lg-12" id="dynamic_field">
                                                            <label for="category">Itenerary  </label>
                                                            <div>
                                                                <textarea class="form-control" id="next_itenerary" name="next_itenerary" >{{$data->itenerary}}  </textarea>
                                                            </div>
                                                        </div>

                                                        <span style="float: left;">
                                                     <div class="form-group">
                                                         <div>
                                                             <button type="submit" id="submit" class="btn btn-success" style="background: #1abb9c;margin-left: 50%;">Update</button>
                                                         </div>
                                                     </div>
                                                     </span>
                                                    </form>
                                                    <span style="float: left;">
                                                     <form method="post" action="{{route('advenitenerary_del',['id'=>$data->id])}}">
                                                         {{csrf_field()}}
                                                         <button type="submit" class="btn btn-danger" title="delete"><i class="fa fa-trash m-right-xs"></i></button>

                                                     </form>
                                             </span>

                                                    <script>
                                                        CKEDITOR.replace( 'next_itenerary' );
                                                    </script>


                                                </div>
                                            @endforeach


                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="slider" aria-labelledby="profile-tab">
                                            @foreach($datas->advenscrollimg as $da)
                                                <div class="col-md-3 col-sm-3 col-xs-3">


                                                        <form method="post" action="{{route('advenscroll_del',['id'=>$da->id])}}">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn btn-danger" title="delete"><i class="fa fa-trash m-right-xs"></i></button>
                                                            <br><img src="{{URL::to('backend/images/adventure/'.$da->image)}}" style="height:80px;width:120px;" alt="image">
                                                        </form>
                                                        <br>

                                                        <form method="post" action="{{route('advenset',['id'=>$da->Adventure_id,'img'=>$da->image])}}">
                                                            {{csrf_field()}}
                                                            <span style="float: left">
                                                            <button type="submit" class="btn btn-success" title="set as main image">Set as main image</button>
                                                        </span>
                                                        </form>

                                                </div>
                                            @endforeach

                                        </div>

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