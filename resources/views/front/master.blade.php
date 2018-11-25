<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Final Fantasy Action Figure</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('/theme/images/favicon.png')}}" type="image/x-icon" />
	<link rel="apple-touch-icon" href="{{asset('/theme/images/favicon.png')}}">

	<meta name="description" content="The Square Enix Store is the official shop for Final Fantasy, Kingdom Hearts, Dragon Quest, soundtracks, merchandise, video games and exclusive collector’s editions." />
	<meta name="keywords" content="Square Enix Store" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="http://cartconnection.ca/" />
	<link rel="stylesheet" type="text/css" href="{{asset('/theme/css/bootstrap2.css')}}" />
	<meta name="viewport" content="initial-scale=1.0"/>
	<style type="text/css">
		@media only screen and (max-width: 1024px) {
			/* rules that only apply for canvases narrower than 1000px */
			.slidearea, #slides{ width:1006px;}
			.slidesjs-pagination{ margin-left:880px;}
		}
	</style>

	{{--Larashop--}}
	<link type="text/css" href="{{asset('/theme/css/bootstrap.css')}}" rel="stylesheet"/>
	<link type="text/css" href="{{asset('/theme/css/font-awesome.css')}}" rel="stylesheet" />
	<link type="text/css" href="{{asset('/theme/css/style.css')}}" rel="stylesheet"/>
	<script type="text/javascript" src="{{asset('/theme/js/jquery-1.11.3.js')}}"></script>
	{{--end--}}

	{{--hl--}}
	<link href="{{asset('/theme/css/hl/normalize.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/base.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/colorbox.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/animate.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/swiper.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/dropzone.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/theme/css/hl/mach.css')}}" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="{{asset('/theme/js/hl/jquery-3_2_1.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/jquery-ui.min.js')}}"></script>

	<script src="{{asset('/theme/js/hl/jquery-migrate-3_0_0.js')}}"></script>

	<script type="text/javascript" src="{{asset('/theme/js/hl/formValidation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/jPushMenu.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/wow.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/mach.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/swiper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/exif.js')}}"></script>
	<script type="text/javascript" src="{{asset('/theme/js/hl/dropzone.js')}}"></script>
	{{--end--}}

	{{--se--}}
	<link rel="stylesheet" href="{{asset('/theme/css/se/square-enix.css')}}" type="text/css">
	{{--end--}}

	{{--donuts--}}
	<link rel="stylesheet" href="{{asset('/theme/css/donutes/style689730130.css')}}" type="text/css"><!-- custom background -->
	{{--end--}}

	{{--anime action--}}
	<link data-stencil-stylesheet href="{{asset('/theme/css/animeaction/theme.css')}}" rel="stylesheet">
	{{--end--}}

	{{--return to top arrow--}}
	<link rel="stylesheet" href="{{asset('/theme/css/totop/return-to-top.css')}}" type="text/css">
	{{--end--}}



	<style>
		.greyBg{ margin-top:20px}
		.inner_msg{
			clear: both;
			padding: 10px;
			margin: 0 auto;
			width:99%;
			background-color:#efefef;
			border:1px solid #ccc;
			min-height: 150px;
		}
		.inner_msg p{
			color:#000; font-size:15px;
			text-align: center;

		}
		.list option{
			margin-top: 10px
		}
		.inboxMain{
			min-height:400px; background-color:#fff; padding:10px;
			border:1px solid #ccc
		}
		.inboxRow{
			border-bottom:1px solid #ccc; padding:10px
		}



	</style>

	{{--add cart successfully messages--}}
	<script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(5000).fadeOut();
        });
	</script>
	{{--end --}}

	{{--update cart successfully messages--}}
	<script>
        $(document).ready(function(){
            $('.alert-info').fadeIn().delay(5000).fadeOut();
        });
	</script>
	{{--end --}}


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
								{{--<li><a href="{{url('/home')}}">MY ACCOUNT</a></li>--}}
								<li><a href="{{url('/logout')}}">LOGOUT</a></li>
							@else
								<li><a href="{{url('/login')}}">LOGIN</a></li>
							@endif
							<li><a onclick="javascript:showDiv('slidingDiv');"
								   href="javascript:;">SEARCH</a>
								<div id="slidingDiv" class="srchBox">
									<form action="{{url('search')}}">
										<input type="text" name="searchData" />
										<i class="fa fa-search"></i>
									</form>
								</div>
							</li>

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
								<div class="col-sm-9 col-md-7 s_innerdiv divTable-sm divTable-md divTable-lg table-cell valign-middle" style="padding: 0;">
									<div class="row s_novicefont divTable-sm divTable-md divTable-lg isTable">

										{{--Product Categories--}}
										<div class="col-sm-1 divTable-sm divTable-md divTable-lg table-cell valign-middle" style="padding: 0px 0px;">

											<div id='productMenu2' class="col-xs-12 paddTB5 otherMenu" style="padding: 5px 8px;">
												<a href='{{asset('/products/')}}' class=" s_contra uppercase a-no-underline fs14 bolder openSansRegular ">
												{{--<a href='javascript:void(0)' class=" s_contra uppercase a-no-underline fs14 bolder openSansRegular ">--}}
													<font color="white">Products</font>
												</a>
												<div id="s_dropmenu2" class="row s_contra">
													<div class="s_bgcolor2">
														<div class="s_bgcolor2 s_colundo">
															<div class="col-sm-12 s_colundo s_bigfont openSansRegular" style="color:black">
																<a href="{{asset('/products/FFVII')}}" style="padding: 0px; margin: 0px; z-index: 0;">
																	<!--style="border-bottom: 1px solid #0099E1;"-->
																	<div class="">
																		<div class="s_bgcolor1 s_innerbox">
																			<div>
																				FFVII
																			</div>
																		</div>
																	</div>
																</a>
																<a href="{{asset('/products/FFXIII')}}" style="padding: 0px; margin: 0px; z-index: 0;">
																	<!--style="border-bottom: 1px solid #0099E1;"-->
																	<div class="">
																		<div class="s_bgcolor1 s_innerbox">
																			<div>
																				FFXIII
																			</div>
																		</div>
																	</div>
																</a>
																<a href="{{asset('/products/FFXV')}}" style="padding: 0px; margin: 0px; z-index: 0;">
																	<!--style="border-bottom: 1px solid #0099E1;"-->
																	<div class="">
																		<div class="s_bgcolor1 s_innerbox">
																			<div>
																				FFXV
																			</div>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										{{--Product Categories end--}}

										<div class="col-sm-1 divTable-sm divTable-md divTable-lg table-cell valign-middle" style="padding: 0px 0px;" >
											<div  class="col-xs-12 paddTB5 otherMenu" style=" padding: 0 10px; " >
												<a href='#' class=" s_contra uppercase a-no-underline fs14 bolder openSansRegular ">
													<font color="white">Announcements</font>
												</a>
											</div>
										</div>

										<div class="col-sm-1 divTable-sm divTable-md divTable-lg table-cell valign-middle" style="padding: 0px 0px;">
											<div  class="col-xs-12 paddTB5 otherMenu" style=" padding: 0 10px; ">
												<a href='#' class=" s_contra uppercase a-no-underline fs14 bolder openSansRegular ">
													<font color="white">Promotions</font>
												</a>
											</div>
										</div>

										<div class="col-sm-1 divTable-sm divTable-md divTable-lg table-cell valign-middle" style="padding: 0px 0px;">
											<div  class="col-xs-12 paddTB5 otherMenu" style=" padding: 0 10px; ">
												<a href='#' class=" s_contra uppercase a-no-underline fs14 bolder openSansRegular ">
													<font color="white">Support</font>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!--style="border-left: 1px solid #B8B8B8;"-->
								<div class="col-md-2 s_innerdiv hidden-sm divTable-sm divTable-md divTable-lg table-cell valign-middle paddL0 paddR0">
									<div id="googleSearch" style="display: none;">
										<script>
                                            (function () {
                                                var cx = '003038476646595042598:slmykotzdni';
                                                var gcse = document.createElement('script');
                                                gcse.type = 'text/javascript';
                                                gcse.async = true;
                                                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                                                var s = document.getElementsByTagName('script')[0];
                                                s.parentNode.insertBefore(gcse, s);
                                            })();
										</script>
										<gcse:searchbox-only></gcse:searchbox-only>
									</div>
								</div>
								<!--border: 1px solid #B8B8B8;-->
								<div class="col-sm-1 s_innerdiv divTable-sm divTable-md divTable-lg table-cell valign-middle paddL10 paddR0" style="border-top-width: 0px; border-bottom-width: 0px">
									<div class="s_innerright bg-white-i text-center col-xs-12 paddLR0 valign-middle" style="color: #484848; width: 95px; border-width: 0">
										<a href="{{url('/cart')}}" class="a-no-underline">
											<div class="col-xs-12 paddTB15 paddLR0 valign-middle" style="color: white">
												<img src="{{asset('/theme/images/favicon2.png')}}" /><b>CART({{Cart::count()}})</b>
											</div>
										</a>
									</div>
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

