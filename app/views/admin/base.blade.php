<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> 微笑送餐后台管理系统 </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/bootstrap.min.css') }}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/font-awesome.min.css') }}}">

    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    <link rel="stylesheet" type="text/css" media="screen"
          href="{{{ asset('assets/css/smartadmin-production.min.css') }}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/smartadmin-skins.min.css') }}}">

    <!-- SmartAdmin RTL Support is under construction
         This RTL CSS will be released in version 1.5
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/demo.min.css') }}}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{{ asset('assets/img/favicon/favicon.ico') }}}" type="image/x-icon">
    <link rel="icon" href="{{{ asset('assets/img/favicon/favicon.ico') }}}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">-->

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{{ asset('assets/img/splash/sptouch-icon-iphone.png') }}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{{ asset('assets/img/splash/touch-icon-ipad.png') }}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{{ asset('assets/img/splash/touch-icon-iphone-retina.png') }}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{{ asset('assets/img/splash/touch-icon-ipad-retina.png') }}}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{{ asset('assets/img/splash/ipad-landscape.png') }}}"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{{ asset('assets/img/splash/ipad-portrait.png') }}}"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{{ asset('assets/img/splash/iphone.png') }}}"
          media="screen and (max-device-width: 320px)">
    <script src="{{{ asset('assets/js/libs/jquery-2.0.2.min.js') }}}"></script>
    <script src="{{{ asset('assets/js/libs/jquery-ui-1.10.3.min.js') }}}"></script>

</head>
<body class=" desktop-detected pace-done">
<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

<!-- HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo"> <img style="width: 210px;" src="{{{ asset('assets/img/logo4.png') }}}"
                              alt="SmartAdmin"> </span>
        <!-- END LOGO PLACEHOLDER -->
    </div>

    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i
                        class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                    <img src="{{{ asset('assets/img/avatars/sunny.png') }}}" alt="John Doe" class="online"/>
                </a>
                <ul class="dropdown-menu pull-right">
                    <!--<li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i
                                class="fa fa-cog"></i> Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                class="fa fa-user"></i> <u>P</u>rofile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> 全屏</a>
                    </li>-->
                    <li class="divider"></li>
                    <li>
                        <a href="/admin/logout" class="padding-10 padding-top-5 padding-bottom-5"
                           data-action="userLogout"><i
                                class="fa fa-sign-out fa-lg"></i> <strong>注销</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="/admin/logout" title="注销" data-action="userLogout"
                      data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i
                        class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="全屏"><i
                        class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

@include('admin.menu')

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-title="refresh" rel="tooltip" data-placement="bottom"
                  data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings."
                  data-html="true">
				<i class="fa fa-refresh"></i>
			</span>
		</span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>主面板</li>
            <li class="liselected">主面板</li>
            <script>
                $(function(){
                        $(".liselected").html($('.active .menu-item-parent').text());
                });
            </script>
        </ol>
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <!--<div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span>
                </h1>
            </div>

        </div>-->

        @if (isset($alert))
        <div class="alert alert-block alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading"><i class="fa fa-info-circle"></i> {{{ $alert['title'] }}}</h4>

            <p>
                {{{ $alert['content'] }}}
            </p>
        </div>
        @endif

        <!-- widget grid -->
        <section id="widget-grid" class="">
            @yield('content-main')
        </section>

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">SmartAdmin WebApp © 2013-2014</span>
        </div>

        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
            <div class="txt-color-white inline-block">
                <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i>
                    <strong>52 mins ago &nbsp;</strong> </i>

                <div class="btn-group dropup">
                    <button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
                        <i class="fa fa-link"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right text-left">
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Download Progress</p>

                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 50%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Server Load</p>

                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 20%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span>
                                </p>

                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <button class="btn btn-block btn-default">refresh</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
<div id="shortcut">
    <ul>
        <li>
            <a href="#inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i
                        class="fa fa-envelope fa-4x"></i> <span>Mail <span
                            class="label pull-right bg-color-darken">14</span></span> </span> </a>
        </li>
        <li>
            <a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i
                        class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
            <a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i
                        class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
            <a href="#invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i
                        class="fa fa-book fa-4x"></i> <span>Invoice <span
                            class="label pull-right bg-color-darken">99</span></span> </span> </a>
        </li>
        <li>
            <a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i
                        class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span
                    class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }'
        src="{{{ asset('assets/js/plugin/pace/pace.min.js') }}}"></script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{{ asset('assets/js/app.config.js') }}}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="{{{ asset('assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{{ asset('assets/js/bootstrap/bootstrap.min.js') }}}"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="{{{ asset('assets/js/notification/SmartNotification.min.js') }}}"></script>

<!-- JARVIS WIDGETS -->
<script src="{{{ asset('assets/js/smartwidgets/jarvis.widget.min.js') }}}"></script>

<!-- EASY PIE CHARTS -->
<script src="{{{ asset('assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}}"></script>

<!-- SPARKLINES -->
<script src="{{{ asset('assets/js/plugin/sparkline/jquery.sparkline.min.js') }}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{{ asset('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{{ asset('assets/js/plugin/masked-input/jquery.maskedinput.min.js') }}}"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="{{{ asset('assets/js/plugin/select2/select2.min.js') }}}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{{{ asset('assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}}"></script>

<!-- browser msie issue fix -->
<script src="{{{ asset('assets/js/plugin/msie-fix/jquery.mb.browser.min.js') }}}"></script>

<!-- FastClick: For mobile devices -->
<script src="{{{ asset('assets/js/plugin/fastclick/fastclick.min.js') }}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
<script src="{{{ asset('assets/js/demo.min.js') }}}"></script>

<!-- MAIN APP JS FILE -->
<script src="{{{ asset('assets/js/app.min.js') }}}"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="{{{ asset('assets/js/speech/voicecommand.min.js') }}}"></script>


<!-- PAGE RELATED PLUGIN(S) -->
@yield('load-page-related-plugins')

<script>
    $(document).ready(function () {
        pageSetUp();
    })
</script>

@yield('append-script-on-ready')

</body>

</html>