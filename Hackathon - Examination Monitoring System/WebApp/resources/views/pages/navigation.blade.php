<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <img src="http://www.ravijaiswal.com/SARAH_ADMIN/img/logo.png" alt="Sarah Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">Admin Panel</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="tables-datatable.html#">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
             </ul>
            <ul class="nav navbar-top-links pull-right">




                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="tables-datatable.html#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <img class="img-circle img-user media-object" src="http://www.ravijaiswal.com/SARAH_ADMIN/img/profile-photos/1.png" alt="Profile Picture">
                                </span>
                        <div class="username hidden-xs">Administrator</div>
                    </a>


                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                        <!-- Dropdown heading  -->



                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <a href="tables-datatable.html#">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="tables-datatable.html#">
                                    <i class="fa fa-recycle"></i> Reset Password
                                </a>
                            </li>
                            <li>
                                <a href="tables-datatable.html#">
                                    <i class="fa fa-lock"></i> Logout
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>

<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <ul id="mainnav-menu" class="list-group">


                        <!--Menu list item-->
                        <li class="active-link">
                            <a href="{{ route('indexPage') }}">
                                <i class="fa fa-home"></i>
						           <span class="menu-title">
										<strong>Home</strong>
                                   </span>
                            </a>
                        </li>

                        <li class="active-link">
                            <a href="{{ route('examCenterPage') }}">
                                <i class="fa fa-server"></i>
						           <span class="menu-title">
										<strong>Exams Center</strong>
                                   </span>
                            </a>
                        </li>

                        <li class="active-link">
                            <a href="{{ route('allocateStudentPage') }}">
                                <i class="fa fa-server"></i>
						           <span class="menu-title">
										<strong>Allocate</strong>
                                   </span>
                            </a>
                        </li>

                        {{--<li class="active-link">--}}
                            {{--<a href="{{ route('addInstitute') }}">--}}
                                {{--<i class="fa fa-server"></i>--}}
						           {{--<span class="menu-title">--}}
										{{--<strong>Add Institute</strong>--}}
                                   {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}


                        <!--Menu list item-->
                        {{--<li>--}}
                            {{--<a href="index.html#">--}}
                                {{--<i class="demo-psi-boot-2"></i>--}}
                                {{--<span class="menu-title">UI Elements</span>--}}
                                {{--<i class="arrow"></i>--}}
                            {{--</a>--}}

                            {{--<!--Submenu-->--}}
                            {{--<ul class="collapse">--}}
                                {{--<li><a href="ui-buttons.html">Buttons</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                     </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