<!-- ------------------------ PAGE CONTENT -->

<div class="swiper-container landing_banner">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<div class="container full-width padd0 bg-no-repeat bg-cover bg-position-top-center bg-img-none-sm bg-img-none-xs ff7" style="position: relative">
				<div class="hidden-lg hidden-md container full-width bg-no-repeat bg-cover bg-position-top-left landing"
					 style="position: absolute; top: 0; left: 0; right: 0; height: 440px; transform: translate3d(0px, 0px, 0px);"></div>

				<div class="container transparent paddB20">
					<div class="row">
						<div class="col-xs-12 padd0">
							<div class="col-xs-12 paddLR0-lg paddLR0-md">
								<div class="col-xs-12 col-md-8 padd0">
									<div class="hidden-sm hidden-xs">
										<div class="col-xs-12 paddT96-lg paddT96-md paddLR0 paddB0 color-white">
											<div class="col-xs-12 hidden-sm hidden-xs" style="height: 180px"></div>
											<div class="col-xs-12 col-md-9 col-md-offset-3 padd0 openSansBold s_greaterfont3 text-shadow">
                                                <span>
													興味はありません
													<br class="hidden-xs hidden-sm hidden-md" />
                                                </span>
											</div>

											<div class="col-xs-12 hidden-sm hidden-xs" style="height: 10px"></div>

											<div class="col-xs-12 col-md-9 col-md-offset-3 padd0 openSansRegular openSansRegular bolder fs14 ls1-25">
												<a href="{{url('products/FFVII')}}" class="a-no-underline cur-pointer">
													<div class="col-xs-12 text-center" style="max-width: 200px; padding: 15px 0px; background-color: #000000">
														<div class="ffmoredetails">FIND OUT MORE</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-12 padd0 visible-sm visible-xs" style="height: 10px"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="swiper-slide">
			<div class="container full-width padd0 bg-no-repeat bg-cover bg-position-top-center bg-img-none-sm bg-img-none-xs ff13" style="position: relative">
				<div class="hidden-lg hidden-md container full-width bg-no-repeat bg-cover bg-position-top-left ff13"
					 style="position: absolute; top: 0; left: 0; right: 0; height: 440px; transform: translate3d(0px, 0px, 0px);"></div>

				<div class="container transparent paddB20">
					<div class="row">
						<div class="col-xs-12 padd0">
							<div class="col-xs-12 paddLR0-lg paddLR0-md">
								<div class="col-xs-12 col-md-8 padd0">
									<div class="hidden-sm hidden-xs">
										<div class="col-xs-12 paddT96-lg paddT96-md text-shadow paddLR0 paddB0 color-white">
											<div class="col-xs-12 hidden-sm hidden-xs" style="height: 80px"></div>
											<div class="col-xs-12 padd15">
												<h1 class="margin0 fs35 openSansBold uppercase">
													<span class="openSansBold">
                                                        何も私は処理できません。
                                                    </span>
												</h1>
												<div class="hidden-sm hidden-xs" style="height: 10px"></div>
												<div class="col-xs-12" style="height: 0px"></div>
												<div class="col-xs-12 col-md-9 padd0 openSansRegular bolder fs14 ls1-25">
													<a href="{{url('products/FFXIII')}}" class="a-no-underline cur-pointer">
														<div class="col-xs-12 text-center" style="max-width: 200px; padding: 15px 0px; background-color: #EFBCBE">
															<div class="ffmoredetails">FIND OUT MORE</div>
														</div>

													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-12 padd0 visible-sm visible-xs" style="height: 10px"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="swiper-slide">
			<div class="container full-width padd0 bg-no-repeat bg-cover bg-position-top-center bg-img-none-sm bg-img-none-xs ff15" style="position: relative">

				<div class="hidden-lg hidden-md container full-width bg-no-repeat bg-cover bg-position-top-left ff15"
					 style="position: absolute; top: 0; left: 0; right: 0; height: 440px; transform: translate3d(0px, 0px, 0px);"></div>

				<div class="container transparent paddB20">
					<div class="row">

						<div class="col-xs-12 padd0">
							<div class="col-xs-12 paddLR0-lg paddLR0-md">

								<div class="col-xs-12 col-md-8 padd0">
									<div class="hidden-sm hidden-xs">
										<div class="col-xs-12 col-md-12 paddTB15LR0 text-shadow paddT60-lg color-white">
											<div class="col-xs-12 hidden-sm hidden-xs" style="height: 230px"></div>
											<div class="col-xs-12 paddT60-lg paddT60-md paddLR0">
												<h1 class="margin0 fs35 openSansBold uppercase">
													<span class="openSansBold">
                                                        私はロイヤルガードは必要ありません！
                                                    </span>
												</h1>
												<div class="hidden-sm hidden-xs" style="height: 10px"></div>

												<div class="hidden-sm hidden-xs" style="height: 0px"></div>
												<div class="col-xs-12 col-md-9 padd0 openSansRegular bolder fs14 ls1-25">
													<a href="{{url('products/FFXV')}}" class="a-no-underline cur-pointer">
														<div class="col-xs-12 text-center" style="max-width: 200px; padding: 15px 0px; background-color: #5879E6">
															<div class="ffmoredetails">FIND OUT MORE</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-12 padd0 visible-sm visible-xs" style="height: 10px"></div>

								<div class="col-xs-12 col-md-4 paddT96-lg paddT96-md paddT15-xs paddT15-sm paddLR0 paddB0" style="display: none;">


								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next right carousel-control" style="">
		<img src="{{asset('/theme/images/landing/arrow_right.png')}}" alt="right" style="max-width: 18px; max-height: 38px; height: 100%;"/>
	</div>
	<div class="swiper-button-prev left carousel-control" style="">
		<img src="{{asset('/theme/images/landing/arrow_left.png')}}" alt="left" style="max-width: 18px; max-height: 38px; height: 100%;"/>
	</div>
