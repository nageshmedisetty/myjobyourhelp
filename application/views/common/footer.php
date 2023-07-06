<!-- Footer -->
<style>

/* .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            padding-left:10px;padding-right:10px;
            } */
</style>
<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="<?=$assets?>images/logo.png" alt="logo" style="width: 100px;">
									</div>
									<div class="footer-about-content">
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Quick Links</h2>
									<ul>
										<li><a href="patient-dashboard.html"><i class="fas fa-angle-double-right"></i> Home</a></li>
										<li><a href="register.html"><i class="fas fa-angle-double-right"></i> New Requests</a></li>
										<li><a href="booking.html"><i class="fas fa-angle-double-right"></i> Contact</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Quick Links</h2>
									<ul>
										<li><a href="appointments.html"><i class="fas fa-angle-double-right"></i> Faq's</a></li>
										<li><a href="chat.html"><i class="fas fa-angle-double-right"></i> How it works</a></li>
										<li><a href="login.html"><i class="fas fa-angle-double-right"></i> Help Provider Reviews</a></li>
										<li><a href="doctor-register.html"><i class="fas fa-angle-double-right"></i> Help Requester Reviews</a></li>
										<li><a href="doctor-dashboard.html"><i class="fas fa-angle-double-right"></i> Login</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											info@myjobyourhelp.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
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
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<!-- <script src="<?=$assets?>assets/js/jquery.min.js"></script>
		<script src="<?= $assets ?>assets/js/jquery-1.11.1.min.js"></script> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?= $assets ?>assets/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?=base_url('public')?>/assets/js/plugins/datatables.min.js"></script>
    	<script src="<?=base_url('public')?>/assets/js/scripts/datatables.script.min.js"></script>
		<!-- Bootstrap Core JS -->
		<script src="<?=$assets?>assets/js/popper.min.js"></script>
		<script src="<?=$assets?>assets/js/bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="<?=$assets?>assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=$assets?>assets/js/script.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
	</body>
<script>
	function updateStatus(reqId,provId,status){
		// alert(reqId);
		// alert(provId);
		// alert(status);
	swal({
	title: "Are you sure?",
	text: "Once deleted, you will not be able to recover this imaginary file!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
	if (willDelete) {
		$.ajax({
			url : '<?php echo base_url('requestcenter/changestatus'); ?>',
			type: "POST",        
			dataType: "html",
			data: {"reqId":reqId,"provId":provId,"status":status},
			success: function(data)
			{
				
				if(data){
					location.reload(true);
				}
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error deleting data' + errorThrown);
			}
		});
		
	} else {
		swal("Your Transaction is canceld!");
	}
	});
	
	
}


</script>
<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>