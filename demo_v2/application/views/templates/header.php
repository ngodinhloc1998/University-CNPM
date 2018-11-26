<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/images/favicon.png');?>">
    <title>Products</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/products/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/assets/libs/flot/css/float-chart.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/assets/libs/magnific-popup/dist/magnific-popup.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/dist/css/style.min.css');?>" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('public/assets/images/logo-icon.png');?>" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url('public/assets/images/logo-text.png')?>" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="public/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <?php if($_SERVER['REQUEST_URI'] == "/project/demo/business/manage_table"):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block"> Edit Table <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalAddNewTable" id="btn-add-new-table" href="javascript:void(0);"><i class="mdi mdi-library-plus"></i> New Table</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalDeleteTable" id="btn-delete-table" href="javascript:void(0);"><i class="mdi mdi-delete"></i> Delete Table</a>
                            </div>
                        </li>
                        <?php endif; ?>


                        <?php if($_SERVER['REQUEST_URI'] == "/project/demo/manage_products/edit_products"):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block"> Edit Products <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-add-new-product" id="btn-add-new-product" href="javascript:void(0);"><i class="mdi mdi-library-plus"></i> New Product</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Shopping Card -->
                        <li class="nav-item">
                            <?php if(isset($_SESSION['id_table'])): ?>
                            <a id="shopping-cart" class="nav-link waves-effect waves-dark" href="<?php echo base_url('middleware/redirect_checkout');?>" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-shopping-cart font-24"></i><span id="total-item" class="badge badge-bill badge-danger"><?php if(!empty($numItems)){echo $numItems;} else{echo 0;} ?></span></a>
                            <?php endif;?>
                        </li>
                        <!-- ==========================End Shopping Card========================= -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('public/assets/images/users/1.jpg');?>" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo base_url('users/logout'); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?php echo base_url('users/show_profile'); ?>" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('business/home'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('business/manage_table');?>" aria-expanded="false"><i class="mdi mdi-unity"></i><span class="hide-menu">Manage Tables</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-webpack"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('manage_products/list_products'); ?>" class="sidebar-link"><i class="mdi mdi-star-circle"></i><span class="hide-menu"> List Products </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('manage_products/edit_products'); ?>" class="sidebar-link"><i class="mdi mdi-wrench"></i><span class="hide-menu"> Edit Menu </span></a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('tracking/show_all_invoices'); ?>" aria-expanded="false"><i class="mdi mdi-eye"></i><span class="hide-menu">Tracking Invoices</span></a></li>
                        <!--
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu"> Warehouse </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="fas fa-dolly"></i><span class="hide-menu"> Warehousing </span></a></li>
                                <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="fas fa-fire"></i><span class="hide-menu"> Tracking </span></a></li>
                            </ul>
                        </li>
                        -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chart-line"></i><span class="hide-menu"> Chart </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('business/chart_by_date'); ?>" class="sidebar-link"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu"> Day </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('business/chart_by_month'); ?>" class="sidebar-link"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu"> Month </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('business/chart_by_year'); ?>" class="sidebar-link"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu"> Year </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Account </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo base_url('users/show_profile'); ?>" class="sidebar-link"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu"> Profile </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('users/logout'); ?>" class="sidebar-link"><i class="mdi mdi-logout"></i><span class="hide-menu"> Logout </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('users/show_accounts'); ?>" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Manage Accounts </span></a></li>
                            </ul>
                        </li>           
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">