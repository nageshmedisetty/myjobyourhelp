<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createrequest extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('requests_model');
		$this->upload_path = 'uploads/';
		$this->image_types = 'gif|jpg|jpeg|png|tif|JGP';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|JPG|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
    
    }
	
	public function index(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{					
			$this->data['headtitle'] = "Create Request";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Create Request";	
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');							
			$this->data['req'] = Null;
			$this->data['home'] = '';		
			$this->data['newrequest'] = 'active';	
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
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';								
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('createrequest',$this->data);
				
		}
	        
	}
	public function update($id){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{					
			$this->data['headtitle'] = "Create Request";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Create Request";	
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');								
			$this->data['req'] = $this->users_model->getEditData($id,'tbl_requests','tbl_request_id ');								
			// $this->varaha->print_arrays($this->data['req']);
			$this->data['home'] = '';		
			$this->data['newrequest'] = 'active';	
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
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';		
			$this->page_construct('createrequest',$this->data);
				
		}
	        
	}
	public function create(){


		$img_data = array();
		$id = $this->input->post('tbl_request_id');
		$data = array(
			'request_brief_description' => $this->input->post('request_brief_description'),
			'request_technologies' => implode(', ', $this->input->post('request_technologies')),
			'request_details' => $this->input->post('request_details'),
			

		);
		if($id){
			$data['updated_date'] = date('Y-m-d h:i:s',time());
			$data['updated_by']= $this->session->userdata('userid');
		}else{
			$data['created_date'] = date('Y-m-d h:i:s',time());
			$data['created_by']= $this->session->userdata('userid');
		}
		$url = $this->upload_path;
		$psname4="";
		if (isset($_FILES['files']) && !empty($_FILES['files'])) {
			// $this->varaha->print_arrays($_FILES["files"]['name']);
			$no_files = count($_FILES["files"]['name']);
			// $this->varaha->print_arrays($no_files);

			
			for ($i = 0; $i < $no_files; $i++) {
				if ($_FILES["files"]["error"][$i] > 0) {
					echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
				} else {
					$name = $_FILES['files']['name'][$i].time();
					//$psname4 = $url.md5($name).".jpg";	
					$sname = md5($name);
					
					$rand = substr(md5($sname),rand(0,26),5);
					$psname4 = $url.$rand.".jpg";	
					$psname = $rand.".jpg";
					if (file_exists($psname4)) {
						echo 'File already exists : ' . $psname4;
					} else {
						if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $psname4)) {
							$img_data[] = array(
								'request_image' => $psname,
								'request_id' =>"",
							);
							// echo "The file ". htmlspecialchars( basename( $_FILES["files"]["name"])). " has been uploaded.";
						  } else {
							echo "Sorry, there was an error uploading your file.";
						  }
						
					}
				}
			}
		}
		// $this->varaha->print_arrays($code = $this->varaha_model->getCode('tbl_requests',4,'tbl_request_id','REQ'));
		if($this->requests_model->create($data,$img_data,$id)){
			
			if($id){
				$this->session->set_flashdata('message', "Request Updated Successfully."); 
			}else{
				$this->session->set_flashdata('message', "Request Created Successfully"); 
			}
			
			redirect('newrequest/');
		}else{
			$this->session->set_flashdata('error', "Sorry! There is problem with Client M	aster Updation. Code Unique.");
			redirect('newrequest/');
		}

		
		$this->varaha->print_arrays($data,$img_data);
	}

	public function deleteFile($id){

		if($this->requests_model->fileDelete($id)){
			echo true;
		}
		echo false;
		
	}
}

