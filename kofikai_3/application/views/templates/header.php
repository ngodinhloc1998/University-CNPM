<!doctype html>
<html lang="en">

<head>
	<title>Panels | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url('template/assets/vendor/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('template/assets/vendor/font-awesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('template/assets/vendor/linearicons/style.css');?>">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url('template/assets/css/main.css');?>">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url('template/assets/css/demo.css');?>">
	<!-- GOOGLE FONTS -->
	<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">-->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('template/assets/img/apple-icon.png');?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('template/assets/img/favicon.png');?>">
    <!--My Style-->
    <link rel="stylesheet" href="<?php echo base_url('template/assets/css/style.css');?>">
</head>

<body>
    <!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?php echo base_url('template/assets/img/logo-dark.png')?>" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url('template/assets/img/user.png')?>" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li id="btn-logout"><a href="#"><i  class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a id="dashboard" href="#tables" class="sideBarElement"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a id="sideBarTables" data-toggle="collapse" class="collapsed sideBarElement" href="#tablesEditOption" class=""><i class="lnr lnr-code"></i> <span>Tables</span><i class="icon-submenu lnr lnr-chevron-left"></i></a></li>
                        <div id="tablesEditOption" class="collapse collapseSideBar">
                            <ul class="nav">
                                <li><a href="#tables" class="sideBarElement">Show List Tables</a></li>
                                <li><a id="clickEditTable" href="#">Edit Tables</a></li>
                            </ul>
                        </div>
						<li><a id="menu" href="#" class="sideBarElement active"><i class="lnr lnr-cog"></i> <span>Menu</span></a></li>
						<li>
							<a href="#subRepository" data-toggle="collapse" class="collapsed sideBarElement"><i class="lnr lnr-file-empty"></i> <span>Reponsitory</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subRepository" class="collapse collapseSideBar">
								<ul class="nav">
									<li><a href="#" class="">Import</a></li>
									<li><a href="#" class="">Export</a></li>
									<li><a href="#" class="">Tracking</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed sideBarElement"><i class="lnr lnr-file-empty"></i> <span>My Account</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse collapseSideBar">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice sideBarElement"></i> <span>Manage Employee</span></a></li>
                        <li><a href="charts.html" class=""><i class="lnr lnr-chart-bars sideBarElement"></i> <span>Revenue</span></a></li>

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
                <div id="main-container" class="containter-fluid">