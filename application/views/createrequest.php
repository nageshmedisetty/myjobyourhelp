<!-- Page Content -->
<!-- Bootstrap CSS -->
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
<link rel="stylesheet" href="<?=$assets?>assets/css/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?=$assets?>assets/css/knockout-file-bindings.css">
<style>
.container {
  max-width: 750px;
  padding: 15px;
}
</style>
<div class="row" style="width:70%;">
	<div class="col-md-12 col-lg-12 col-xl-12 theiaStickySidebar"> 
		<div class="card" style="width:100%;">
			<div class="card-body">
				<?php
                    $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'login-form',  'enctype'=>"multipart/form-data");
                    echo form_open_multipart("createrequest/create", $attrib)
                ?> 
				<div class="form-group mb-0">
					<label>Brief Description</label>
					<textarea class="form-control" required name="request_brief_description" id="request_brief_description"><?=($req ? $req->request_brief_description : "")?></textarea>
				</div>
				<br>
				<div class="form-group">
					<label>Technologies(Java,SQL..)</label>
					<input type="text" data-role="tagsinput" required class="input-tags form-control" placeholder="Enter Services" name="request_technologies[]" value="<?=($req ? $req->request_technologies : "")?>" id="request_technologies">
					<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
				</div> 
				<div class="form-group mb-0">
					<label>Request Details</label>
					<textarea class="form-control" required name="request_details" id="request_details"><?=($req ? $req->request_details : "")?></textarea>
				</div>
				<br>
				
				<!-- <div class="file_upload">
					<form action="file_upload.php" class="dropzone">
						<div class="dz-message needsclick">
							<strong>Drop files here or click to upload.</strong><br />
							<span class="note needsclick">(This is just a demo. The selected files are <strong>not</strong> actually uploaded.)</span>
						</div>
					</form>		
				</div>		 -->
				<h3>Image File Uploads</h3>
				<div class="well" data-bind="fileDrag: multiFileData">
					<div class="form-group row">
						<div class="col-md-6">
								<!-- ko foreach: {data: multiFileData().dataURLArray, as: 'dataURL'} -->
								<img style="height: 100px; margin: 5px;" class="img-rounded  thumb" data-bind="attr: { src: dataURL }, visible: dataURL">
								<!-- /ko -->
							<div data-bind="ifnot: fileData().dataURL">
								<label class="drag-label">Drag files here...</label>
							</div>
						</div>
						<div class="col-md-6">
							<input type="file" multiple data-bind="fileInput: multiFileData, customFileInput: {
							buttonClass: 'btn btn-success',
							fileNameClass: 'disabled form-control',
							onClear: onClear,
							}" accept="image/*" name="files[]" id="files">
						</div>
					</div>
				</div>
				<div class="upload-wrap">
					<?php
						if($req){
							if($req->images){
								foreach($req->images as $image){
									echo '<div class="upload-images" id="file_div'.$image->request_image_id.'">
									<img src="'.base_url('uploads/'.$image->request_image).'" alt="Upload Image" style="width:82px;height:82px;">
									<a href="javascript:deleteFile('.$image->request_image_id.');" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
								</div>';
								}
							}
							

						}
					?>
					<!-- <div class="upload-images">
						<img src="<?=$assets?>assets/img/features/feature-01.jpg" alt="Upload Image">
						<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
					</div>
					<div class="upload-images">
						<img src="<?=$assets?>assets/img/features/feature-02.jpg" alt="Upload Image">
						<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
					</div> -->
				</div>	
				<br><br>
				<div class="submit-section submit-btn-bottom">
					<input type="hidden" value="<?=($req ? $req->tbl_request_id : 0)?>" id="tbl_request_id" name="tbl_request_id" />
					<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
				</div>
				</form>						
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
<script src="<?=$assets?>assets/js/dropzone.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js'></script><script src='<?=$assets?>assets/js/knockout-file-bindings.js'></script>
<script>

$(function(){
  var viewModel = {};
  viewModel.fileData = ko.observable({
    dataURL: ko.observable(),
    // base64String: ko.observable(),
  });
  viewModel.multiFileData = ko.observable({
    dataURLArray: ko.observableArray(),
  });
  viewModel.onClear = function(fileData){
    if(confirm('Are you sure?')){
      fileData.clear && fileData.clear();
    }                            
  };
  viewModel.debug = function(){
    window.viewModel = viewModel;
    console.log(ko.toJSON(viewModel));
    debugger; 
  };
  ko.applyBindings(viewModel);
});
function deleteFile(fileid){
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
		url : '<?php echo base_url('createrequest/deleteFile'); ?>/'+fileid,
		type: "GET",        
		dataType: "html",
		success: function(data)
		{
			if(data){
				$('#file_div'+fileid).hide();
				swal("Poof! Your imaginary file has been deleted!", {
					icon: "success",
				});
			}else{
				swal("Sorry! There is a problem with deleting file in database. Please Try agine!");
			}
			console.log(data);
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error deleting data' + errorThrown);
		}
	});
		
	} else {
		swal("Your imaginary file is safe!");
	}
	});
	
	
}
</script>



















					</div>

				</div>

			</div>		