<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My simple Forum</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset("layout/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Custom -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="{{ asset("layout/css/custom.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset("layout/font-awesome-4.0.3/css/font-awesome.min.css") }}">

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset("layout/css/style.css") }}" media="screen"/>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset("layout/rs-plugin/css/settings.css") }}" media="screen"/>
    @yield('header')
</head>
<body>

<div class="container-fluid">

    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset("layout/images/6-01.jpg") }}" alt="slidebg1" data-bgfit="contain"
                         data-bgposition="center" data-bgrepeat="repeat-x" data-bgsize="auto">
                    <!-- LAYERS -->
                </li>
            </ul>
        </div>
    </div>
    <!-- //Slider -->

    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ url('/home') }}"><img
                            src="{{ asset("layout/images/logo.jpg") }}"
                            alt=""/></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a href="/">Simple Forum</a>

                    </div>
                </div>
                <div class="col-lg-2 search hidden-xs hidden-sm col-md-3">

                </div>
                <div class="col-lg-6 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <form action="/create" method="get" class="form">
                            <button class="btn btn-primary">Tạo bài viết mới</button>
                        </form>
                    </div>
                    <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                    @guest
                        <div>
                            <a type="button" class="btn btn-info" href="{{ route('login') }}">đăng nhập</a>
                        </div>
                    @endguest

                    @auth
                        <div class="avatar pull-left dropdown">
                            <a data-toggle="dropdown" href="#">
                                @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                <img src="{{ asset('/storage/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}"
                                     alt="" width="40px" height="40px"/></a>
                                @else
                                <img src="{{ asset("layout/images/avatar.jpg") }}"
                                     alt="" width="40px" height="40px"/></a>
                                @endif

                            <b class="caret"></b>

                            <ul class="dropdown-menu" role="menu">
                                @if(\Illuminate\Support\Facades\Auth::user()->is_admin==1)
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="admin">Admin
                                            Dashboard</a></li>
                                @endif

                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('profile/'.\Illuminate\Support\Facades\Auth::id())}}">Thông tin cá nhân</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-3" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    @endauth


                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <section class="content" style="min-height: 550px">
        <div class="container" style="padding-top:25px">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- POST -->
                    @yield('content')
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- -->
                    <div class="sidebarblock">
                        <h3>Chuyên mục</h3>
                        <div class="divline"></div>
                        <div class="blocktxt">
                            <ul class="cats">
                                @foreach(\App\Models\Category::all() as $item)
                                    <li><a href="{{ url('category/'.$item->id) }}">{{ $item->category_name }} <span
                                                class="badge pull-right">{{\Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',$item->id)->count()}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <!-- -->
                    <div class="sidebarblock">
                        @guest()
                            <h3>Bài viết của tôi</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <p>Đăng nhập và tạo bài viết nào!</p>
                            </div>

                        @endguest
                        @auth()
                            <h3>Bài viết của tôi</h3>
                            @foreach(\App\Models\Post::where('author_id',\Illuminate\Support\Facades\Auth::user()->id)->take(5)->get() as $mine)
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="{{ url('/show/'.$mine->id) }}">{{ $mine->title }}</a>
                                </div>
                            @endforeach
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="images/logo.jpg" alt=""/></a></div>
                <div class="col-lg-8 col-xs-9 col-sm-5 ">2020, Simple Forum - HUST</div>
                <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                    <ul class="socialicons">
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-cloud"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- get jQuery from the google apis -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>


<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset("layout/rs-plugin/js/jquery.themepunch.plugins.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("layout/rs-plugin/js/jquery.themepunch.revolution.min.js") }}"></script>

<script src="{{ asset("layout/js/bootstrap.min.js") }}"></script>


<!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
<script type="text/javascript">

    var revapi;

    jQuery(document).ready(function () {
        "use strict";
        revapi = jQuery('.tp-banner').revolution(
            {
                delay: 15000,
                startwidth: 1200,
                startheight: 278,
                hideThumbs: 10,
                fullWidth: "on"
            });

    });	//ready

</script>

<!-- END REVOLUTION SLIDER -->
@yield('extension')
</body>
</html>