</div>

<script>

    $(document).ready(function () {
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 0,
            autoResize: false,
            autoplay: 100000,
            grabCursor: true,
            visibilityFullFit: true,
            autoplayDisableOnInteraction: true,
            loop: true
        });


        $(".swiper-container").on("mouseenter", function () {
            swiper.stopAutoplay();
        }).on("mouseleave", function () {
            swiper.startAutoplay();
        });
    });

</script>

<!-- ------------------------ PAGE CONTENT END -->


@yield('content')

<!-- === footerArea === -->
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

<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!-- === /Nav to top bar === -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<!-- === /Nav to top bar === -->



<script type="text/javascript" src="{{asset('/theme/js/html5.js')}}"></script>
<script type="text/javascript" src="{{asset('/theme/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/theme/js/multiple-accordion.js')}}"></script>
<script type="text/javascript" src="{{asset('/theme/js/jquery.nice-select.js')}}"></script>
<script type="text/javascript" src="{{asset('/theme/js/jquery.bootstrap-responsive-tabs.js')}}"></script>


<script>
    $(function() {
        var html = $('html, body'),
            navContainer = $('.nav-container'),
            navToggle = $('.nav-toggle'),
            navDropdownToggle = $('.has-dropdown');
        // Nav toggle
        navToggle.on('click', function(e) {
            var $this = $(this);
            e.preventDefault();
            $this.toggleClass('is-active');
            navContainer.toggleClass('is-visible');
            html.toggleClass('nav-open');
        });
    });
