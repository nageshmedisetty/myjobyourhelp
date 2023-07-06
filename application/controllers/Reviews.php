<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('requests_model');
		
    }
	
	public function index(){
		
		// if($this->session->userdata('userid')==''){
		// 	$this->data['headtitle'] = "LogIn";
		// 	$this->load->view('authentication/login',$this->data);
		// }else{					
			$this->data['headtitle'] = "Reviews";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Reviews";	
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = 'active';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';	
			$this->data['reviewsdata'] = $this->requests_model->getAllReviews();	
			$this->data['search'] = 0;
			$this->data['user_image'] = "";
			$this->data['mcode'] ="";
			// $this->data['reqrow'] = $this->requests_model->getRequestDetails($reqId);
			// $this->data['prorow'] = $this->users_model->getEditData($prevId,'tbl_user_details','tbl_user_id');
			// $this->data['requesterrow'] = $this->users_model->getEditData($this->data['reqrow']->created_by, 'tbl_user_details','tbl_user_id');	
			// $this->varaha->print_arrays($this->data['reviews']);
			$this->page_construct('reviews',$this->data);
				
		// }
	        
	}

	public function search(){
		$memcode = $_POST['memcode'];
		$this->data['headtitle'] = "Reviews";	
		$this->data['sidepanel'] = 0;
		$this->data['home'] = "Home";
		$this->data['dashboard'] = "Reviews";	
		$this->data['home'] = '';		
		$this->data['newrequest'] = '';	
		$this->data['reviews'] = 'active';	
		$this->data['howwork'] = '';	
		$this->data['faq'] = '';	
		$this->data['contact'] = '';	
		$this->data['reviewsdata'] = $this->requests_model->getAllReviews($memcode);
		$this->data['search'] = 1;
		$this->data['user_image'] = $this->data['reviewsdata'][0] ? $this->data['reviewsdata'][0]->user_image : "";
		$this->data['stars1'] = 0;		
		$this->data['stars2'] = 0;
		$this->data['stars3'] = 0;
		$this->data['stars4'] = 0;
		$this->data['stars5'] = 0;

		if($this->data['reviewsdata']){
			foreach($this->data['reviewsdata'] as $reviewsdata){
				if($reviewsdata->rating==1){
					$this->data['stars1'] = $this->data['stars1'] + 1;
				}
				if($reviewsdata->rating==2){
					$this->data['stars2'] = $this->data['stars2'] + 1;
				}
				if($reviewsdata->rating==3){
					$this->data['stars3'] = $this->data['stars3'] + 1;
				}
				if($reviewsdata->rating==4){
					$this->data['stars4'] = $this->data['stars4'] + 1;
				}
				if($reviewsdata->rating==5){
					$this->data['stars5'] = $this->data['stars5'] + 1;
				}
				
			}
		}

		$this->data['mcode'] =$memcode;
		// $this->varaha->print_arrays($this->data['reviewsdata']);	
		$this->page_construct('reviews',$this->data);
	}

	public function writereview($reqId,$prevId){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{					
			$this->data['headtitle'] = "Reviews";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['reqrow'] = $this->requests_model->getRequestDetails($reqId);
			$this->data['prorow'] = $this->users_model->getEditData($prevId,'tbl_user_details','tbl_user_id');
			$this->data['requesterrow'] = $this->users_model->getEditData($this->data['reqrow']->created_by, 'tbl_user_details','tbl_user_id');
			
			$this->data['dashboard'] = "Request Details(ID- ".$this->data['reqrow']->request_seq_code.")";	
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = 'active';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';				
			$this->data['reqId'] = $reqId;				
			$this->data['prevId'] = $prevId;				
			// $this->varaha->print_arrays($this->data['reqrow'], $this->data['prorow'], $this->data['requesterrow']);
			$this->page_construct('writereview',$this->data);
				
		}
	}

	public function create(){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('');
		}else{	
			
			$rating1 = (isset($_POST['rating1']) ? $_POST['rating1'] :"");
			$rating2 = (isset($_POST['rating2'])  ? $_POST['rating2'] :"");
			$rating3 = (isset($_POST['rating3']) ? $_POST['rating3'] :"");
			$rating4 = (isset($_POST['rating4']) ? $_POST['rating4'] :"");
			$rating5 = (isset($_POST['rating5']) ? $_POST['rating5'] :"");

			if($rating1){
				$rating =5;
			}else if($rating2){
				$rating =4;
			}else if($rating3){
				$rating =3;
			}else if($rating4){
				$rating =2;
			}else if($rating5){
				$rating =1;
			}

			$mdata = array(
				'reqId' => $_POST['reqId'],
				'provId' => $_POST['prevId'],
				'requesterId' => $_POST['reqesterId'],
				'description' => $_POST['review_desc'],				
				'rating' => $rating,
				'created_by' => $this->session->userdata('userid')
			);
			$res = $this->requests_model->createReview($mdata);
			if($res){
				
				$this->session->set_flashdata('message', "Review Created Successfully"); 
				
				redirect('requestcenter/request');
			}else{
				$this->session->set_flashdata('error', "Sorry! There is problem with Review Creation.");
				redirect('reviews/writereview/'.$_POST['reqId'].'/'.$_POST['prevId']);
			}
			
		}
	}
}

