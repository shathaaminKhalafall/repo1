{{--@extends('errors::minimal')--}}

{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}

    <!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | Error 404</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #2 for 404 page option 3" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url(assets('admin'))}}/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url(assets('admin'))}}/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{url(assets('admin'))}}/pages/css/error.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{url('/')}}/assets/website/assets/images/logo.png">
</head>
<!-- END HEAD -->

<body class=" page-404-3">
<div class="page-inner">
    <img src="{{url(assets('admin'))}}/pages/media/pages/earth.jpg" class="img-responsive" alt=""> </div>
<div class="container error-404">
    <h1>404</h1>
    <h2>Sorry, we have a problem.</h2>
    <p> Actually, the page you are looking for does not exist. </p>
    <p>
        <a href="{{ url('admin/home') }}" class="btn green btn-outline"> Return home </a>
        <br> </p>
</div>
<!--[if lt IE 9]>
<script src="{{url(assets('admin'))}}/global/plugins/respond.min.js"></script>
<script src="{{url(assets('admin'))}}/global/plugins/excanvas.min.js"></script>
<script src="{{url(assets('admin'))}}/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{url(assets('admin'))}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
