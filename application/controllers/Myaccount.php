<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->upload_path = 'public/assets/user_images/';
		$this->image_types = 'gif|jpg|jpeg|png|tif|JGP';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|JPG|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
    
    }
	
	public function index(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{					
			$this->data['headtitle'] = "My Account";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Dashboard";
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';	
			$this->data['dashboard_side'] = 'active';
			$this->data['myrequest_side'] = '';
			$this->data['myhelp_side'] = '';
			$this->data['approvereq_side'] = '';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');					
			
			$this->data['dashdata'] = $this->users_model->getDashData($this->session->userdata('userid'));
			// $this->varaha->print_arrays($this->data['dashdata']);
			$this->page_construct('myaccount',$this->data);
				
		}
	        
	}

	public function profilesettings($id=null){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			redirect('login');
			// $this->load->view('authentication/login',$this->data);
		}else{					
			$this->data['headtitle'] = "Profile Settings";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Profile Settings";
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';
			$this->data['dashboard_side'] = '';
			$this->data['myrequest_side'] = '';
			$this->data['myhelp_side'] = '';
			$this->data['approvereq_side'] = '';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = 'active';
			$this->data['changepass_side'] = '';	
			
			$userId = ($id ? $id : $this->session->userdata('userid'));
			$this->data['user'] = $id;
			$this->data['row'] = $this->users_model->getEditDataUserData($userId,'tbl_user_details','tbl_user_id');			
			$this->data['countrys'] = $this->users_model->getAllCountery();		
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('profilesettings',$this->data);
				
		}
	        
	}
	
	public function updateprofile(){

		$data = array(
			'tbl_user_first_name' => $this->input->post('tbl_user_first_name'), 
			'tbl_user_last_name' => $this->input->post('tbl_user_last_name'), 
			'tbl_user_email' => $this->input->post('tbl_user_email'), 
			'tbl_user_user_name' => $this->input->post('tbl_user_user_name'), 
			'tbl_user_moble' => $this->input->post('tbl_user_moble'), 
			'tbl_user_provider' => ($this->input->post('tbl_user_provider') ? 1 : 0), 
			'tbl_user_whatapp_no' => $this->input->post('tbl_user_whatapp_no'), 
			'tbl_user_address' => $this->input->post('tbl_user_address'), 
			'tbl_user_city' => $this->input->post('tbl_user_city'), 
			'tbl_user_state' => $this->input->post('tbl_user_state'), 
			'tbl_user_pin_code' => $this->input->post('tbl_user_pin_code'),
			'tbl_technologies' => $this->input->post('tbl_technologies'),
			'tbl_user_contry' => $this->input->post('tbl_user_contry'),
			'description' => $this->input->post('description'),
			
			
		);
		$user_id = $this->input->post('tbl_user_id');	
		$url = $this->upload_path;
			$psname4="";
			if (isset($_FILES['profileimg']) && !empty($_FILES['profileimg'])) {
				$name = $_FILES['profileimg']['name'].time();
				$sname = md5($name);
				$rand = substr(md5($sname),rand(0,26),5);
				$psname4 = $url.$rand.".jpg";	
				$psname = $rand.".jpg";
				if (move_uploaded_file($_FILES["profileimg"]["tmp_name"], $psname4)) {
					$data['user_image'] = $psname;
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}	
		// $this->varaha->print_arrays($data, $user_id);

		$res = $this->users_model->updateUserProfile($user_id,$data);
		if($res){		
			$this->session->set_flashdata('message', "Your Profile Data Updated successfully.");	
			redirect('myaccount/profilesettings');							
		}else{
			$this->session->set_flashdata('error', "Sorry! Already User Exist. Please try Login");
			redirect('myaccount/profilesettings');
		}
	}

	
}

