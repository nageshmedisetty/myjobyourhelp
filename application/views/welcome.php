<section class="section">
    <div class="banner_section layout_padding">
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" >                        
                    <div class="banner-header text-center">
                        <img src="<?=$assets?>images/back.jpg" style="width: 100%;height: 400px;">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="<?=$assets?>images/back.jpg" style="width: 100%;height: 400px;">
                    </div>
                    <div class="carousel-item">
                    <img src="<?=$assets?>images/back.jpg" style="width: 100%;height: 400px;">
                    </div>
                    <div class="carousel-item">
                    <img src="<?=$assets?>images/back.jpg" style="width: 100%;height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-doctor" style="padding: 0px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card dash-card" style="margin-bottom: 0px;height:100%;background-color: #ffdf76;">
                <div class="card-body" style="padding: 5px;">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                                <div style="text-align:center;">
                                    <h6>Total Help Requests</h6>
                                    <h3><?=$totalhelpreq?></h3>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-4">
                                <div style="text-align:center;">
                                    <h6>Total Help Providers</h6>
                                    <h3><?=$totalhelppro?></h3>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-4">
                                <div style="text-align:center;">
                                    <h6>Total Help Requesters</h6>
                                    <h3><?=$totalhelpreqs?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><h2 class="mt-2" style="background-color: #adff76;text-align: center;padding: 11px;">How it works</h2>
            <div class="card dash-card" style="background-color: #ffffff;">
                <div class="card dash-card" style="background-color: #ffffff;">
                    <div class="card-body">
                        <div class="row">
                            <img src="<?=$assets?>images/MJ.png" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>							
</section>

<!-- Popular Section -->
<section class="section section-doctor" style="padding: 10px;">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xl-12">
                
				<div class="card">
                <nav class="user-tabs mb-4" style="width:100%;">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#pat_appointments" data-toggle="tab" style="color: white;background-color: #f3c50e;border-top-left-radius:5px;border-top-right-radius:5px;">Latest Requests </a>
                        </li>
                    </ul>
                </nav>
					<div class="card-body pt-0">								
                                <!-- Tab Menu -->
                                
                                <!-- /Tab Menu -->
                                <nav class="user-tabs mb-4">
                                <!-- Tab Content -->
                                <div class="tab-content pt-0">
                                    
                                    <!-- Appointment Tab -->
                                        <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
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
                                                            <?php
                                                                if($requests){
                                                                    $sno=1;
                                                                    foreach($requests as $req){
                                                                        $status= $this->requests_model->getStatusDit($req->tbl_request_id,null);
                                                                        
                                                                        $discrip="";
                                                                        if(strlen($req->request_brief_description) > 50){
                                                                            $discrip = substr($req->request_brief_description,0,50).'...';
                                                                        }else{
                                                                            $discrip = $req->request_brief_description;
                                                                        }
                                                                        echo '<tr>';
                                                                        echo '<td>'.$sno.'</td>';
                                                                        echo '<td>'.$req->created_date.'</td>';
                                                                        echo '<td>'.$req->request_seq_code.'</td>';
                                                                        echo '<td>'.$this->requests_model->getRequesterId($req->created_by).'</td>';
                                                                        echo '<td>'.$discrip.'</td>';
                                                                        if($status){
                                                                            if($status->status_id==2){
                                                                                echo '<td><span class="badge badge-pill bg-danger-light">Close</span></td>';
                                                                            }else{
                                                                                echo '<td><span class="badge badge-pill bg-success-light">Open</span></td>';
                                                                            }
                                                                        }else{
                                                                            echo '<td><span class="badge badge-pill bg-success-light">Open</span></td>';
                                                                        }
                                                                        
                                                                        
                                                                        echo '<td class="text-right">
                                                                            <div class="table-action">
                                                                                <a href="'.base_url('newrequest/requestdetails/'.$req->tbl_request_id).'" class="btn btn-sm bg-info-light">
                                                                                    <i class="far fa-eye"></i> View Request <span style="color:black;">& </span> Respond
                                                                                </a>
                                                                            </div>
                                                                        </td>';
                                                                        echo '</tr>';
                                                                        $sno++;
                                                                    }
                                                                }
                                                            ?>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Appointment Tab -->
                                    
                                    
                                    
                                </div>
                                </nav>
                                <!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
		</div>
	</div>
</section>
<section class="section section-doctor" style="padding: 10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <h2 class="mt-2" style="text-align: center;">Help Providers</h2>
                <div class="doctor-slider slider">
                <?php
                    if($helppros){
                        foreach($helppros as $help){

                       
                ?>
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="<?=base_url('myaccount/profilesettings/'.$help->tbl_user_id)?>">
                                <img class="img-fluid" style="height:180px;" alt="User Image" src="<?=$assets?>assets/user_images/<?=$help->user_image?>">
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="<?=base_url('myaccount/profilesettings/'.$help->tbl_user_id)?>"><?=$help->tbl_user_first_name.' '.$help->tbl_user_last_name?></a> 
                                <i class="fas fa-check-circle verified"></i>
                            </h3>
                            <p class="speciality"><?=$help->tbl_technologies ? $help->tbl_technologies : 'No Description updated'?></p>
                        <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating">(<?=$help->star1?>)</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(<?=$help->star2?>)</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(<?=$help->star3?>)</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(<?=$help->star4?>)</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(<?=$help->star5?>)</span>
                            </div>
                            <ul class="available-info">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> <?=$help->tbl_user_city?>, <?=$help->tbl_user_state?>
                                </li>
                                
                            </ul>
                            <div class="row row-sm">
                                <div class="col-12">
                                    <a href="<?=base_url('myaccount/profilesettings/'.$help->tbl_user_id)?>" class="btn view-btn">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                         }
                        }else{
                            echo "No Help Providers Found.";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>