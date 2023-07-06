<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('newrequest_model');
		$this->load->model('requests_model');
		$this->load->model('chat_model');
    }
	
	public function index(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "New Request's";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "New Request";
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
			$this->data['helpprovider_side'] = 'active';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';	
			$this->data['userId'] = $this->session->userdata('userid');
			$this->data['username'] = $this->session->userdata('tbl_user_first_name').' '.$this->session->userdata('tbl_user_last_name');
			$this->data['prevchat'] = $this->chat_model->getPreviousChat();
			$this->data['users'] = $this->chat_model->getAllusers();
			// $this->varaha->print_arrays($this->data['users']);
			$firstrow = "";
			if($this->data['prevchat']){
				$i=0;
				foreach($this->data['prevchat'] as $row){
					if($i==0){
						$firstrow = $row->reciverId;
						$this->data['firstname'] = $row->reciver;
					}					
					$i++;
				}
			}
			$this->data['windowchat'] = $this->chat_model->getWindowChat($firstrow);
			// $this->varaha->print_arrays($this->data['windowchat']);
			$this->page_construct('chatwindow',$this->data);
				
		}
	        
	}
	public function getchatroom($reciverId){
		$res = $this->chat_model->getWindowChat($reciverId);
		echo json_encode($res, true);
	}
	public function postchat(){
		$data = array(
			'userId' => $_POST['userId'],
			'reciverId' => $_POST['reciverId'],
			'message' => $_POST['message'],
		);
		$res = $this->chat_model->insertChat($data);
		if($res){
			echo json_encode($data);
		}
		echo false;
	}

	public function searchuser(){
		$query = $_POST['query'];
		$res = $this->chat_model->getAllusersSearch($query);
		echo json_encode($res,true);
	}
	
}

