{{--@extends('errors::minimal')--}}

{{--@section('title', __('Forbidden'))--}}
{{--@section('code', '403')--}}
{{--@section('message', __($exception->getMessage() ?: 'Forbidden'))--}}

@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url(assets('admin'))}}/pages/css/error.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
@section('content')


    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ url('admin/home') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>403 Error</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 page-404">
                <div class="number font-green"> 403 </div>
                <div class="details">
                    <h3>Oops! You're lost.</h3>
                    <p><b> Sorry! You do not have permission to show this page.</b>
                    <br/>
                        <a href="{{ url('admin/home') }}"> Return home </a>. </p>
                </div>
            </div>
        </div>
    </div>
@endsection
