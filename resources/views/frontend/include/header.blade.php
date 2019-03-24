<header id="site-header" class="site-header style2">
    <!-- Start Topbar -->

    <div class="topbar">
        <div class="container">
            <div class="row">
                @foreach($company_detail as $data)
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Text -->
                    <p>{{$data->slogan}} </p>
                    <!--/ End Text -->
                </div>
                @endforeach
                @foreach($social as $data)
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Social -->
                    <ul class="social">
                        <li><a href="{{$data->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$data->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="{{$data->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$data->google}}"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                    <!--/ End Social -->
                </div>
                    @endforeach
            </div>
        </div>
    </div>

    <!--/ End Topbar -->
    <!-- Middle Header -->
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <!-- Logo -->
                    @foreach($company_detail as $data)
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{URL::to('backend/images/companylogos/'.$data->company_logo)}}" alt="logo" style="height:90px;width: 132px;"></a>
                    </div>
                    @endforeach
                    <!--/ End Logo -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <!-- Header Widget -->
                    <div class="header-widget">

                        <!-- Single Widget -->
                        @foreach($branch as $data)
                        <div class="single-widget">
                            <h4 style="color: #df0817 !important;"><i class="fa fa-home"></i>&nbsp;{{$data->office_type}}</h4>
                            <p><i class="fa fa-map-marker" ></i>&nbsp;{{$data->address}}</p>
                            <p><i class="fa fa-phone" ></i>&nbsp;{{$data->phone}}</p>
                        </div>
                        @endforeach
                        <!--/ End Single Widget -->

                        @foreach($company_detail as $data)
                        <div class="years">
                            <a href="#"><img src="{{URL::to('backend/images/companylogos/'.$data->celebration_logo)}}" alt="logo" style="height:89px;width: 90px;"></a>
                        </div>
                            @endforeach
                    </div>
                    <!--/ End Header Widget -->
                </div>
            </div>
        </div>
    </div>

    <!-- End Middle Header -->
    <!-- Header Bottom -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Main Menu -->
                    <div class="main-menu">
                        <nav class="navigation">
                            <ul class="nav menu">
                                <li class="{{Request::path() == '/' ? "active": ''}}"><a href="{{route('index')}}">Home</a></li>

                                <li><a href="#">About <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown">
                                        <li class="{{Request::path() == 'about' ? "active": ''}}"><a href="{{route('fabout')}}">Introduction</a></li>
                                        <li class="{{Request::path() == 'chairman-msg' ? "active": ''}}"><a href="{{route('chairman_msg')}}">Chairman Message</a></li>
                                        <li class="{{Request::path() == 'executive-msg' ? "active": ''}}"><a href="{{route('executive_msg')}}">Executive Director Message</a></li>
                                    </ul>
                                </li>

                                <li class="{{Request::path() == 'one-day-tour' ? "active": ''}}"><a href="{{route('one_day')}}">one day tour </a></li>
                                <li class="{{Request::path() == 'tour' ? "active": ''}}"><a href="{{route('ftour')}}">Tour</a></li>
                                <li class="{{Request::path() == 'india-tour' ? "active": ''}}"><a href="{{route('findia_tour')}}">India Tour</a></li>
                                <li class="{{Request::path() == 'adventure' ? "active": ''}}"><a href="{{route('fadventure')}}">Adventure </a></li>
                                <li class="{{Request::path() == 'ticketing' ? "active": ''}}"><a href="{{route('fticketing')}}">ticketing </a></li>
                                <li class="{{Request::path() == 'company' ? "active": ''}}"><a href="#"> our companies <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown">
                                        @foreach($overseas as $data)
                                        <li><a href="{{route('company_details',['slug'=>$data->slug])}}">{{$data->company_name}} </a></li>
                                            @endforeach
                                    </ul>
                                </li>
                                <li class="{{Request::path() == 'gallery' ? "active": ''}}"><a href="{{route('fgallery')}}">Gallery</a></li>
                                <li class="{{Request::path() == 'contact' ? "active": ''}}"><a href="{{route('contact')}}">Contact </a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--/ End Main Menu -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Bottom -->
</header>