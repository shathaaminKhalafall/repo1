@extends(admin_layout_vw().'.index')

@section('css')
    <link href="{{url(assets('admin'))}}/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url(assets('admin'))}}/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />



@endsection
@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" id="requests_num"
                                      data-value="{{$admins ?? 0}}"></span>
                            </h3>
                            <small>Admins</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" id="talents_num"
                                      data-value="{{$works ?? 0}}"></span>
                            </h3>
                            <small>Works</small>
                        </div>
                        <div class="icon">
                            <i class="icon-layers"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <style>
        /* rotate the x axis labels. */
        .flot-x-axis div {
            /*white-space: nowrap;*/
            transform: rotate(-45deg);
            /*text-indent: -100%;*/
            /*transform-origin: top center;*/
            /*text-align: right !important;*/
            /*top: 200px !important;*/
        }
    </style>
    <script src="{{url(assets('admin'))}}/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/counterup/jquery.waypoints.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/counterup/jquery.counterup.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/light.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/patterns.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amcharts/themes/chalk.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/ammap/maps/js/worldLow.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/amcharts/amstockcharts/amstock.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/fullcalendar/fullcalendar.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/horizontal-timeline/horizontal-timeline.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.resize.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/flot/jquery.flot.categories.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js"
            type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{url(assets('admin'))}}/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/pages/scripts/table-datatables-responsive.min.js"
            type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url(assets('admin'))}}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/pages/scripts/dashboard.js" type="text/javascript"></script>
    <script src="{{url(assets('admin'))}}/js/users.js" type="text/javascript"></script>

@stop
