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
<div class="content" style="margin: 25px;min-height: 210px;">
				<div class="container-fluid">

					<div class="row">
						
						<div class="col-md-6 col-6">
						<!-- Profile Settings Form -->
									<form>
										<div class="row form-row">
											<div class="col-12 col-md-12">
												
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" value="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" value="">
												</div>
											</div>
											
											<div class="col-12">
												<div class="form-group">
												<label>Email</label>
													<input type="text" class="form-control" value="">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Messege</label><br>
													<textarea id="story" name="story" rows="5" style="width: 100%;" value="">
													</textarea>

												</div>
											</div>
											<div class="upload-img">
												<div class="change-photo-btn" style="width: 150px;border-radius: 6px;">
														<span><i class="fa fa-paperclip"></i> Attach File</span>
																<input type="file" class="upload">
												</div>
											</div>
										</div><br>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Send</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
				
						</div>
						<div class="col-md-6 col-6">
						<h3>Phone : </h3>
						<p>+1 123456789</p><br>
						<h3>Email : </h3>
						<p>info@myjobyourhelp.com</p><br>
						<h3>Address : </h3>
						<p>One Road,Two Area,Three City- 512345</p>
				
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
   