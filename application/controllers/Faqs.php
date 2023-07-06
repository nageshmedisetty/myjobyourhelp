<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends MY_Controller {

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
			$this->data['headtitle'] = "FAQ's";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "FAQ's";	
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = 'active';	
			$this->data['contact'] = '';				
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('faqs',$this->data);
				
		// }
	        
	}
}
