@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

    <style>
        .control-label {
            text-align: left !important;
        }
    </style>
@endsection
@section('content')
<div class="page-content">

    <h1 class="page-title"> Admin Profile
        <small></small>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-body form">
                    {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'edit-admin']) !!}
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
                            <label>Email address</label>
                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                <input type="email" name="email" class="form-control" value="{{auth()->guard('admin')->user()->email ?? ""}}" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                <input type="text" name="phone" class="form-control" value="{{auth()->guard('admin')->user()->phone ?? ""}}" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                <input type="text" name="address" class="form-control" value="{{auth()->guard('admin')->user()->address ?? ""}}" placeholder="Address">
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
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn green btn-circle save"><i class="fa fa-check"></i> Save
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
            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"
                    type="text/javascript"></script>

            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                    type="text/javascript"></script>
            <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->

            <script src="{{url(assets('admin'))}}/js/profile.js" type="text/javascript"></script>



@stop
