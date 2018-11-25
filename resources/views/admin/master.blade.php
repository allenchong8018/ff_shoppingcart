<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title> Final Fantasy Action Figure - @yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('/admin_theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('/admin_theme/assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('/admin_theme/assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="    {{asset('/admin_theme/assets/css/demo.css')}}" rel="stylesheet" />

		{{--<link href="{{asset('/node_modules/select2/dist/css/select2.min.css')}}"--}}
		{{--rel="stylesheet"/>--}}

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    {{--<link href="{{asset('/node_modules/select2/dist/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />--}}
    <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" rel="stylesheet">
    <script src="{{asset('/admin_theme/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>

    {{--topbar--}}
    <link type="text/css" href="{{asset('/theme/css/style2.css')}}" rel="stylesheet"/>
    {{--end--}}

    {{--se--}}
    <link rel="stylesheet" href="{{asset('/theme/css/se/square-enix.css')}}" type="text/css">
    {{--end--}}

    {{--hl--}}
    <link href="{{asset('/theme/css/hl/normalize.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/base.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/colorbox.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/swiper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/theme/css/hl/mach2.css')}}" rel="stylesheet" type="text/css" />
    {{----}}

    {{--se--}}
    <link rel="stylesheet" href="{{asset('/theme/css/se/square-enix.css')}}" type="text/css">
    {{--end--}}

    {{--donuts--}}
    <link rel="stylesheet" href="{{asset('/theme/css/donutes/style689730130.css')}}" type="text/css"><!-- custom background -->
    {{--end--}}

    {{--anime action--}}
    <link data-stencil-stylesheet href="{{asset('/theme/css/animeaction/theme1.css')}}" rel="stylesheet">
    {{--end--}}

    {{--return to top arrow--}}
    <link rel="stylesheet" href="{{asset('/theme/css/totop/return-to-top.css')}}" type="text/css">
    {{--end--}}
</head>
<body>

<header id="header" class="hidden-xs">
    <div class="topbar">

        <div class="row">
            <div class="col-sm-6"><div class="tollNum"></div></div>
            <div class="col-sm-6">

                <div class="account-link ">

                    <ul>
                        @if(Auth::check())
                            <li><a href="{{url('/inbox')}}" >INBOX(0)</a></li>
                            <li><a href="{{url('/home')}}">MY ACCOUNT</a></li>
                            <li><a href="{{url('/logout')}}">LOGOUT</a></li>
                        @else
                            <li><a href="{{url('/login')}}">LOGIN</a></li>
                        @endif

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- ======================================================== DESKTOP MENU -->
    <div id="s_desktopmenu">
        <div id="s_header" class="" style="">
            <!--<div class="headerTopLine"></div>-->
            <div class="bg-white-i">
                <div class="container s_colundo bg-white-i">
                    <div class="col-sm-12 s_colundo">
                        <div class="row">
                            <div class="col-xs-12 padd0 divTable-md divTable-lg divTable-sm divTable-md divTable-lg isTable" style="margin-bottom: 0px">
                                <div class="col-sm-2 col-md-1 s_innerdiv divTable-md divTable-lg divTable-sm table-cell valign-middle" style="padding-right: 0px;   ">
                                    <a href="/">
                                        <img src="{{asset('/theme/images/square-enix_logo1.jpg')}}" class="img-responsive" style="max-width: 208px;" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================================== DESKTOP MENU END -->
</header>



<div class="wrapper">

    <div class="sidebar" data-color="blue" data-image="{{asset('/admin_theme/assets/img/faces/face-2.jpg')}}">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('/admin')}}" class="simple-text">

                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('/admin')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/admin/profile')}}">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <li>
                        <a href="{{url('/admin/addProduct')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Product</p>
                        </a>
                </li>

                <li>
                    <a href="{{url('/admin/addCategory')}}">
                        <i class="pe-7s-notebook"></i>
                        <p>Category</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>







    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">

                {{--<div class="collapse navbar-collapse">--}}

                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<li>--}}
                           {{--<a href="{{url('/admin')}}/profile">--}}
                               {{--<p>Account</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                              {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--<p>--}}
										{{--Dropdown--}}
										{{--<b class="caret"></b>--}}
									{{--</p>--}}
                              {{--</a>--}}
                              {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#">Separated link</a></li>--}}
                              {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{url('/logout')}}">--}}
                                {{--<p>Log out</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
						{{--<li class="separator hidden-lg hidden-md"></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </nav>


        @yield('content')

    </div>



    <div id="sqexFooter" class="sqex-footer-black column2">
        <ul>
            <li class="sqex-footer-first"><a href="javascript:void(0);" class="caution">著作権について</a></li>
            <li><a href="#">プライバシーポリシー</a></li>
            <li><a href="#">サポートセンター</a></li>
        </ul>

        <div class="sqex-footer-copy-logo"><p class="sqex-footer-copyright">&copy; <script>document.write(new Date().getFullYear())</script> SQUARE ENIX CO., LTD. All Rights Reserved.</p>

            <div class="social-icons">
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                &nbsp;
                <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                &nbsp;
                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                &nbsp;
                <strong>Square Enix</strong>
            </div>
        </div>


    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="{{asset('/admin_theme/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{asset('/admin_theme/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{asset('/admin_theme/assets/js/bootstrap-checkbox-radio-switch.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('/admin_theme/assets/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('/admin_theme/assets/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  -->
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{asset('/admin_theme/assets/js/light-bootstrap-dashboard.js')}}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	{{--<script src="{{asset('/admin_theme/assets/js/demo.js')}}"></script>--}}
	{{--<script src="{{asset('/node_modules/select2/dist/js/select2.min.js')}}"></script>--}}

	<script type="text/javascript">
    	/*$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to LaraShop55 Admin."

            },{
                type: 'info',
                timer: 4000
            });

    	}); */
	</script>
    <!--  Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</html>
