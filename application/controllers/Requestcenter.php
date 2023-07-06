<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestcenter extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('requests_model');
		$this->load->model('users_model');
    
    }
	
	public function index(){
		
		echo 'No direct script access allowed';
	        
	}

	public function request(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "My Request Center's";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');	
			$this->data['status'] = $this->requests_model->getTableData('tbl_status');	
			$this->data['dashboard'] = "My Request Centers";
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';	
			$this->data['dashboard_side'] = '';
			$this->data['myrequest_side'] = 'active';
			$this->data['myhelp_side'] = '';
			$this->data['approvereq_side'] = '';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';			
			// $this->varaha->print_arrays($this->data['status']);
			$this->page_construct('requests',$this->data);
				
		}
	        
	}

	public function myhelprequest(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "My Help Center's";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');	
			$this->data['status'] = $this->requests_model->getTableData('tbl_status');	
			$this->data['dashboard'] = "My Help Centers";	
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';		
			$this->data['dashboard_side'] = '';
			$this->data['myrequest_side'] = '';
			$this->data['myhelp_side'] = 'active';
			$this->data['approvereq_side'] = '';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';		
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('helpcenters',$this->data);
				
		}
	        
	}
	public function contactinfo(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "Approve Request For Contact Info";	
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');	
			$this->data['status'] = $this->requests_model->getTableData('tbl_status');	
			$this->data['dashboard'] = "Approve Request For Contact Info";
			$this->data['home'] = '';		
			$this->data['newrequest'] = '';	
			$this->data['reviews'] = '';	
			$this->data['howwork'] = '';	
			$this->data['faq'] = '';	
			$this->data['contact'] = '';
			$this->data['dashboard_side'] = '';
			$this->data['myrequest_side'] = '';
			$this->data['myhelp_side'] = '';
			$this->data['approvereq_side'] = 'active';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';	
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('contactinfo',$this->data);
				
		}
	        
	}

	public function helpcontactinfo(){
		
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			// $this->load->view('authentication/login',$this->data);
			redirect('login');
		}else{					
			$this->data['headtitle'] = "Help Provider Contact Info";
			$this->data['sidepanel'] = 1;
			$this->data['home'] = "Home";
			$this->data['row'] = $this->users_model->getEditData($this->session->userdata('userid'),'tbl_user_details','tbl_user_id ');	
			$this->data['status'] = $this->requests_model->getTableData('tbl_status');	
			$this->data['dashboard'] = "Help Provider Contact Info";	
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
			// $this->varaha->print_arrays($this->data['row']);
			$this->page_construct('helpcontactinfo',$this->data);
				
		}
	        
	}

	public function ajax_list($type){
		$list = $this->requests_model->get_datatables($type);
		// $this->varaha->print_arrays($list);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $loc) {
				
				$approvdata = $this->requests_model->getApprovedData($loc->tbl_request_id,$loc->providerId);
				$status= $this->requests_model->getStatusDit($loc->tbl_request_id,$loc->providerId);

				/*	0 => Not Requested,
					1 => Requested => Pending for approvel,
					2 => Approved
				*/
				if($type==3 || $type==4){
					if($approvdata){
						if($approvdata->phone==0){
							$mphone = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
						}else if($approvdata->phone==1){
							if($type==3){
								$mphone = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Approve';
							}else{
								$mphone = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Pending Approval';
							}
							
						}else{
							
							if($loc->providerId == $this->session->userdata('userid')){
								$mphone = ' class="btn btn-sm" style="background-color: #00ff49;cursor:pointer;">Approved';
							}else{
								$provider_phone = $this->requests_model->getProviderDit('tbl_user_details','tbl_user_moble',$loc->providerId);
								$mphone = ' class="btn btn-sm" style="background-color: #f3fbdc;cursor:pointer;">'.$provider_phone;
							}
							
						}
					}else{
						$mphone = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
					}
					
					if($approvdata){
						if($approvdata->whatsapp==0){
							$mwhatsapp = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
						}else if($approvdata->whatsapp==1){
							if($type==3){
								$mwhatsapp = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Approve';
							}else{
								$mwhatsapp = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Pending Approval';
							}
							
						}else{
							if($loc->providerId == $this->session->userdata('userid')){
								$mwhatsapp = ' class="btn btn-sm" style="background-color: #00ff49;cursor:pointer;">Approved';
							}else{
								$provider_whatapp = $this->requests_model->getProviderDit('tbl_user_details','tbl_user_whatapp_no',$loc->created_by);
								$mwhatsapp = ' class="btn btn-sm" style="background-color: #f3fbdc;cursor:pointer;">'.$provider_whatapp;								
							}
						}
					}else{
						$mwhatsapp = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
					}
					if($approvdata){
						if($approvdata->email==0){
							$memail = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
						}else if($approvdata->email==1){
							if($type==3){
								$memail = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Approve';
							}else{
								$memail = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Pending Approval';
							}
						}else{
							if($loc->providerId == $this->session->userdata('userid')){
								$memail = ' class="btn btn-sm" style="background-color: #00ff49;cursor:pointer;">Approved';
							}else{
								$provider_email = $this->requests_model->getProviderDit('tbl_user_details','tbl_user_email',$loc->created_by);
								$memail = ' class="btn btn-sm" style="background-color: #f3fbdc;cursor:pointer;">'.$provider_email;
							}
						}
					}else{
						$memail = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
					}
					if($approvdata){
						if($approvdata->chat==0){
							$mchat = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
						}else if($approvdata->chat==1){
							if($type==3){
								$mchat = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Approve';
							}else{
								$mchat = ' class="btn btn-sm" style="background-color: #10ffe4;cursor:pointer;">Pending Approval';
							}
						}else{
							if($loc->providerId == $this->session->userdata('userid')){
								$mchat = ' class="btn btn-sm" style="background-color: #00ff49;cursor:pointer;">Approved';
							}else{
								$mchat = ' class="btn btn-sm" style="background-color: #f3fbdc;cursor:pointer;">Approved';
							}
						}
					}else{
						$mchat = ' class="btn btn-sm" style="background-color: #ff8181;cursor:pointer;">Not Requested';
					}
	
					$phone_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/1/2').'" '.$mphone.'</a>';
					$whatsapp_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/3/2').'" '.$mwhatsapp.'</a>';
					$email_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/2/2').'"  '.$memail.'</a>';
					$chart_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/4/2').'"  '.$mchat.'</a>';
	
				}
				// if($type==4){

				// 	$phone_request = '';
				// 	$whatsapp_request = '';
				// 	$email_request = '';
				// 	$chart_request = '';

				// 	// $phone_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/1/2').'" '.$mphone.'</a>';
				// 	// $whatsapp_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/3/2').'" '.$mwhatsapp.'</a>';
				// 	// $email_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/2/2').'"  '.$memail.'</a>';
				// 	// $chart_request = '<a href="'.base_url('newrequest/approverequestupdate/'.$loc->tbl_request_id.'/'.$loc->providerId.'/4/2').'"  '.$mchat.'</a>';
				// }
				
			
			$no++;
			$action ='';
			$row = array();
			$row[] = $no;
			$myprovider = $this->requests_model->getRequesterId($loc->providerId);
			// $row[] = $loc->created_date;
			$row[] = $loc->request_seq_code;
			// $row[] = $loc->tbl_user_user_name;
			$row[] = ($myprovider ? $myprovider : ($type==4 ? '<span style="color:#ff0000;">Not Applied</span>' : '<span style="font-weight:bold;color:#0000ff;">Created</span>'));
			if($type==1 || $type==2){
				$row[] = strlen($loc->request_brief_description) > 50 ? substr($loc->request_brief_description,0,50)."..." : $loc->request_brief_description;
				if($status){
					if($status->status_id==7){
						$row[] = '<span class="badge badge-pill bg-info" onClick="updateStatus('.$loc->tbl_request_id.','.$loc->providerId.',8)"  style="cursor:pointer;" >Un Assign</span>';
					}else{
						$row[] = '<span class="'.$status->class.'">'.$status->name.'</span>';
					}
					
				}else{
					$row[] = '<span class="badge badge-pill bg-success-light">Open</span>';
				}
				
			}else{
				$row[] = $phone_request;
				$row[] = $whatsapp_request;
				$row[] = $email_request;
				$row[] = $chart_request;
			}
			
			
			if($type==1){
				if($myprovider){
					$action .='<a href="'.base_url('newrequest/viewprofile/'.$loc->providerId.'/'.$loc->tbl_request_id).'" style="cursor:pointer;"  class="btn btn-sm bg-info-light">
					<i class="far fa-eye"></i> View Profile <span style="color:black;">& </span> Contact
				</a>';	
				$action .='&nbsp;<a href="'.base_url('createrequest/update/'.$loc->tbl_request_id).'" style="cursor:pointer;"  class="btn btn-sm bg-info-light">
							<i class="fa fa-pencil-square-o"></i> Edit
						</a>';
				}else{
					$action .='<a href="'.base_url('createrequest/update/'.$loc->tbl_request_id).'" style="cursor:pointer;"  class="btn btn-sm bg-info-light">
							<i class="far fa-eye"></i> View Request <span style="color:black;">& </span> Update
						</a>';	
				}
				if($approvdata){
					
					if($approvdata->status==7){
						$action .=' <div  class="btn btn-sm" style="background-color: #'.$status->color.';cursor:pointer;">
						'.$status->name.'
					</div>';
					}else{
						if($status->status_id==2){
							$action .=' <a  class="btn btn-sm" style="background-color: #bdbdbc;">Closed</a>';
						}else{
						$action .=' <div onClick="updateStatus('.$loc->tbl_request_id.','.$loc->providerId.','.$approvdata->status.')"  class="btn btn-sm" style="background-color: #'.$status->color.';cursor:pointer;">
						'.$status->name.'
					</div>';
						}
					}
						
					
					// if($approvdata->status==7 || $approvdata->status==8){
					if($approvdata->status!=1 || $approvdata->status!=5 || $approvdata->status!=9){
						$write_review = base_url('reviews/writereview/'.$loc->tbl_request_id.'/'.$loc->providerId);
						$action .=' <a href="'.$write_review.'"  class="btn btn-sm" style="background-color: #bbff06;cursor:pointer;">
								<i class="fa fa-pen"></i>  Write Review 
							</a>';
					}else{
						$write_review ="";
						$action .=' <a  class="btn btn-sm" style="background-color: #bdbdbc;">
								<i class="fa fa-pen"></i>  Write Review 
							</a>';
					}
					if($approvdata->status==7){
						$close = 'onClick="updateStatus('.$loc->tbl_request_id.','.$loc->providerId.',2)';
						$action .='&nbsp;<div onclick="updateStatus('.$loc->tbl_request_id.','.$loc->providerId.',2)" class="btn btn-sm" style="background-color: #bbff06;cursor:pointer;">
							<i class="fa fa-times"></i>  Close
						</div>';
					}else{
						$close ="";
						$action .=' <div '.$close.'  class="btn btn-sm" style="background-color: #bdbdbc;">
							<i class="fa fa-times"></i>  Close
						</div>';
					}

					
				}else{

					$action .=' <a  class="btn btn-sm" style="background-color: #bdbdbc;">
								<i class="fa fa-pen"></i>  Not Response Yet
							</a>';
					$action .=' <a  class="btn btn-sm" style="background-color: #bdbdbc;">
								<i class="fa fa-pen"></i>  Write Review 
							</a>';

					$action .=' <a  class="btn btn-sm" style="background-color: #bdbdbc;">
							<i class="fa fa-times"></i>  Close
						</a>';
				}
			}
			if($type==2){
				$action .='<a href="'.base_url('newrequest/requestdetails/'.$loc->tbl_request_id).'" style="cursor:pointer;"  class="btn btn-sm bg-info-light">
							<i class="far fa-eye"></i> View Request
						</a>';	
						
				

				$action .=' <a href="'.base_url('newrequest/requestdetails/'.$loc->tbl_request_id).'"  class="btn btn-sm" style="background-color: #bdbdbc;cursor:pointer;">
							<i class="fa fa-pen"></i>  Write Review 
						</a>';

				
			}
			
			$row[] ='<div class="text-right">'.$action.'</div>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->requests_model->count_all($type),
						"recordsFiltered" => $this->requests_model->count_filtered($type),
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
			$this->data['dashboard_side'] = 'active';
			$this->data['myrequest_side'] = '';
			$this->data['myhelp_side'] = '';
			$this->data['approvereq_side'] = '';
			$this->data['helpprovider_side'] = '';
			$this->data['chat_side'] = '';
			$this->data['profile_side'] = '';
			$this->data['changepass_side'] = '';	
			// $this->varaha->print_arrays($this->data['row']);
			$this->data['row'] = $this->requests_model->getRequestDetails($id);
			$this->page_construct('requestdetails',$this->data);
				
		}
	}

	public function changestatus(){
		$params = array('reqId' => $_POST['reqId'], 'provId' => $_POST['provId'], 'status' => $_POST['status']);

		$res = $this->requests_model->getUpdateStatus($params);

		echo $res;
	}
}

