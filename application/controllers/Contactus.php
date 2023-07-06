<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
    
    }
	
	public function index(){
		
		// if($this->session->userdata('userid')==''){
		// 	$this->data['headtitle'] = "LogIn";
		// 	$this->load->view('authentication/login',$this->data);
		// }else{					
			$this->data['headtitle'] = "Contact Us";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Contact Us";	
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = 'active';					
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('contactus',$this->data);
				
		// }
	        
	}
}

