
<link rel="stylesheet" href="<?=$assets?>assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="<?=$assets?>assets/plugins/dropzone/dropzone.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=$assets?>assets/css/style.css">		
<div class="col-md-7 col-lg-8 col-xl-9">
	<div class="card">
		<div class="card-body">
		<div class="col-sm-12">
                        <div class="text-danger" style="padding:10px;text-align:center;"><?=$this->session->flashdata('error')?></div>
                        <div class="text-success" style="padding:10px;text-align:center;"><?=$this->session->flashdata('message')?></div>
                      </div>
			<!-- Profile Settings Form -->
			<?php
				$attrib = array('data-toggle' => 'validator', 'role' => 'form',  'enctype'=>"multipart/form-data");
				echo form_open_multipart("myaccount/updateprofile", $attrib)
			?> 
				<div class="row form-row">
					<div class="col-12 col-md-12">
						<div class="form-group">
							<div class="change-avatar">
								<div class="profile-img">
									<?php
										$imgpath = "";
										if($row->user_image){
											$imgpath = $assets.'assets/user_images/'.$row->user_image;
										}else{
											$imgpath = $assets.'assets/img/patients/patient.jpg';
										}
									?>
									<img src="<?=$imgpath?>" alt="User Image" id="profile_img">
								</div>	
								<?php
								if(!$user){		
								?>					
								<div class="upload-img">
									<div class="change-photo-btn">
										<span><i class="fa fa-upload"></i> Upload Photo</span>
										<input type="file" class="upload"  id="profileimg" name="profileimg"   accept="image/x-png,image/gif,image/jpeg">
									</div>
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>First Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="tbl_user_first_name" name="tbl_user_first_name" required value="<?=$row->tbl_user_first_name?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" id="tbl_user_last_name" name="tbl_user_last_name" required value="<?=$row->tbl_user_last_name?>">
						</div>
					</div>
					<div class="col-12 col-md-12">
						<div class="form-group">
							<label>Technologies(You will ONLY have access to help requests related to the technologies you mention below. Hence mention all technologies that you want to provide help) <span class="text-danger">*</span></label>
							<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Technologies" name="tbl_technologies" value="<?=$row->tbl_technologies?>" id="tbl_technologies">
							<small class="form-text text-muted">Note : Type & Press ENTER to add more technologies</small>
						</div>
					</div>
					<div class="col-12 col-md-12">
						<div class="form-group">
							<label>Email ID <span class="text-danger">*</span></label>
							<input type="email" class="form-control"  id="tbl_user_email" name="tbl_user_email" required value="<?=$row->tbl_user_email?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group main">
							<label>User ID<span class="text-danger">*</span></label><br>
							<input type="text"  name="tbl_user_user_name"  id="tbl_user_user_name" value="<?=$row->tbl_user_user_name?>" required class="txtbox form-control"/>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group main">
							<label>Mobile Number<span class="text-danger">*</span></label><br>
							<input type="text"  name="tbl_user_moble"  id="tbl_user_moble" value="<?=$row->tbl_user_moble?>" required class="txtbox form-control" maxlength="10" onkeypress="validate(event)"/>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group main">
							<label>Whatsapp Number<span class="text-danger">*</span></label><br>
							<input type="text" class="txtbox form-control" name="tbl_user_whatapp_no"  id="tbl_user_whatapp_no" value="<?=$row->tbl_user_whatapp_no?>" required  maxlength="10" onkeypress="validate(event)"/>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
						<label>Address (optional)</label>
							<input type="text" class="form-control" name="tbl_user_address"  id="tbl_user_address" value="<?=$row->tbl_user_address?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>City <span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="tbl_user_city"  id="tbl_user_city" value="<?=$row->tbl_user_city?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>State<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="tbl_user_state"  id="tbl_user_state" value="<?=$row->tbl_user_state?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label>Zip Code <span class="text-danger">*</span></label>
							<input type="text" class="form-control"   name="tbl_user_pin_code"  id="tbl_user_pin_code" value="<?=$row->tbl_user_pin_code?>">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="form-group">
						<label>country <span class="text-danger">*</span></label>
						<?php	
							$gs[""] = "Select Country";
							if($countrys){	
								foreach ($countrys as $country) {
									$gs[$country->id] = $country->name;
								}
							}	
							echo form_dropdown('tbl_user_contry', $gs, ($row ? $row->tbl_user_contry : ""), 'class="form-control myselect" id="tbl_user_contry" data-placeholder="Select Country" required="required" style="width:100%"')
						?>			
					</div>
					</div>
					<div class="col-12 col-md-12">
						<div class="form-group">
							<label>Description <span class="text-danger">*</span></label>
							<textarea  class="form-control" placeholder="Description"   name="description"  id="description"><?=$row->description?></textarea>
						</div>
					</div>
				</div>
					<div class="form-group form-focus">
						<input type="checkbox" id="tbl_user_provider" name="tbl_user_provider" <?=($row->tbl_user_provider==1 ? 'checked' : '')?> value="I want to provide help">
						<label for="provide help"> I want to provide help</label><br>
					</div>
				<div class="submit-section">
					<input type="hidden" value="<?=$row->tbl_user_id?>" id="tbl_user_id" name="tbl_user_id" />
					<?php 
						if(!$user){
							echo '<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>';
						}
					?>
					
				</div>
			</form>
			<!-- /Profile Settings Form -->
			
		</div>
	</div>
</div>







</div>

</div>

</div>		

<script src="<?=$assets?>assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?=$assets?>assets/js/popper.min.js"></script>
		<script src="<?=$assets?>assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="<?=$assets?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="<?=$assets?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="<?=$assets?>assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Dropzone JS -->
		<script src="<?=$assets?>assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="<?=$assets?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="<?=$assets?>assets/js/profile-settings.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=$assets?>assets/js/script.js"></script>
		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">
		$('document').ready(function () {
			$("#profileimg").change(function () {
				
				if (this.files && this.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						console.log(e.target.result)
						$('#profile_img').attr('src', e.target.result);
					}
					reader.readAsDataURL(this.files[0]);
				}
			});
		});
        
    </script>