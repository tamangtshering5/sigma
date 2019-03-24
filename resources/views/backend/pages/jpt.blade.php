<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 25%">
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
                    <h2><i class="fa fa-tag"></i> Edit Profile </h2>
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
                            <li role="presentation" class="active"><a href="#profile" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Profile</a>
                            </li>
                            <li role="presentation" class=""><a href="#password" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Change Password</a>
                            </li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="home-tab">




                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="password" aria-labelledby="profile-tab">


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


















{{--=========/////////////////////multiple dynamic select///////////////////////////////////=========--}}

<form class="form-horizontal form-label-left" method="post"
      action="{{route('products_action')}}" enctype="multipart/form-data">

    {{csrf_field()}}

    <div class="form-group col-lg-6" >
        <label for="select-from">Select Catagory:<span class="required" style="color:red;">*</span></label>
        <select class="form-control" id="cata" name="catagory">
            @foreach($cata as $data)
                <option value="{{$data->id}}">{{$data->catagory}}</option>
            @endforeach
        </select>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){

            $(document).on('change','#cata',function(){
                var a = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{{URL::to('subcatagory-select')}}',
                    data:{'id':a},
                    success:function(datas){

                        $("select#subcat").empty();
                        $.each(datas,function(i,data){

                            $("select#subcat").append('<option value="'+data.id+'"> '+data.sub_catagory+'</option>');

                        });
                    }
                });

            });
        });

    </script>

    <div class="form-group col-lg-6">
        <label for="select-from">Select Sub-Catagory:<span class="required" style="color:red;">*</span></label>
        <select class="form-control"  id="subcat" name="sub_catagory">
            <option value="">Choose</option>
        </select>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){

            $(document).on('change','#subcat',function(){
                var a = $(this).val();
                $.ajax({
                    type:'get',
                    url: '{{URL::to('childcatagory-select')}}',
                    data:{'id':a},
                    success:function(datas){

                        $("select#childcat").empty();
                        $.each(datas,function(i,data){

                            $("select#childcat").append('<option value="'+data.id+'"> '+data.child_catagory+'</option>');

                        });
                    }
                });

            });
        });

    </script>


    <div class="form-group col-lg-12">
        <label for="select-from">Select Child-Catagory:<span class="required" style="color:red;">*</span></label>
        <select class="form-control"  id="childcat" name="child_catagory">
            <option value="">Choose</option>
        </select>
    </div>
</form>


{{--/////////////////////jumbotron/////////////--}}
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <img src="{{URL::to('backend/images/product/'.$datas->image)}}" style="height:200px">
    </div>
</div>

{{--////////////////panel/////////////////--}}
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
                                    <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#ChildModal"><i class="fa fa-plus"></i>Add here</button>

                                </div>

                            </div>
                        </div>

                        <div class="panel-body">




                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

{{--////ckeditor//////////////--}}
composer require unisharp/laravel-ckeditor
Unisharp\ckeditor\ServiceProvider::class,
php artisan vendor:publish --tag=ckeditor