<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/login.html  30 Nov 2019 04:12:20 GMT -->
<head>
		<meta charset="utf-8">
		<title>My Job Your Help --- <?=$headtitle ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?=$assets?>assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style>
            .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            padding-left:10px;padding-right:10px;
            }
            </style>
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="<?=base_url()?>" class="navbar-brand logo">
							<img src="<?=$assets?>images/logo.png" class="img-fluid" alt="Logo" style="max-width: 52%;">
						</a>
					</div>
					<!-- <div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index-2.html" class="menu-logo">
								<img src="images/logo.png" class="img-fluid" alt="Logo" style="max-width: 52%;">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li><a href="newrequest.html">New Requests</a></li>
							<li><a href="reviews.html">Reviews On Members</a></li>
							
							<li><a href="How it works.html">How It Works</a></li>
							<li><a href="faq.html">FAQs</a></li>
							<li><a href="contact.html">Contact US</a></li>
							<li class="login-link">
								<a href="login.html">Login / Signup</a>
							</li>
						</ul>	 
					</div>		  -->
					<ul class="nav header-navbar-rht">
						
						<!-- <li class="nav-item">
							<a class="nav-link header-login" href="Create-Request.html" style="background-color: #09dca4;color: #ffffff;border: #f3736f;">Creat Request </a>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="Dashboard.html" style="color: #f3736f;">My Account </a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link header-login" href="<?=base_url('welcome/signup')?>" style="color: #f3736f;">Register </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=$assets?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot User ID </h3>
										</div>
                    <?php
                        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'login-form',  'enctype'=>"multipart/form-data");
                        echo form_open_multipart("welcome/forgotUser", $attrib)
                    ?> 
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="tbl_user_email" id="tbl_user_email" required>
												<label class="focus-label">Enter Your Register Email</label>
												<input type="hidden" value="2" class="form-control floating" name="type" id="type" required>
											</div>
											
											
                      <div class="col-sm-12">
                        <div class="text-danger" style="padding:10px;text-align:center;"><?=$this->session->flashdata('error')?></div>
                        <div class="text-success" style="padding:10px;text-align:center;"><?=$this->session->flashdata('message')?></div>
                      </div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="text-center dont-have">Don’t have an account? <a href="<?=base_url('welcome/signup')?>">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			