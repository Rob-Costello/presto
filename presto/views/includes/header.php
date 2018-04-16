<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,follow' />

    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700,800">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Poppins:400,500,300,600,700">
    <link rel='stylesheet' href='/presto/assets/css/base.css' type='text/css' media='all' />
    <link rel='stylesheet' id='main-stylesheet-css'  href='/presto/assets/css/secure.css' type='text/css' media='all' />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
<!--<div class="preloader">-->
<!--    <div class="cssload-speeding-wheel"></div>-->
<!--</div>-->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                <!--<li>
                    <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>-->
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <!--<li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">You have 4 new messages</div>
                        </li>
                        <li>
                            <div class="message-center"> <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5>
                                        <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5>
                                        <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a> </div>
                        </li>
                        <li> <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a></li>
                    </ul>-->
                <!-- /.dropdown-messages -->
                <!-- </li> -->
                <!-- /.dropdown -->
                <!-- <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a> </li>
                    </ul> -->
                <!-- /.dropdown-tasks -->
                <!-- </li> -->
                <!-- /.dropdown -->
                <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/presto/assets/images/user-black.svg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $user->first_name; ?></b> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <!-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li> -->
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/presto/logout/"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                <!-- /.dropdown -->
            </ul>
            <div class="top-left-part"><a class="logo" href="/presto/"><img src="/images/presto-logo.svg" style="width: 135px; margin-top: 6px;" alt="home" /></a></div>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="sidebar-nav navbar-collapse slimscrollsidebar active" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="nav in" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class=""> <a href="/presto/dashboard/" class="waves-effect<?php if($nav == 'dashboard') echo ' active'; ?>"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>

                    <li><a href="/presto/orders/" class="waves-effect<?php if($nav == 'orders') echo ' active'; ?>"><i class="zmdi zmdi-hc-fw zmdi-shopping-cart fa-fw"></i> <span class="hide-menu">Orders</span></a></li>

                    <li><a href="/presto/jobs/" class="waves-effect<?php if($nav == 'press jobs') echo ' active'; ?>"><i class="zmdi zmdi-local-printshop zmdi-hc-fw fa-fw"></i> <span class="hide-menu">Press Jobs</span></a></li>

                    <li><a href="inbox.html" class="waves-effect<?php if($nav == 'users') echo ' active'; ?>"><i class="zmdi zmdi-accounts zmdi-hc-fw fa-fw"></i> <span class="hide-menu">Users <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="/presto/tab1/">Tab 1</a></li>
                            <li><a href="/presto/tab2/">Tab 2</a></li>
                        </ul>
                    </li>
                    <li><a href="inbox.html" class="waves-effect<?php if($nav == 'system settings') echo ' active'; ?>"><i class="zmdi zmdi-settings zmdi-hc-fw fa-fw"></i> <span class="hide-menu">System Settings <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="/presto/tab1/">Tab 1</a></li>
                            <li><a href="/presto/tab2/">Tab 2</a></li>=
                        </ul>
                    </li>
                    <li><a href="inbox.html" class="waves-effect<?php if($nav == 'reports') echo ' active'; ?>"><i class="zmdi zmdi-chart zmdi-hc-fw fa-fw"></i> <span class="hide-menu">Reports <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="/presto/tab1/">Tab 1</a></li>
                            <li><a href="/presto/tab2/">Tab 2</a></li>
                        </ul>
                    </li>
                    <li><a href="/presto/logout/" class="waves-effect"><i class="zmdi zmdi-power zmdi-hc-fw fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <?php if ($this->ion_auth->is_admin()) { ?>
                        <li class="nav-small-cap">--- Support</li>
                        <li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentation</span></a></li>
                        <li><a href="gallery.html" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Gallery</span></a></li>
                        <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>
                    <?php } ?>
                </ul>
            </div><div class="slimScrollBar" style="width: 0px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 2529px; background: rgb(220, 220, 220);"></div><div class="slimScrollRail" style="width: 0px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">