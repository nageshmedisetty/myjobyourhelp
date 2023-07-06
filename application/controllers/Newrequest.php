<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newrequest extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('newrequest_model');
		$this->load->model('requests_model');
    }
	
	public function index(){
		
		// if($this->session->userdata('userid')==''){
		// 	$this->data['headtitle'] = "LogIn";
		// 	// $this->load->view('authentication/login',$this->data);
		// 	redirect('login');
		// }else{					
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
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('newreqiest',$this->data);
				
		//}
	        
	}
	

	public function ajax_list(){
		$list = $this->newrequest_model->get_datatables();
		// $this->varaha->print_arrays($list);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $loc) {
			// $status= $this->newrequest_model->getStatusDit($loc->status);
			$status= $this->requests_model->getStatusDit($loc->tbl_request_id,null);
			
			$no++;
			$action ='';
			$row = array();
			$row[] = $no;
			$row[] = $loc->created_date;
			$row[] = $loc->request_seq_code;
			$row[] = $this->newrequest_model->getRequesterId($loc->created_by);
			$row[] = strlen($loc->request_brief_description) > 50 ? substr($loc->request_brief_description,0,50)."..." : $loc->request_brief_description;
			// $row[] = '<span class="'.$status->class.'">'.$status->name.'</span>';
			if($status){
				if($status->status_id==2){
					$row[] = '<td><span class="badge badge-pill bg-danger-light">Close</span></td>';
				}else{
					$row[] = '<td><span class="badge badge-pill bg-success-light">Open</span></td>';
				}
			}else{
				$row[] = '<td><span class="badge badge-pill bg-success-light">Open</span></td>';
			}
			
			$action .='<a href="'.base_url('newrequest/requestdetails/'.$loc->tbl_request_id).'" style="cursor:pointer;"  class="btn btn-sm bg-info-light">
						<i class="far fa-eye"></i> View Request <span style="color:black;">& </span> Respond
					</a>';		
			// $action .=' <a class="danger" href="javascript:deleter('.$loc->id.')">
			// 			<i class="fa fa-trash"></i>
			// 		</a>';
			
			$row[] ='<div class="text-right">'.$action.'</div>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->newrequest_model->count_all(),
						"recordsFiltered" => $this->newrequest_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function requestdetails($id){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "Request Details";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Request Details";	
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
			$this->data['helpprovider_side'] = 'active';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';				
			$this->data['reqId'] = $id;
			$this->data['row'] = $this->newrequest_model->getRequestDetails($id);
			$this->data['applay'] = $this->newrequest_model->getRequestApplayDetails($id);
			$this->data['status']= $this->requests_model->getStatusDit($id,null);
			// $this->varaha->print_arrays($this->data['applay']);
			$this->page_construct('requestdetails',$this->data);
				
		}
	}

	public function viewprofile($provId, $reqId){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "Provider Details";	
			$this->data['sidepanel'] = 0;
			$this->data['home'] = "Home";
			$this->data['dashboard'] = "Provider Details";				
			$this->data['provId'] = $provId;				
			$this->data['reqId'] = $reqId;				
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
			$this->data['helpprovider_side'] = 'active';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';	
			$this->data['row'] = $this->newrequest_model->getProviderDitByCode($provId,$reqId);
			$this->data['approvdata'] = $this->requests_model->getApprovedData($reqId,$provId);
			$this->data['reviewsdata'] = $this->requests_model->getAllReviewsByProvId($provId);
			// $this->data['user_image'] = $this->data['reviewsdata'][0]->user_image;
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
			// $this->varaha->print_arrays($this->data['reviewsdata']);
			$this->page_construct('providerdetails',$this->data);
				
		}
	}

	public function intrestrequest($reqId){

		if($this->newrequest_model->intrestrequest($reqId)){
			echo true;
		}
		echo false;

	}

	public function approverequest(){
		$reqId = $_POST['reqId'];
		$provId = $_POST['provId'];
		$type = $_POST['type'];
		$value = $_POST['value'];
		if($this->newrequest_model->approverequest($reqId, $provId, $type, $value)){
			echo true;
		}else{
			echo false;
		}
	}

	public function approverequestupdate($reqId, $provId, $type, $value){
		if($this->newrequest_model->approverequest($reqId, $provId, $type, $value)){
			redirect('requestcenter/contactinfo');
		}
	}
}

