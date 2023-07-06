<div class="main-wrapper">
<!-- Breadcrumb -->

<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Provider Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Provider Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
											<?php
                                                if($row->user->user_image){
                                                    echo '<img src="'.$assets.'assets/user_images/'.$row->user->user_image.'" class="img-fluid" alt="User Image">';
                                                }else{
                                                    echo '<img src="'.$assets.'assets/img/patients/patient.jpg" class="img-fluid" alt="User Image">';
                                                }
                                            ?>
										
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><?=$row->user->tbl_user_first_name.' '.$row->user->tbl_user_last_name?></h4>
										
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(<?=$stars5?>)</span>
										</div>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(<?=$stars4?>)</span>
										</div>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(<?=$stars3?>)</span>
										</div>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(<?=$stars2?>)</span>
										</div>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(<?=$stars1?>)</span>
										</div>
										
										<div class="clinic-details">
											
										</div>
										
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clinic-booking">
										<?php
										if($approvdata){
											if($approvdata->phone==1){
												echo '<a class="apt-btn2" id="phone_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',1,0)"><i class="fa fa-check"></i> Phone Number Requested</a>';
											}else if($approvdata->phone==2){
												echo '<a class="apt-btn3" id="phone_req">Phone Request Approved</a>';
											}else{
												echo '<a class="apt-btn" id="phone_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',1,1)">Request Phone Number</a>';
											}											
										}else{
											echo '<a class="apt-btn" id="phone_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',1,1)">Request Phone Number</a>';
										}
										?>
										
									</div><br>
									<div class="clinic-booking">
										<?php
										if($approvdata){
											if($approvdata->email==1){
												echo '<a class="apt-btn2" id="email_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',2,0)"><i class="fa fa-check"></i> Email Requested</a>';
											}else if($approvdata->email==2){
												echo '<a class="apt-btn3" id="phone_req">Email Request Approved</a>';
											}else{
												echo '<a class="apt-btn" id="email_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',2,1)">Request Email</a>';
											}											
										}else{
											echo '<a class="apt-btn" id="email_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',2,1)">Request Email</a>';
										}
										?>
										
									</div><br>
									<div class="clinic-booking">
									<?php
										if($approvdata){
											if($approvdata->whatsapp==1){
												echo '<a class="apt-btn2" id="whatsapp_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',3,0)"><i class="fa fa-check"></i> Whatsapp Requested</a>';
											}else if($approvdata->whatsapp==2){
												echo '<a class="apt-btn3" id="phone_req">Whatsapp Request Approved</a>';
											}else{
												echo '<a class="apt-btn" id="whatsapp_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',3,1)">Request Whatsapp</a>';
											}											
										}else{
											echo '<a class="apt-btn" id="whatsapp_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',3,1)">Request Whatsapp</a>';
										}
										?>
										
									</div><br>
									<div class="clinic-booking">
									<?php
										if($approvdata){
											if($approvdata->chat==1){
												echo '<a class="apt-btn2" id="chat_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',4,0)"><i class="fa fa-check"></i> Online Chat Requested</a>';
											}else if($approvdata->chat==2){
												echo '<a class="apt-btn3" id="phone_req">Online Chat Request Approved</a>';
											}else{
												echo '<a class="apt-btn" id="chat_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',4,1)">Online Chat</a>';
											}											
										}else{
											echo '<a class="apt-btn" id="chat_req" href="javascript:getApproveRequest('.$reqId.','.$provId.',4,1)">Online Chat</a>';
										}
										?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p><?=$row->user->description?></p>
											</div>
											<!-- /About Details -->
										
											<!-- Education Details -->
											<!-- <div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">American Dental Medical University</a>
																	<div>BDS</div>
																	<span class="time">1998 - 2003</span>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">American Dental Medical University</a>
																	<div>MDS</div>
																	<span class="time">2003 - 2005</span>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div> -->
											<!-- /Education Details -->
									
											
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Technologies</h4>
												<ul class="clearfix">
													<?php
														$tech = explode (",", $row->user->tbl_technologies); 
														if($tech){
															for($i=0;$i<count($tech);$i++){
																echo '<li>'.$tech[$i].'</i>';
															}
														}
													?>
													
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
									<ul class="comments-list" id="reviewlist">
									<?php
										if($reviewsdata){
											foreach($reviewsdata as $review){
									?>
									<li>
										<div class="comment">
											<img class="avatar rounded-circle" alt="User Image" src="<?=$assets?>assets/user_images/<?=$review->user_image?>">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author"><?=$review->fname.' '.$review->lname?></span>
													<span class="comment-date"><a href="<?=base_url('newrequest/requestdetails/'.$review->reqId)?>">Provider ID-<?=$review->provCode?>, </a><br>
													<span class="comment-date"><a href="<?=base_url('newrequest/viewprofile/'.$review->requesterId.'/'.$review->reqId)?>">Requester ID-<?=$review->requesterCode?>, </a><br>
													<a href="<?=base_url('newrequest/requestdetails/'.$review->reqId)?>">Request ID-<?=$review->reqCode?></a></span><br>
													<a href="<?=base_url('newrequest/viewprofile/'.$review->requesterId.'/'.$review->reqId)?>" class="btn btn-sm bg-info-light">
													<i class="far fa-eye"></i> View Profile	</a>
													<div class="review-count rating">
														<?php
															if($review->rating==1){
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
															}else if($review->rating==2){
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
															}else if($review->rating==3){
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star"></i>';
																echo '<i class="fas fa-star"></i>';
															}else if($review->rating==4){
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star"></i>';
															}else if($review->rating==5){
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
																echo '<i class="fas fa-star filled"></i>';
															}
														?>
														
													</div>
												</div>
												<div style="width:100%;"><p class="comment-content" >
													<?=$review->description?>
													<table width="100%"><tr><th style="color:#fff">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
													Ut enim ad minim veniam, quis nostrud exercitation.
													Curabitur non nulla sit amet nisl tempus</th></tr></table>
												</p></div>
											</div>
										</div>
										
									
										
									</li>

									<?php
											}
										}else{
											echo '<li><div class="comment"><div class="comment-body" style="color:red;">Sorry! No Review Data found.</div></div></li>';
										}
									?>
									
								
									
									
									
								</ul>
										
										
										
									</div>
									<!-- /Review Listing -->
								
								
								</div>
								<!-- /Reviews Content -->
								
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->

</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

	function getApproveRequest(reqId,provId,type, value){
		var mtype = "";
		if(type==1){
			var mtype = (value==1 ? 'Are you request Phone Number' : 'Are you de-request Phone Number');
		}else if(type==2){
			mtype = (value==1 ? 'Are you request Email' : 'Are you de-request Email');
		}if(type==3){
			mtype = (value==1 ? 'Are you request Whatsapp Number' : 'Are you de-request Whatsapp number');
		}if(type==4){
			mtype = (value==1 ? 'Are you request Online Chat' : 'Are you de-request Online Chat');
		}
		
			swal({
			title: "Are you sure?",
			text: mtype+"!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				$.ajax({
				url : '<?php echo base_url('Newrequest/approverequest'); ?>',
				type: "POST",        
				dataType: "html",
				data:{reqId:reqId, provId:provId, type:type, value:value},
				success: function(data)
				{

					
					if(data){
						
						
						
						swal("Poof! Your Request Submited Successfully!", {
							icon: "success",
						});
						location.reload();
					}else{
						swal("Sorry! There is a problem with appling. Please Try agine!");
					}
					console.log(data);
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data' + errorThrown);
				}
			});
				
			} else {
				swal("Your Request is Canceled!");
			}
			});
		
	}
</script>