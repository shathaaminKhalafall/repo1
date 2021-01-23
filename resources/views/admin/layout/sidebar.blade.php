<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">

            <li class="nav-item @if(preg_match('/home/i',url()->current())) start active open @endif">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

                <li class="nav-item @if(preg_match('/admins/i',url()->current())) start active open @endif">
                    <a href="{{url(admin_admins_url())}}" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Admins Management</span>
                        <span class="selected"></span>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-globe"></i>--}}
{{--                        <span class="title"> Web Contents </span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        <li class="">--}}
{{--                            <a href="{{url(admin_web_url().'/settings-edit')}}"> <i class="fa fa-cog"></i> Settings </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="{{url(admin_web_url().'/contact-edit')}}"> <i class="fa fa-cog"></i> Contact us </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}

{{--                </li>--}}


            <li class="nav-item @if(preg_match('/works/i',url()->current())) start active open @endif">
                <a href="{{url(admin_works_url())}}" class="nav-link nav-toggle">
                    <i class="fab fa-servicestack"></i>
                    <span class="title">Arts work</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
