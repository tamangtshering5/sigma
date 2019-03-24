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
                                        <a href="{{route('company')}}" class="btn btn-sm btn-primary btn-create"><i class="fa fa-reply"></i>Back</a>

                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#edit" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit</a>
                                        </li>

                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="edit" aria-labelledby="home-tab">
                                            <form class="form-horizontal form-label-left" method="post" id="tour_form"
                                                  action="{{route('companyedit_action',['id'=>$datas->id])}}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group col-lg-6" style="margin-left: 25%">
                                                    <label for="category">Image  </label>
                                                    <div>
                                                        <input type="file" name="image"   class="form-control">
                                                    </div>
                                                    <div class="jumbotron">
                                                        <img src="{{URL::to('backend/images/company/'.$datas->image)}}" style="height:200px;width:280px;">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Company Name  </label>
                                                    <div>
                                                        <input type="text" name="name" id="name"  value="{{$datas->company_name}}"  class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="category">Slug <span class="required">*</span> </label>
                                                    <div>
                                                        <input type="text" name="slug" id="slug" value="{{$datas->slug}}"  class="form-control" readonly>
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
                                                    <label for="category">Detail  </label>
                                                    <div>
                                                        <textarea class="form-control" id="detail" name="detail" >{!! $datas->detail !!}</textarea>
                                                    </div>
                                                </div>


                                                <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                                <script>
                                                    CKEDITOR.replace( 'detail' );
                                                </script>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" id="submit" class="btn btn-success" style="background: #1abb9c;margin-left: 50%;">Update</button>
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
    </div>


@endsection