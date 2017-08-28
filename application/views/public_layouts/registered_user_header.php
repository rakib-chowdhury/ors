<base href="<?php echo base_url() ?>">
<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>public_assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/ripples.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/datepicker.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/main.css">
	<!--<noscript><meta http-equiv="refresh" content="0; url=index.php/javascript" /></noscript>-->

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
	<![endif]-->
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header Area
==================================================== -->
<div class="container">
	<header>

           <div style="position: absolute; width: 100%">
                    <div class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000" style="width: 100%">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo base_url(); ?>public_assets/img/head1.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="item">
                                <img src="<?php echo base_url(); ?>public_assets/img/head2.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div> <!-- /main-image-slider -->

                </div>         

         <a href="<?php echo site_url('home/help');?>" class="btn btn-danger btn-bn hidden-sm hidden-xs">বাংলা লিখতে সমস্যা হলে</a>
		<nav class="top-nav">
			<ul class="nav nav-pills">
				<li><a href="<?php echo site_url('somitee');?>" class="btn btn-raised btn-default"><?php echo $this->session->userdata('user_name');?></a></li>
				<li><a href="<?php echo site_url('logout');?>" class="btn btn-raised btn-danger btn-deep-red">লগ আউট</a></li>
			</ul>
		</nav>

		<div class="row">
			<div class="col-sm-4">
				<a href="index.php/home" class="logo">
					<img src="<?php echo base_url();?>public_assets/img/logo.png" alt="logo">
				</a>
			</div> <!-- /col -->
		</div> <!-- /row -->
	</header>

	<!-- Navbar -->
	<div class="navbar navbar-default">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
	<div class="navbar-collapse collapse main-nav">
		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="<?php echo site_url('home/pre_registraion_info');?>">নিবন্ধন পূর্ব প্রস্তুতি</a></li>
			<li><a href="<?php echo site_url('home/questionnaire'); ?>">সচরাচর জিজ্ঞাসা</a></li>
                        <li><a href="<?php echo site_url('home/video'); ?>">টিউটোরিয়াল</a></li>
                        <li><a href="#">ফিস ও চার্জ</a></li>
                        <li><a href="<?php echo site_url('home/law_rules'); ?>">আইন ও বিধি</a></li>
                        <li><a href="<?php echo site_url('home/download_form'); ?>">ডাউনলোড ফর্ম</a></li>
			<li><a href="<?php echo site_url('home/communication_info'); ?>">যোগাযোগ</a></li>
			<li><a href="<?php echo site_url('home/opinion_info'); ?>">মতামত</a></li>
		</ul>
	</div>

</div> <!-- /Navbar -->





<?php /*





	<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/bootstrap-material-design.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/ripples.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/main.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		<!-- Header Area
		==================================================== -->
		<div class="container">
			<header>
<a href="<?php echo site_url('home/help');?>" class="btn btn-danger btn-bn">বাংলা লিখতে সমস্যা হলে</a>
				<nav class="top-nav">
					<ul class="nav nav-pills">
					  	<li><a href="<?php echo site_url('logout');?>" class="btn btn-raised btn-danger btn-deep-red">লগ আউট</a></li>
					</ul>
				</nav>
				<div class="row">
					<div class="col-sm-4">
						<a href="index.php" class="logo">
							<img src="<?php echo base_url();?>public_assets/img/logo.png" alt="logo">
						</a>
					</div> <!-- /col -->
				</div> <!-- /row -->
			</header>
			
			<!-- Navbar -->
			<div class="navbar navbar-default">
			  	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			    </div>
					<div class="navbar-collapse collapse main-nav">
						<ul class="nav navbar-nav">
							<li class="active"><a href="javascript:void(0)">হোম</a></li>
							<li><a href="#">প্রয়োজনীয়তা</a></li>
							<li><a href="#">গাইডলাইন</a></li>
							<li><a href="#">ডাউনলোড ফর্ম</a></li>
							<li><a href="#">ফিস ও চার্জ</a></li>
							<li><a href="#">সচরাচর জিজ্ঞাসা</a></li>
							<li><a href="#">আইন ও নিয়ম</a></li>
							<li><a href="#">যোগাযোগ</a></li>
							<li><a href="#">গোপনীয়তা নীতি</a></li>
						</ul>
					</div>
			  	
			</div> <!-- /Navbar -->
			*/ ?>