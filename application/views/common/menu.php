<div class="main-wrapper">
		
        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="<?=base_url()?>" class="navbar-brand logo">
                        <img src="<?=$assets?>images/logo.png" class="img-fluid" alt="Logo" style="max-width: 52%;">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="<?=base_url()?>" class="menu-logo">
                            <img src="<?=$assets?>images/logo.png" class="img-fluid" alt="Logo" style="max-width: 52%;">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    
                    <ul class="main-nav">
                        <li class="<?=$home?>">
                            <a href="<?=base_url()?>">Home</a>
                        </li>
                        
                        <?php
                            //if($this->session->userdata('userid')!=''){
                        ?>
                        <li class="<?=$newrequest?>"><a href="<?=base_url('newrequest')?>">New Requests</a></li>
                        <li class="<?=$reviews?>"><a href="<?=base_url('reviews')?>">Reviews On Members</a></li>                        
                        <li class="<?=$howwork?>"><a href="<?=base_url('howitworks')?>">How It Works</a></li>
                        <?php
                            //}
                        ?>
                        <li class="<?=$faq?>"><a href="<?=base_url('faqs')?>">FAQs</a></li>
                        <li class="<?=$contact?>"><a href="<?=base_url('contactus')?>">Contact US</a></li>
                        <!-- <li class="login-link">
                            <a href="login.html">Login / Signup</a>
                        </li> -->
                    </ul>	 

                    
                </div>		 
                <ul class="nav header-navbar-rht">
                    <li>
                        <div class="text-danger" style="padding:10px;text-align:center;"><?=$this->session->flashdata('error')?></div>
                        <div class="text-success" style="padding:10px;text-align:center;"><?=$this->session->flashdata('message')?></div>

                    </li>
                <?php
                        if($this->session->userdata('userid')!=''){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="<?=base_url('createrequest')?>" style="background-color: #09dca4;color: #ffffff;border: #f3736f;">Creat Request </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="<?=base_url('myaccount')?>" style="color: #f3736f;"><?=$this->session->userdata('tbl_user_first_name')?>'s Account </a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                        if(!$this->session->userdata('userid')!=''){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="<?=base_url('login')?>" style="color: #f3736f;">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="<?=base_url('welcome/signup')?>" style="color: #f3736f;">Register </a>
                    </li>
                    <?php
                            }else{
                                echo '<li class="nav-item"><a class="nav-link header-login" href="'.base_url('welcome/logout').'" style="color: #f3736f;">Logout </a></li>';
                            }
                        ?>
                </ul>
            </nav>
        </header>