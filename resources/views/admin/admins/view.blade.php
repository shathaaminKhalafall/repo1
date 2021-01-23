@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{assets('admin')}}/global/css/components-md.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{assets('admin')}}/global/css/plugins-md.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <style>
        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
        .toppad
        {margin-top:20px;
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
                            <i class="fa fa-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Admin Profile</span>
                        </div>
                    </div>
                    <div class="portlet-body">

    <div class="toppad" >

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{{$admin->name}}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <div class="mt-card-item">
                            <div class="mt-card-content">
                                <h3 class="mt-card-name">{{$admin->name}}</h3>
                                <p class="mt-card-desc font-grey-mint">{{$admin->email}}</p>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Email :</td>
                                <td><a href="mailto:{{$admin->email}}">{{$admin->email}}</a></td>
                            </tr>
                            <tr>
                                <td>Created Account at :</td>
                                <td>{{\Carbon\Carbon::parse($admin->created_at)->format('Y-m-d H:i:s')}}</td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')   <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/form-samples.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/components-select2.min.js" type="text/javascript"></script>

@stop
