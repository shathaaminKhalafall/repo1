<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"
      type="text/css"/>

<link href="{{url(assets('admin'))}}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url(assets('admin'))}}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
      type="text/css"/>
<link href="{{url(assets('admin'))}}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url(assets('admin'))}}/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet"
      type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

@yield('css')
<!-- END PAGE LEVEL PLUGINS -->
<link href="{{url(assets('admin'))}}/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" id="style_components"
      type="text/css">
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{url(assets('admin'))}}/global/css/components-md.min.css" rel="stylesheet" id="style_components"
      type="text/css"/>
<link href="{{url(assets('admin'))}}/global/css/plugins-md.min.css" rel="stylesheet" type="text/css"/>
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{url(assets('admin'))}}/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css"/>
<link href="{{url(assets('admin'))}}/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css"
      id="style_color"/>
<link href="{{url(assets('admin'))}}/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css"/>
<!-- END THEME LAYOUT STYLES -->
{{--<link rel="shortcut icon" href="favicon.ico" />--}}
<link rel="shortcut icon" href="{{url('/')}}/assets/website/assets/images/logo.png">

<style>
    .dataTables_wrapper .dataTables_processing {
        border: none !important;
        background: none !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .modal-footer button {
        float: right;
        margin-left: 10px;
    }

    /*.select2-container {*/
    /*    width: 500px !important;*/
    /*}*/

    th, td {
        text-align: center !important;
        vertical-align: inherit !important;
    }
</style>
@stack('css')
