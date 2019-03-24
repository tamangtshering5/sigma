@extends('backend.pages.master')

@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">

                    <div class="x_title">
                        @if(session('alert'))
                            <p class="alert alert-success"> {{session('alert')}}   </p>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <h2><i class="fa fa-tag"></i>&nbsp;User Profile </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>
                        {{--profile design--}}

                        <div class="col-md-6 col-sm-6 col-xs-12 center-margin">
                            <div class="profile_img">
                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        <img src="{{URL::to('backend/images/profile_image/'.Auth::user()->image)}}" alt="Avatar">
                                    </div>
                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                </div>

                            </div>
                            <h3>{{Auth::user()->name}}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> {{Auth::user()->address}}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{Auth::user()->profession}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://grafiastech.com/" target="_blank">www.grafiastech.com</a>
                                </li>
                            </ul>

                            <a class="btn btn-success" href="{{route('edit_adminprofile')}}" style="background: #1abb9c;"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <a class="btn btn-success" href="{{route('register')}}" style="background: #1abb9c;"><i class="fa fa-plus"></i>Add Users</a>

                        </div>

                    </div>
                </div>


                {{--,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,--}}


                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-tags"></i> All Users </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li ><a class="collapse-link"><i class="fa fa-chevron-up" style="color:green;"></i></a>
                            </li>
                            <li ><a class="close-link"><i class="fa fa-close" style="color:firebrick;"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="color:#73879c;">Image</th>
                                <th style="color:#73879c;">Email</th>
                                <th style="color:#73879c;">Address</th>
                                <th style="color:#73879c;">Profession</th>
                                <th style="color:#73879c;">Action</th>
                            </tr>
                            </thead>
                            <tbody>



                            @foreach($pem as $data)
                                <tr>
                                    <td><img src="{{URL::to('backend/images/profile_image/'.$data->image)}}" style="height:80px;width:80px;"></td>
                                    <td>{{$data->email}} </td>
                                    <td>{{$data->address}} </td>
                                    <td >{{$data->profession}}</td>
                                    <td>

                                        <form action="{{route('profile_del',['id'=>$data->id])}}" method="post">
                                            {{ csrf_field() }}

                                            <button class="btn btn-danger btn-xs" title="delete"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>

                                    </td>

                                    @endforeach
                                </tr>

                            </tbody>


                        </table>



                    </div>
                </div>



                {{--,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,--}}
            </div>
        </div>


    </div>






@endsection
