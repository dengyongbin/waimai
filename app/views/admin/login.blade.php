<!DOCTYPE html>
<html lang="zh-CN" id="extr-page">
<head>
    <meta charset="utf-8">
    <title> 微笑送餐后台管理系统</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/bootstrap.min.css') }}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/font-awesome.min.css') }}}">

    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/smartadmin-production.min.css') }}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{{ asset('assets/css/smartadmin-skins.min.css') }}}">

    <!-- SmartAdmin RTL Support is under construction
         This RTL CSS will be released in version 1.5
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{{ asset('assets/img/favicon/favicon.ico') }}}" type="image/x-icon">
    <link rel="icon" href="{{{ asset('assets/img/favicon/favicon.ico') }}}" type="image/x-icon">

</head>

<body class="animated fadeInDown">

<header id="header">
    <div id="logo-group">
        <span id="logo"> <img src="{{{ asset('assets/img/logo.png') }}}" alt="SmartAdmin"> </span>
    </div>
</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">

                    <!--                            <form action="../../../../../../../../Downloads/HTML_version/index.html" id="login-form" class="smart-form client-form">-->
                    {{ Form::open(array('action' => 'AdminDashboardController@login', 'id' => 'login-form', 'class' => 'smart-form client-form')) }}
                    <header>
                        登录
                    </header>

                    <fieldset>

                        <section>
                            <label class="label">帐号</label>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="email" name="email">
                                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> 请输入帐号</b></label>
                        </section>

                        <section>
                            <label class="label">密码</label>
                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password">
                                <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> 请输入密码</b> </label>
                            <!--<div class="note">
                                <a href="../../../../../../../../Downloads/HTML_version/forgotpassword.html">Forgot password?</a>
                            </div>-->
                        </section>

                        <!--<section>
                            <label class="checkbox">
                                <input type="checkbox" name="remember" checked="">
                                <i></i>Stay signed in</label>
                        </section>-->
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary">
                            登录
                        </button>
                    </footer>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

</div>

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="{{{ asset('assets/js/plugin/pace/pace.min.js') }}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script> if (!window.jQuery) { document.write('<script src="{{{ asset('assets/js/libs/jquery-2.0.2.min.js') }}}"><\/script>');} </script>

<script> if (!window.jQuery.ui) { document.write('<script src="{{{ asset('assets/js/libs/jquery-ui-1.10.3.min.js') }}}"><\/script>');} </script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
<script src="{{{ asset('assets/js/bootstrap/bootstrap.min.js') }}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{{ asset('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{{ asset('assets/js/plugin/masked-input/jquery.maskedinput.min.js') }}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="{{{ asset('assets/js/app.min.js') }}}"></script>

<script type="text/javascript">
    runAllForms();

    $(function() {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules : {
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password : {
                    required : 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

</body>
</html>