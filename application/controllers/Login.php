<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('userlogin_model');
    }
	public function index()
	{
		// $this->varaha->print_arrays($this->session->userdata());
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/userlogin',$this->data);
			$this->load->view('common/footer',$this->data);
		}else{
			redirect('welcome');
		}
	}

	

	

	public function checklogin(){


		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password', "Password", 'required');
		// $this->form_validation->set_rules('session_req_hash', "Session Request Hash", 'required');
		
		 if ($this->form_validation->run('Welcome/login') == true) {
			$res = $this->userlogin_model->login($this->input->post('username'),$this->input->post('password'));
			// $this->varaha->print_arrays($type);
			
			
			if($res==1){
				$this->session->set_flashdata('message', "Login Successfully.");
				redirect('welcome');
			}else if($res==2){
				$this->session->set_flashdata('error', "Sorry! Username incorrect.");
				redirect('login');
			}else if($res==3){
				$this->session->set_flashdata('error', "Sorry! Password incorrect.");
				redirect('login');
			// }else if($res==4){
			// 	$this->session->set_flashdata('error', "Sorry! User Not Active. Plz. Contact Admin");
			// 	redirect('login');
			}else if($res==5){
				$this->session->set_flashdata('error', "Sorry! User Not Active. Plz. Verify your email account");
				redirect('login');
			// }else if($res==6){
			// 	$this->session->set_flashdata('error', "Sorry! User Session Request is not generated.");
			// 	redirect('login');
			}
		 }else{
			$this->session->set_flashdata('error', validation_errors());
			redirect('login');
		 }

		 
		
	}

	



	

	
	
	
}
