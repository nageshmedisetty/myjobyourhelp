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
	<div class="container">				
<!-- Doctor Widget -->
<!-- <div class="card">
						<div class="card-body">
							
						</div>
					</div> -->
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Write Review</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">
										
											
									<!-- Write Review -->
									<div class="write-review">
										
										<!-- Write Review Form -->
										<?php
											$attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'login-form',  'enctype'=>"multipart/form-data");
											echo form_open_multipart("reviews/create", $attrib)
										?> 
											<div class="form-group">
												<label><b>Request ID&nbsp;:&nbsp;</b><span style="color:#9d9d9d;"><?=$reqrow->request_seq_code?></span></label>
											</div>
											<div class="form-group">
												<label><b>Help Requester ID:&nbsp;:&nbsp;</b><span style="color:#9d9d9d;"><?=$requesterrow->tbl_user_code?></span></label>
											</div>
											<div class="form-group">
												<label><b>Help Provider ID:&nbsp;:&nbsp;</b><span style="color:#9d9d9d;"><?=$prorow->tbl_user_code?></span></label>
											</div>
											
											<div class="form-group">
												<label>Rating</label>
												<div class="star-rating">
													<input id="star-5" type="radio" name="rating1" value="star-5">
													<label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-4" type="radio" name="rating2" value="star-4">
													<label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-3" type="radio" name="rating3" value="star-3">
													<label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-2" type="radio" name="rating4" value="star-2">
													<label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-1" type="radio" name="rating5" value="star-1">
													<label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
												</div>
											</div>
											<div class="form-group">
												<label>Brief Description of Request</label>
												<textarea id="review_desc" name="review_desc" maxlength="100" class="form-control"></textarea>
											  
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
											</div>
											<hr>
											<div class="submit-section">
												<input type="hidden" id="reqId" name="reqId" value="<?=$reqId?>" />
												<input type="hidden" id="prevId" name="prevId" value="<?=$prevId?>" />
												<input type="hidden" id="reqesterId" name="reqesterId" value="<?=$requesterrow->tbl_user_id?>" />
												<button type="submit" class="btn btn-primary submit-btn">Submit Review</button>
											</div>
										</form>
										<!-- /Write Review Form -->
										
									</div>
									<!-- /Write Review -->
						
								</div>
								<!-- /Reviews Content -->
								</div>
								<!-- /Overview Content -->
								
								
								
								
								
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
	</div>
</div>		
			<!-- /Page Content -->
