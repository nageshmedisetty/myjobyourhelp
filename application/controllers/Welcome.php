<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('requests_model');
    }
	
	public function index(){
		// if($this->session->userdata('userid')==''){
		// 	$this->data['headtitle'] = "Sign Up";
		// 	$this->data['sidepanel'] = 0;
		// 	$this->load->view('authentication/signup',$this->data);
		// }else{			
			$this->data['headtitle'] = "Home Page";	
			$this->data['sidepanel'] = 0;
			$this->data['totalhelpreq'] = $this->users_model->getTotalHelpRequests();
			$this->data['totalhelppro'] = $this->users_model->getTotalHelpProviders();
			$this->data['totalhelpreqs'] = $this->users_model->getTotalHelpRequesters();
			
			$c = $this->data['totalhelpreq'] + $this->data['totalhelppro'];
			$this->data['valueC'] = $c;	
			$this->data['home'] = 'active';
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';
			$this->data['requests'] = $this->requests_model->getAllRequests(10);
			$this->data['helppros'] = $this->users_model->getAllHelpProviders(10);
			$this->data['dashboarddata'] = $this->users_model->getDashboardData();
			// $this->varaha->print_arrays($this->data['requests']);
			$this->page_construct('welcome',$this->data);	
		// }          
	}


	

	public function signup()
	{
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "Sign Up";
			$this->data['sidepanel'] = 0;
			$this->load->view('authentication/signup',$this->data);
			
		}else{				
			$this->page_construct('welcome',$this->data);	
		}
	}

	public function checklogin(){


		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password', "Password", 'required');
		
		 if ($this->form_validation->run('Welcome/login') == true) {
			$res = $this->users_model->login($this->input->post('username'),$this->input->post('password'));
			// $this->varaha->print_arrays($type);
			
			
			if($res==1){
				$this->session->set_flashdata('message', "Login Successfully.");
				redirect('');
			}else if($res==2){
				$this->session->set_flashdata('error', "Sorry! Username incorrect.");
				redirect(''); 
			}else if($res==3){
				$this->session->set_flashdata('error', "Sorry! Password incorrect.");
				redirect('');
			}else if($res==4){
				$this->session->set_flashdata('error', "Sorry! User Not Active. Plz. Contact Admin");
				redirect('');
			}else if($res==5){
				$this->session->set_flashdata('error', "Sorry! User Not Active. Plz. Verify your email account");
				redirect('');
			}
		 }else{
			$this->session->set_flashdata('error', validation_errors());
			redirect('');
		 }

		 
		
	}

	
	function register(){
			

		$data = array(
			'tbl_user_first_name' => $this->input->post('tbl_user_first_name'), 
			'tbl_user_last_name' => $this->input->post('tbl_user_last_name'), 
			'tbl_user_email' => $this->input->post('tbl_user_email'), 
			'tbl_user_user_name' => $this->input->post('tbl_user_user_name'), 
			'tbl_user_password' => md5($this->input->post('tbl_user_password')), 
			'tbl_user_moble' => $this->input->post('tbl_user_moble'), 
			'tbl_user_cuountry_code' => $this->input->post('tbl_user_cuountry_code'), 
			'tbl_user_provider' => ($this->input->post('tbl_user_provider') ? 1 : 0), 
		);
		
		if($data){
			$res = $this->users_model->register($data);
			// $this->varaha->print_arrays($res,$data);
			if($res==1){				
				redirect('welcome');							
			}else if($res == 2){
				$this->session->set_flashdata('error', "Sorry! Unable to register your account. Please try again");
				redirect('welcome/signup');
			}else if($res == 3){
				$this->session->set_flashdata('error', "Sorry! Already Phone Number Exist. Please try Login");
				redirect('welcome/signup');
			}else if($res == 4){
				$this->session->set_flashdata('error', "Sorry! Already User Name Exist. Please try Login");
				redirect('welcome/signup');
			}else if($res == 5){
				$this->session->set_flashdata('error', "Sorry! Already Email Exist. Please try Login");
				redirect('welcome/signup');
			}else if($res == 10){
				$this->session->set_flashdata('message', "Thank you for registering. To finish signing up for your account, confirm your email address. Please Check your email.");
				redirect('welcome');	
			}else if($res == 9){
				$this->session->set_flashdata('error', "Sorry! Unable to register your account. Please try again");
				redirect('welcome/signup');
			}
		}
	}



	public function forgotUserId()
	{
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "Forgot UserId";
			$this->data['sidepanel'] = 0;
			$this->load->view('authentication/forgotuserid',$this->data);
			$this->load->view('common/footer',$this->data);
		}else{		
			$this->page_construct('welcome',$this->data);	
		}
	}


	public function forgotUser(){
		$this->form_validation->set_rules('tbl_user_email','tbl_user_email','required');
		if ($this->form_validation->run('Welcome/login') == true) {
			$res = $this->users_model->getEditData($this->input->post('tbl_user_email'),'tbl_user_details','tbl_user_email');
			// $this->varaha->print_arrays($res);
			if($res){
				
				if($this->input->post('type')==1){
				$body = '<html>
						<body>
							<div>Your User ID is : <b>'.$res->tbl_user_user_name.'</b></div>
						</body>

						</html>';
				}else{
					$updatepass = $this->users_model->updatePassword($res);
					$body = '<html>
						<body>
							<div>Your User Password is : <b>'.$updatepass.'</b></div>
						</body>

						</html>';
				}
						$ToEmail = $res->tbl_user_email;
						$ToName  = 'Myjobyourhelp';

						require 'vendor/autoload.php';
						require 'PHPMailer/PHPMailer/src/Exception.php';
						require 'PHPMailer/PHPMailer/src/PHPMailer.php';
						require 'PHPMailer/PHPMailer/src/SMTP.php';
						$mail = new PHPMailer\PHPMailer\PHPMailer();
						$mail->isSMTP();
						$mail->SMTPDebug = 0;
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = 587;
						$mail->SMTPAuth = true;
						$mail->Username = 'nagesh.vb2028@gmail.com';
						$mail->Password = 'ouzlouuwugisovvc';
						// $mail->Username = 'admin@spiolabs.com';
						// $mail->Password = 'chsiwktcjebsssfd';
						$mail->setFrom('nagesh.vb2028@gmail.com', 'Forgot UserID - MYJOB');
						$mail->addAddress($ToEmail, $ToName);
						// $mail->addCC($email);
						// $mail->addBCC('snehadeep@spiolabs.com','anjum@spiolabs.com','kiran@spiolabs.com','saikrishna@spiolabs');
						// $mail->addReplyTo("contact@spiolabs.com", $ToName);
						//;;
						if($this->input->post('type')==1){
							$mail->Subject = "Forgot UserID  - From Myjobyourhelp";
						}else{
							$mail->Subject = "Forgot Password  - From Myjobyourhelp";
						}
						
						$mail->msgHTML($body);
						if (!$mail->send()) {
						$msg =  'Mailer Error: ' . $mail->ErrorInfo;
						$this->session->set_flashdata('error', $msg);
						} else {
							if($this->input->post('type')==1){
								$msg = $res->tbl_user_first_name." ".$res->tbl_user_last_name . "Your USER ID sent to your mail please check. ";
							}else{
								$msg = $res->tbl_user_first_name." ".$res->tbl_user_last_name . "Your Password sent to your mail please check. ";
							}
						$this->session->set_flashdata('message', $msg);
						}
						
						
						redirect('welcome/forgotUserId');
			}else{
				$this->session->set_flashdata('error', "Sorry! Unable to fetch your email. Please try again");
				redirect('welcome/forgotUserId');
			}
		 }else{
			$this->session->set_flashdata('error', validation_errors());
			redirect('');
		 }
	}
	public function forgotPassword()
	{
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "Forgot Password";
			$this->data['sidepanel'] = 0;
			$this->load->view('authentication/forgotpassword',$this->data);
		}else{		
			$this->page_construct('welcome',$this->data);	
		}
	}

	public function changepassword()
	{
		if($this->session->userdata('userid')){
			$this->data['headtitle'] = "Change Password";
			$this->data['sidepanel'] = 0;
			$this->load->view('authentication/changepassword',$this->data);
			$this->load->view('common/footer',$this->data);
		}else{		
			redirect('login');
		}
	}
	public function checkOldPass(){
		$oldpass = $_POST['src'];
		$res = $this->users_model->checkOldPass($oldpass);
		echo $res;
	}
	public function changenewpassword(){

		$oldpass = $_POST['tbl_user_password'];
		$newpass = $_POST['tbl_user_new_password'];

		$res = $this->users_model->changenewpassword($oldpass,$newpass);
		if($res){
			$this->session->set_flashdata('message', "Your Password Changed Successfully");
			redirect('welcome/logout');
		}else{
			$this->session->set_flashdata('error', "Sorry! Unable to change your password. Please try again");
			redirect('welcome/changepassword');
		}
		

	}

	
	public function logout(){			

		$data = array('userid'=> "",'tbl_user_first_name'=> "",'tbl_user_last_name'=> "",'tbl_user_email'=> "",'tbl_user_user_name'=> "",'tbl_user_moble'=> "",'tbl_user_cuountry_code'=> "",'tbl_user_provider'=> "");
		$this->session->set_userdata($data);
		$this->session->sess_destroy();	
		session_start();
		session_destroy();
		// return true;
		redirect('welcome');
	}
	public function confirm($id){
		// if($this->session->userdata('userid')==''){
		// 	$this->data['headtitle'] = "Sign Up";
		// 	$this->data['sidepanel'] = 0;
		// 	$this->load->view('authentication/signup',$this->data);
		// }else{			
			$this->data['headtitle'] = "Home Page";	
			$this->data['sidepanel'] = 0;
			$a = 100;
			$b = 150;
			$c = $a + $b;
			$this->data['valueC'] = $c;	
			$this->data['home'] = 'active';
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';
			$this->data['requests'] = $this->requests_model->getAllRequests(10);
			$this->data['helppros'] = $this->users_model->getAllHelpProviders(10);
			$this->data['dashboarddata'] = $this->users_model->getDashboardData();
			$this->users_model->confirmaccount($id);
			// $this->varaha->print_arrays($this->data['requests']);
			$this->page_construct('welcome',$this->data);	
		// }          
	}
}
