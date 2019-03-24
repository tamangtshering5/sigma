@extends('backend.pages.master')
@section('body')



    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 16%">
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
                        <h2><i class="fa fa-tag"></i> Settings </h2>
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
                                <li role="presentation" class="active"><a href="#company_detail" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Company Details</a>
                                </li>
                                <li role="presentation" class=""><a href="#branch" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Branch Office</a>
                                </li>
                                <li role="presentation" class=""><a href="#social" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Social Sites</a>
                                </li>
                                <li role="presentation" class=""><a href="#associates" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Seo</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                {{--///////////////company detail/////////////--}}
                                <div role="tabpanel" class="tab-pane fade active in" id="company_detail" aria-labelledby="home-tab">
                                    @foreach($datas as $data)
                                    <form class="form-horizontal form-label-left" method="post" action="{{route('companydetail_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group col-lg-6">
                                            <label>Company Logo</label>
                                            <input type="file" name="logo" class="btn btn-default">
                                            <div class="jumbotron jumbotron-fluid">
                                                <div class="container">
                                                    <img src="{{URL::to('backend/images/companylogos/'.$data->company_logo)}}" style="height:100px;width:120px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Celebration Logo</label>
                                            <input type="file" name="celebration" class="btn btn-default">
                                            <div class="jumbotron jumbotron-fluid">
                                                <div class="container">
                                                    <img src="{{URL::to('backend/images/companylogos/'.$data->celebration_logo)}}" style="height:100px;width:120px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Slogan <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="slogan"  value="{{$data->slogan}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Company Name <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="name"  value="{{$data->name}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Email1 <span class="required"></span> </label>
                                            <div>
                                                <input type="email" name="email1"  value="{{$data->mail1}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Email2 <span class="required"></span> </label>
                                            <div>
                                                <input type="email" name="email2"  value="{{$data->mail2}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Address <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="address"  value="{{$data->address}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Phone <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="phone"  value="{{$data->phone}}" required class="form-control">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                            </div>
                                        </div>


                                    </form>
                                    @endforeach

                                </div>

                                {{--///////////////branch office///////////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="branch" aria-labelledby="profile-tab">
                                    @foreach($branch as $bran)
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('branch_action',['id'=>$bran->id])}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label for="category">Office Type <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="type"  value="{{$bran->office_type}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Address <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="address"  value="{{$bran->address}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Phone <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="phone"  value="{{$bran->phone}}" required class="form-control">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="category">Email <span class="required"></span> </label>
                                                <div>
                                                    <input type="email" name="email"  value="{{$bran->mail}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Google Map <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="map"  value="{{$bran->map}}" required class="form-control">
                                                </div>
                                            </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                    </div>
                                    @endforeach
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: 40%">
                                        <div>
                                            <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#BranchModal"><i class="fa fa-plus"></i>Click here to add</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Branch Modal -->
                                <div class="modal fade" id="BranchModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Items</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" method="post" action="{{route('branch_add')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="category">Office Type <span class="required"></span> </label>
                                                        <div>
                                                            <input type="text" name="type"  value="" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Address <span class="required"></span> </label>
                                                        <div>
                                                            <input type="text" name="address"  value="" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Phone <span class="required"></span> </label>
                                                        <div>
                                                            <input type="text" name="phone"  value="" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Email <span class="required"></span> </label>
                                                        <div>
                                                            <input type="email" name="email"  value="" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Google Map <span class="required"></span> </label>
                                                        <div>
                                                            <input type="text" name="map"  value="" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div>
                                                            <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--////////////associates companies///////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="associates" aria-labelledby="profile-tab">

                                    @foreach($seo as $bran)
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form class="form-horizontal form-label-left" method="post" action="{{route('seo_action',['id'=>$bran->id])}}" enctype="multipart/form-data">
                                                {{csrf_field()}}

                                                <div class="form-group">
                                                    <label for="category">Title  </label>
                                                    <div>
                                                        <input type="text" name="title"  value="{{$bran->title}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Keywords  </label>
                                                    <div>
                                                        <input type="text" name="keywords"  value="{{$bran->keywords}}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Description  </label>
                                                    <div>
                                                        <input type="text" name="description"  value="{{$bran->description}}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Author  </label>
                                                    <div>
                                                        <input type="text" name="author"  value="{{$bran->author}}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;border-color:#1abb9c; ">Submit</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    @endforeach

                                </div>

                                <!-- Associates company Modal -->
                                <div class="modal fade" id="AssociatesModal" role="dialog">
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


                                {{--//////////social sites//////////////////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="social" aria-labelledby="profile-tab">

                                    @foreach($social as $soci)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('social_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="category">Facebook <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="facebook"  value="{{$soci->facebook}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Twitter <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="twitter"  value="{{$soci->twitter}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Instagram <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="instagram"  value="{{$soci->instagram}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">LinkedIn <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="linkedin"  value="{{$soci->linkedin}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Google <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="google"  value="{{$soci->google}}" required class="form-control">
                                                </div>
                                            </div>

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