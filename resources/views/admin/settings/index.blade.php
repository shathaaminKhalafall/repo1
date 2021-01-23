@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
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

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="{{$icon}} font-dark"></i>
                            <span class="caption-subject bold uppercase"> Settings</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        {{--`title`, `description_ar`--}}
                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="settings_tbl">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Key</th>
                                <th> Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{url('/')}}/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    {{--<script type="text/javascript" src="javascripts/jquery.googlemap.js"></script>--}}
    {{--    <script src="{{url('/')}}/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>--}}

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{url('/')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    {{--<script src="{{url('/')}}/assets/pages/scripts/maps-google.min.js" type="text/javascript"></script>--}}
    {{--    <script src="{{url('/')}}/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>--}}

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url('/')}}/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>

    {{--<script src="{{url('/')}}/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>--}}
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{url('/')}}/assets/js/setting.js" type="text/javascript"></script>

@stop
