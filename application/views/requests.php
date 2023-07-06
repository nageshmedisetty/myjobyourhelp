<!-- <div class="row" style="width:70%;">
	<div class="col-md-12 col-lg-12 col-xl-12 theiaStickySidebar"> 
		<div class="card" style="width:100%;">
			<div class="card-body"> -->
			<link href="<?= $assets ?>assets/css/dataTables.bootstrap4.min.css.css" rel="stylesheet" crossorigin="anonymous">
<!-- Page Content -->
<div class="col-md-6 col-lg-8 col-xl-9 ">
				<div class="container-fluid">
				<div class="col-md-12">
					<div class="row">
					<div class="col-12 col-md-4">
						<div class="form-group">
						
						<?php	
							$gs["0"] = "All";
							if($status){	
								foreach ($status as $stat) {
									$gs[$stat->status_id] = $stat->name;
								}
							}	
							echo form_dropdown('status', $gs, "", 'class="form-control myselect" id="status" data-placeholder="Select Status" style="width:100%" onChange="getRequestDataByStatus(this.value)"')
						?>			
					</div>
					</div>
						
						<div class="col-md-12 col-lg-12 col-xl-12">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Content -->
									<div class="tab-content pt-0">
									<div style="padding-top:20px;">	
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card-table mb-0">
												<div class="-body">
													<div class="table-responsive">
														<table  class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
														<!-- <table class="table table-hover table-center mb-0"> -->
															<thead>
																<tr>
																	<th>S.No</th>
																	<!-- <th>Request Date</th> -->
																	<th>Request ID</th>
																	<th>Provider ID</th>
																	<th>Brief Description</th>
																	<th>Status</th>
																	<th style="text-align:center;">Action</th>
																</tr>
															</thead>
															<tbody>
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										
										
									</div>
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			</div>
			<script src="<?= $assets ?>assets/js/jquery-1.11.1.min.js"></script>
<script>
    // $('.myselect').select2();
$(document).ready(function() {
    // $('.myselect').select2({minimumResultsForSearch: 5});
	
	table = $('#zero_configuration_table').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo base_url('requestcenter/ajax_list/1') ?>",
            "type": "POST",
            "data": function ( data ) {
				data.status = 0;
            }
        },
        "columnDefs": [
        {
            "targets": [ 0 ],
            "orderable": false,
        },
        ],

    });

    $('#btn-filter').click(function(){
        table.ajax.reload();
    });
    $('#btn-reset').click(function(){
        $('#form-filter')[0].reset();
        table.ajax.reload();
    });

});

function getRequestDataByStatus(status){
	$("#zero_configuration_table").dataTable().fnDestroy();

	table = $('#zero_configuration_table').DataTable({
		"sDom": 'r<"H"lf><"datatable-scroll"t><"F"ip>',
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo base_url('requestcenter/ajax_list') ?>",
			"type": "POST",
			"data": function ( data ) {
				data.status = status;
			}
		},
		"columnDefs": [
		{
			"targets": [ 0 ],
			"orderable": false,
		},
		],

		});

		$('#btn-filter').click(function(){
		table.ajax.reload();
		});
		$('#btn-reset').click(function(){
		$('#form-filter')[0].reset();
		table.ajax.reload();
		});
}
</script>
			
		<!-- </div>
	</div>
</div>
<br> -->