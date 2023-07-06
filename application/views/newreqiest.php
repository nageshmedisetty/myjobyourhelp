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
<link href="<?= $assets ?>assets/css/dataTables.bootstrap4.min.css.css" rel="stylesheet" crossorigin="anonymous">
<!-- Page Content -->
<div class="content">
				<div class="container-fluid">
				<div class="col-md-12">
					<div class="row">
						
						
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
																	<th>Request Date</th>
																	<th>Request ID</th>
																	<th>Requester ID</th>
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
            "url": "<?php echo base_url('newrequest/ajax_list') ?>",
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
</script>