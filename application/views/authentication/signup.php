
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/register.html  30 Nov 2019 04:12:20 GMT -->
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
							<li class="active">
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
						</li> -->
						<li class="nav-item">
							<a class="nav-link header-login" href="<?=base_url('login')?>" style="color: #f3736f;">Login </a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link header-login" href="register.html" style="color: #f3736f;">Register </a>
						</li> -->
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=$assets?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Register <a href="doctor-register.html"></a></h3>
										</div>
										
										<!-- Register Form -->
										<?php
                                            $attrib = array('data-toggle' => 'validator', 'role' => 'form',  'enctype'=>"multipart/form-data");
                                            echo form_open_multipart("welcome/register", $attrib)
                                        ?> 
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="tbl_user_first_name"  id="tbl_user_first_name" required>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" name="tbl_user_last_name"  id="tbl_user_last_name" required>
												</div>
											</div>
											<div class="col-12 col-md-12">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" name="tbl_user_email"  id="tbl_user_email" required>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>User ID</label>
													<input type="text" class="form-control" name="tbl_user_user_name"  id="tbl_user_user_name" required>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group main">
													<label>Mobile</label>
												<input type="tel"  name="tbl_user_moble"  id="tbl_user_moble" required class="txtbox form-control" maxlength="10" style="padding-left: 98px;" onkeypress="validate(event)"/>
                                                <input type="hidden" value="+91" name="tbl_user_cuountry_code"  id="tbl_user_cuountry_code" />
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Create Password</label>
													<input type="password" class="form-control" name="tbl_user_password"  id="tbl_user_password" required>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Re-enter Password</label>
													<input type="password" class="form-control" name="tbl_user_re_enter_password"  id="tbl_user_re_enter_password" required  onkeypress="checkPassword()"  onblur="checkPassword(), clearPass()" >
                                                    <div id="msg_re_pass" style="font-size:10px;color:red"></div>
												</div>
											</div>
											<div class="form-group form-focus">
											  <input type="checkbox"  name="tbl_user_provider"  id="tbl_user_provider"  value="I want to provide help">
											  <label for="provide help"> I want to provide help</label><br>
											  <input type="checkbox" id="vehicle1" name="vehicle1" required value="Bike">
											  <label for="Terms"> <a href ="<?=base_url('public/faq.html')?>" target="_blank">I Agree to Terms and Conditions </a></label>
											</div>
											<div class="col-sm-12">
												<div class="text-danger" style="padding:10px;text-align:center;"><?=$this->session->flashdata('error')?></div>
												<div class="text-success" style="padding:10px;text-align:center;"><?=$this->session->flashdata('message')?></div>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Register</button>
									</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		

            <!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="#">Myjob Your Help</a></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
			<!-- /Page Content -->
   		<!-- Custom JS -->
           <script src="<?=$assets?>assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?=$assets?>assets/js/popper.min.js"></script>
		<script src="<?=$assets?>assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=$assets?>assets/js/script.js"></script>
		<script src="<?=$assets?>assets/js/sms.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var code = "+91"; // Assigning value from model.
            $('#tbl_user_moble').val(code);
            $('#tbl_user_cuountry_code').val(code);
            $('#tbl_user_moble').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US','IN'],
                separateDialCode: true
            });
            $('#tbl_user_moble').on('keypress', function (){
                var title = $('.iti__selected-flag').attr("title");
                var arr = title.split(":");
                $('#tbl_user_cuountry_code').val(arr[1]);
            });
            $('#tbl_user_moble').on('blur', function (){
                var title = $('.iti__selected-flag').attr("title");
                var arr = title.split(":");
                $('#tbl_user_cuountry_code').val(arr[1]);
            });
            $('#btnSubmit').on('click', function () {
                var code = $("#tbl_user_moble").intlTelInput("getSelectedCountryData").dialCode;
                var phoneNumber = $('#tbl_user_moble').val();
                var name = $("#tbl_user_moble").intlTelInput("getSelectedCountryData").name;
                alert('Country Code : ' + code + '\nPhone Number : ' + phoneNumber + '\nCountry Name : ' + name);
            });
        });


        function  checkPassword(){
            var password = $('#tbl_user_password').val();
            var repassword = $('#tbl_user_re_enter_password').val();

            if(password == repassword){
                $("#msg_re_pass").text("");
            }else{
                $("#msg_re_pass").text("Password and Retype password should be same");
            }
        }
        function clearPass(){
            if($("#msg_re_pass").text()==""){

            }else{
                $('#tbl_user_re_enter_password').val("");
            }
            
        }
    </script>
			
		


	