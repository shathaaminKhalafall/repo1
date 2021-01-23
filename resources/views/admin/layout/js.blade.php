<!-- BEGIN CORE PLUGINS -->
<script src="{{url(assets('admin'))}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<script src="{{url(assets('admin'))}}/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script>
    var baseURL = '{{url(admin_vw())}}';
    var baseAssets = '{{url('assets')}}/admin/assets';

    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


</script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('js')
<script>
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{url(assets('admin'))}}/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{url(assets('admin'))}}/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

@stack('js')