</script>
<script language="JavaScript">
    $(document).ready(function() {
        $(".topnav").accordion({
            accordion:false,
            speed: 500,
            closedSign: '+',
            openedSign: '-'
        });
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select').niceSelect();
        //  FastClick.attach(document.body);
    });
</script>
<script>
    $('.responsive-tabs').responsiveTabs({
        accordionOn: ['xs', 'sm']
    });
</script>
<script type="text/javascript">
    function showDiv(divname){
        closealldivs(divname);
        $("#"+divname).slideToggle();
    }
    function closeMe(trgt)
    {
        $("#slidingDiv"+trgt).toggle();
    }
    function closealldivs(divname){
        for(var i=1; i<=3; i++){
            var abc="slidingDiv"+i;
            if(divname!=abc){
                $("#slidingDiv"+i).hide(); }
        }}
</script>
<script type="text/javascript">
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>

<style>
	.stButton .stFb, .stButton .stTwbutton, .stButton .stMainServices {
		height: 25px;
	}
</style>


<style>
	form.gsc-search-box {
		margin: 0 !important;
	}

	.gsc-input[name='search'] {
		background: url('./images/text_search.png') left center no-repeat rgb(255, 255, 255);
		border: 0px solid transparent !important;
		padding-left: 5px !important;
	}

	.gsc-input[name='search']:focus {
		background: rgb(255, 255, 255) !important;
	}

	.gsc-search-box .gsc-input>input:focus,
	.gsc-input-box-focus {
		border: 1px solid #4d90fe;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
		outline: none;
	}

	.gsq_a table tbody tr td span:hover,
	.gsc-search-box .gsc-input>input:hover, .gsc-input-box-hover {
		border: 0px solid transparent !important;
		box-shadow: none !important;
		-webkit-box-shadow: none !important;
	}

	table.gsc-search-box td {
		padding: 0px !important;
	}

	.gsc-input-box {
		border: 0px solid transparent !important;
		background: transparent !important;
	}

	table.gsc-search-box td.gsc-input {
		padding: 7px !important;
	}
	.gsc-control-searchbox-only.gsc-control-searchbox-only-en{
		padding: 0px 10px 0px 0px;
		border: 1px solid rgb(137, 137, 137);
		/* border-radius: 6px; */
		/*border-radius: initial !important;*/
		/*border-top: none !important;*/
		/*border-left: none !important;*/
		/*border-right: none !important;*/
		height: 35px !important;
		/*      border-bottom: 2px solid rgb(137,137,137) !important;*/
		/*border-bottom: none !important;*/
	}

	.gsq_a table tbody tr td span{
		/*padding: 30px;*/
		border: 0px solid transparent !important;
		box-shadow: none !important;
		-webkit-box-shadow: none !important;
	}

	.gssb_a div{
		background-position: center left !important;
	}

	.activeProductMenuBorder{
		border-bottom: 2px solid #D60137;
	}

	.activeApplyMenuBorder, .appActive{
		border-bottom: 2px solid #D60137;
	}
</style>

<script type="text/javascript">
    // ===== Scroll to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
</script>
<script type="text/javascript" src="{{asset('/theme/js/hl/mach_2.js')}}"></script>

</body>
</html>
