<div class="breadcrumb-bar" style="padding-left:5px;padding-right:5px;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('')?>"><?=$home?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$dashboard?></li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title"><?=$dashboard?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">						
							<!-- Search Filter -->
							<div class="card search-filter">
							<?php
											$attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'login-form',  'enctype'=>"multipart/form-data");
											echo form_open_multipart("reviews/search", $attrib)
										?> 
								<div class="card-header">
									<h4 class="card-title mb-0">Search Members</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<div class="form-group">
									<label style="font-size: 12px;text-align: justify;">Enter Help Provider/Help Requester member ID to see reviews on member</label>
										<input type="text" id="memcode" name="memcode" value="<?=$mcode?>" class="form-control" placeholder="Member Code">
									</div>			
								</div>
									<div class="btn-search">
										<button type="submit" class="btn btn-block"><a>Search</a></button>
									</div>	
								</div>
							</form>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<div class="doc-review review-listing">
							<?php
								if($search){
								if($reviewsdata){
							?>
										<div class="card">
											<div class="card-body">
												<div class="doctor-widget" style="margin-left: 30%;">
													<div class="doc-info-left">
														<div class="doctor-img">
															<img src="<?=$assets?>assets/user_images/<?=$user_image?>" class="img-fluid" alt="User Image">
														</div>
														<div class="doc-info-cont">
															<h4 class="doc-name">Darren Elder</h4>
															
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
												</div>
											</div>
										</div>
								<?php
								}
								}
								?>
								<!-- Review Listing -->
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
								<!-- /Comment List -->
								
							</div>
							<div class="load-more text-center">
								<!-- <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	 -->
							</div>	
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
