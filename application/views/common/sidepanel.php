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
<div class="content">
    <div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 " style="margin-top:-30px;">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
                                            <?php
                                                if($row->user_image){
                                                    echo '<img src="'.$assets.'assets/user_images/'.$this->session->userdata('user_image').'" alt="User Image">';
                                                }else{
                                                    echo '<img src="'.$assets.'assets/img/patients/patient.jpg" alt="User Image">';
                                                }
                                            ?>
											
										</a>
										<div class="profile-det-info">
											<h3><?=$this->session->userdata('tbl_user_first_name').' '.$this->session->userdata('tbl_user_last_name')?></h3>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="<?=$dashboard_side?>">
												<a href="<?=base_url('myaccount')?>">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="<?=$myrequest_side?>">
												<a href="<?=base_url('requestcenter/request')?>">
													<i class="fas fa-comments"></i>
													<span>My Request Center</span>
												</a>
											</li>
											<li class="<?=$myhelp_side?>">
												<a href="<?=base_url('requestcenter/myhelprequest')?>">
													<i class="fas fa-comments"></i>
													<span>My Help Center</span>
												</a>
											</li>
											<li class="<?=$approvereq_side?>">
												<a href="<?=base_url('requestcenter/contactinfo')?>">
													<i class="fas fa-comments"></i>
													<span>Approve Requests for Contact Info</span>
												</a>
											</li>
											<li class="<?=$helpprovider_side?>">
												<a href="<?=base_url('requestcenter/helpcontactinfo')?>">
													<i class="fas fa-comments"></i>
													<span>Help Provider Contact Info</span>
												</a>
											</li>
											<li class="<?=$chat_side?>">
												<a href="<?=base_url('chat')?>">
													<i class="fas fa-comments"></i>
													<span>Chat</span>
												</a>
											</li>
											<li class="<?=$profile_side?>">
												<a href="<?=base_url('myaccount/profilesettings')?>">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li class="<?=$changepass_side?>">
												<a href="<?=base_url('welcome/changepassword')?>">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="<?=base_url('welcome/logout')?>">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
                                            
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->

						
												
						