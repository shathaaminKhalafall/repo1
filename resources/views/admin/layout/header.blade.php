<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo" style="background-color: green">
            <a href="{{url(admin_vw().'/home')}}" style=" margin: 0px; margin-top: 4px;text-align: center;width: 87%;">
{{--                <img src="{{url('/')}}/assets/website/assets/img/logo2.png" alt="logo" class="logo-default"--}}
{{--                     style="width: 55%;margin-top: 2px;"/> </a>--}}
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            {{--                            <img alt="" class="img-circle"--}}
                            {{--                                 src="{{auth()->guard('admin')->user()->logo??(url(assets('admin')).'/apps/img/man.svg')}}"/>--}}
                            <span class="username username-hide-on-mobile"> {{authAdmin()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ url(admin_vw().'/profile/'.authAdmin()->id.'/edit') }}">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="javascript:;"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>

                            <form id="logout-form" action="{{ url(admin_vw().'/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER INNER -->
</div>
