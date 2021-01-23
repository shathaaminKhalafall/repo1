@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE LEVEL PLUGINS -->
    <style>
        .form .form-section, .portlet-form .form-section {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endsection
@section('content')

    <div class="page-content">

        <h1 class="page-title"> Admin Profile
            <small></small>
        </h1>
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-body form">
                        {!! Form::open(['method'=>'PUT']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                    <input type="text" name="name" class="form-control" value="{{auth()->guard('admin')->user()->name ?? ""}}" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                    <input type="email" name="email" class="form-control" value="{{auth()->guard('admin')->user()->email ?? ""}}" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Password">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Confirmation</label>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                           placeholder="Password Confirmation">

                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn blue save"><i class="fa fa-check"></i> Save
                                    </button>
                                </div>
                            </div>
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>

    </div>
@endsection

@section('js')

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{url('/')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{url('/')}}/assets/js/admins.js" type="text/javascript"></script>

@stop
