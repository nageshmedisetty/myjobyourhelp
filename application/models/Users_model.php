<?php
class Users_model extends CI_Model
{
	var $table = 'tbl_user_details';	
	var $column_order = array(null, 'name','username', 'password'); //set column field database for datatable orderable
	var $column_search = array('name','username', 'password'); //set column field database for datatable searchable 
	var $order = array('tbl_user_id' => 'desc'); // default order 
	
	public function __construct()
	{
		
		$this->load->database();
		
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);
		if($_POST['search']['value']){
			$i = 0;
			foreach ($this->column_search as $item){
				if($i===0){	
					$this->db->like('status',1);
					$this->db->like($item, $_POST['search']['value']);
					if($this->session->userdata('userid')!=1){
						$this->db->where('id',$this->session->userdata('userid'));
					}
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('status',1);
					if($this->session->userdata('userid')!=1){
						$this->db->where('id',$this->session->userdata('userid'));
					}
				}	
			$i++;
			}
		}
		if($this->session->userdata('userid')!=1){
			$this->db->where('id',$this->session->userdata('userid'));
		}
		$this->db->where('status',1);
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($this->session->userdata('userid')!=1){
			$this->db->where('id',$this->session->userdata('userid'));
		}
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		if($this->session->userdata('userid')!=1){
			$this->db->where('id',$this->session->userdata('userid'));
		}
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{	
		if($this->session->userdata('userid')!=1){
			$this->db->where('id',$this->session->userdata('userid'));
		}
		$this->db->from($this->table);		
		return $this->db->count_all_results();
	}

	public function login($username,$password){
		$this->db->where('tbl_user_user_name',$username);
		$this->db->where('is_active',1);
		$qv = $this->db->get($this->table);
		// $this->varaha->print_arrays($this->db->last_query());
		if($qv->num_rows()>0){
			$this->db->where('tbl_user_user_name',$username);
			$q = $this->db->get($this->table);
			if($q->num_rows()>0){
				$pass = md5($password);
				$this->db->where('tbl_user_user_name',$username);
				$this->db->where('tbl_user_password',$pass);
				$qs = $this->db->get($this->table);
				if($qs->num_rows()>0){
					$row = $qs->row();
					$data = array('userid'=> $row->tbl_user_id ,
						'tbl_user_first_name'=> $row->tbl_user_first_name,
						'tbl_user_last_name' => $row->tbl_user_last_name,
						'tbl_user_user_name'=> $row->tbl_user_user_name,
						'tbl_user_email'=> $row->tbl_user_email,	
						'tbl_user_whatapp_no' => $row->tbl_user_whatapp_no,
						'tbl_technologies' => $row->tbl_technologies,
						'tbl_user_provider' => $row->tbl_user_provider,
						'user_image' => $row->user_image,
						'tbl_user_moble' => $row->tbl_user_moble

					);
					
					$this->session->set_userdata($data);
					return 1;
				}else{
					return 3;
				}
			}else{
				return 2;
			}
			
		}
		return 5;
	}

	public function register($data){
		if($data){
			$this->db->where('tbl_user_moble',$data['tbl_user_moble']);
			$q = $this->db->get($this->table);
			// $this->varaha->print_arrays($q->row());
			if($q->num_rows()>0){
				return 3;
			}else{		
				$this->db->where('tbl_user_user_name',$data['tbl_user_user_name']);
				$q = $this->db->get($this->table);
				if($q->num_rows()>0){
					return 4;
				}else{		
					$this->db->where('tbl_user_email',$data['tbl_user_email']);
					$q = $this->db->get($this->table);
					if($q->num_rows()>0){
						return 5;
					}else{	
						if($this->db->insert($this->table,$data)){
							$insertId = $this->db->insert_id();
							if($insertId){
								$code = $this->varaha_model->getCode('tbl_user_details',$insertId,'tbl_user_id','MJYH');
								$this->db->where('tbl_user_id',$insertId);
								if($this->db->update('tbl_user_details', array('created_by' => $insertId, 'tbl_user_code' => $code))){
									$this->db->where('tbl_user_id',$insertId);
									$q = $this->db->get($this->table);
									if($q->num_rows()>0){
										$row = $q->row();
										if($row){
											// $data = array('userid'=> $row->tbl_user_id,
											// 				'tbl_user_first_name'=> $row->tbl_user_first_name,
											// 				'tbl_user_last_name' => $row->tbl_user_last_name,
											// 				'tbl_user_user_name'=> $row->tbl_user_user_name,
											// 				'tbl_user_email'=> $row->tbl_user_email,	
											// 				'tbl_user_whatapp_no' => $row->tbl_user_whatapp_no,
											// 				'tbl_technologies' => $row->tbl_technologies,
											// 				'tbl_user_provider' => $row->tbl_user_provider,
											// 				'user_image' => $row->user_image,
											// 				'tbl_user_moble' => $row->tbl_user_moble
											// 			);
											// 			$this->session->set_userdata($data);
											$body = '<html>
											<body>
												<div><h2>Confirm your email address</h2>/div>
												<div><h4>Dear '.$row->tbl_user_first_name.' '.$row->tbl_user_last_name.',</h4>
												<div><p>To finish signing up for your MY JOB YOUR HELP account, you must click the link below and enter your password to confirm your email address.</p></div>
												<div><a type="Link" style="text-decoration:none" href="'.base_url('welcome/confirm/'.md5($row->tbl_user_id)).'" target="_blank" >Click to activate your account&nbsp;</a></div>
											</body>
					
											</html>';
											$ToEmail = $row->tbl_user_email;
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
											$mail->setFrom('nagesh.vb2028@gmail.com', 'Account Activation - MYJOB');
											$mail->addAddress($ToEmail, $ToName);
											// $mail->addCC($email);
											// $mail->addBCC('snehadeep@spiolabs.com','anjum@spiolabs.com','kiran@spiolabs.com','saikrishna@spiolabs');
											// $mail->addReplyTo("contact@spiolabs.com", $ToName);
											//;;
											
											$mail->Subject = "Account Activation  - From Myjobyourhelp";
											
											
											$mail->msgHTML($body);
											if (!$mail->send()) {
												$msg =  'Mailer Error: ' . $mail->ErrorInfo;
												return 9;
											} else {
												return 10;
											}										

										}
									}
									return 1;
								}
								
							}
						}else{
							return 2;
						}
					}
				}
			}
		}
	}

	public function logout(){
		
		$data = array('userid'=> "",
						'tbl_user_first_name'=> "",
						'tbl_user_last_name' => "",
						'tbl_user_user_name'=> "",
						'tbl_user_email'=> "",	
						'tbl_user_whatapp_no' =>"",
						'tbl_technologies' => "",
						'tbl_user_provider' => "",
						'user_image' => "",
						'tbl_user_moble' => ""
					);
		
		$this->session->set_userdata($data);
		$this->session->sess_destroy();	
		session_start();
		session_destroy();
		return true;
	}

	public function getRequestImages($id){
		$this->db->where('request_id',$id);
		$q = $this->db->get('tbl_request_images');
		if($q->num_rows()>0){	
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getEditData($value,$table,$column){
	
		$this->db->where($column,$value);
		$q = $this->db->get($table);
		if($q->num_rows()>0){	
			if($table=='tbl_requests'){
				$q->row()->images = $this->getRequestImages($q->row()->tbl_request_id);
				return $q->row();
			}else{
				return $q->row();
			}	
			
		}

		return FALSE;
	}
	public function getEditDataUserData($value,$table,$column){
	
		$this->db->where($column,$value);
		$q = $this->db->get($table);
		if($q->num_rows()>0){	
			// $q->row()->techs = $this->getTechnologies($q->row()->tbl_user_id);		
			return $q->row();
		}
		return FALSE;
	}

	public function updateUserProfile($userId,$data){
		$this->db->where('tbl_user_id',$userId);
		if($this->db->update('tbl_user_details',$data)){
			return true;
		}
		return false;
	}
	// public function getTechnologies($userId){
	// 	$this->db->where('tbl_user_id', $userId);
	// 	$q = $this->db->get('tbl_user_technologies');
	// 	if($q->num_rows()>0){
	// 		$names = "";
	// 		$i=0;
	// 		foreach($q->result() as $row){
	// 			$data[] = $row;
	// 			if($i==0){
	// 				$names = $row->user_tech_name;
	// 			}else{
	// 				$names = $names.','.$row->user_tech_name;
	// 			}
	// 			$i++;
	// 		}
	// 		return $names;
	// 	}
	// 	return false;
	// }
	public function getAllCountery(){
		$this->db->where('is_active', 1);
		$q = $this->db->get('tbl_countrys');
		if($q->num_rows()>0){			
			foreach($q->result() as $row){
				$data[] = $row;				
			}
			return $data;
		}
		return false;
	}

	public function updatePassword($row){
		$randomNum=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&abcdefghijklmnopqrstvwxyz"), 0, 8);
		$this->db->where('tbl_user_id ',$row->tbl_user_id );
		if($this->db->update('tbl_user_details',array('tbl_user_password' => md5($randomNum)))){
			return $randomNum;
		}		
	}
	
	// public function getDashBoardData(){

	// 	$new_customers = $this->getNewCostomers(1);
	// 	$all_customers = $this->getNewCostomers(0);
	// 	$repeat_customers = $this->getRepeetCostomers();
	// 	$data= array(
	// 		"allcostomers" => $all_customers,
	// 		"newcostomers" => $new_customers,
	// 		'repeatcustomers' => $repeat_customers,
	// 	);

	// 	return $data;
	// }

	public function checkOldPass($pass){
		$this->db->where('tbl_user_id', $this->session->userdata('userid'));
		$this->db->where('tbl_user_password', md5($pass));
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			return true;
		}
		return false;
	}

	public function changenewpassword($oldpass,$newpass){
		$this->db->where('tbl_user_id', $this->session->userdata('userid'));
		$this->db->where('tbl_user_password', md5($oldpass));
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			if($this->db->update('tbl_user_details',array('tbl_user_password' => md5($newpass)))){
				return true;
			}	
		}
		return false;
	}
	
	
	public function getNewCostomers($type){
		$today = date('Y-m-d',time());
		$first = date('Y-m-d', strtotime(' -10 day'));
		if($type==1){
			$this->db->where("tbl_wifi_user_created_time BETWEEN '".$first."' AND '".$today."'");
		}	
		$this->db->select('count(*) as total');
		$q = $this->db->get('tbl_wifi_users');
		// $this->varaha->print_arrays($this->db->last_query());
		if($q->num_rows()>0){
			return $q->row()->total;
		}
	}

	public function getRepeetCostomers(){
		$repeet = 0;
		$q = $this->db->get('tbl_wifi_users');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$this->db->where('tbl_wifi_user_id',$row->tbl_wifi_user_id);
				$qs = $this->db->get('tbl_wifi_user_access_policy');
				if($qs->num_rows()>1){
					$repeet = $repeet + 1;
				}
			}
		}
		return $repeet;
	}
	
	public function getAllHelpProviders($limit){
		$this->db->order_by("tbl_user_id","DESC");
		$this->db->where('tbl_user_provider',1);
		$this->db->where('tbl_user_id !=',$this->session->userdata('userid'));
		$this->db->limit($limit);
		$q = $this->db->get($this->table);
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$row->star1 = $this->getStarCount(1,$row->tbl_user_id);
				$row->star2 = $this->getStarCount(2,$row->tbl_user_id);
				$row->star3 = $this->getStarCount(3,$row->tbl_user_id);
				$row->star4 = $this->getStarCount(4,$row->tbl_user_id);
				$row->star5 = $this->getStarCount(5,$row->tbl_user_id);
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function getStarCount($state,$pId){
			$starcount=0;
			$this->db->where('provId',$pId);
			$q = $this->db->get('tbl_reviews');
			if($q->num_rows()>0){
				foreach($q->result() as $row){
					if($row->rating==$state){
						$starcount=$starcount + 1;
					}
				}
				return $starcount;
			}
			return $starcount;
	}
	public function confirmaccount($id){
		$this->db->where('md5(tbl_user_id)', $id);
		if($this->db->update('tbl_user_details', array('is_active'=>1))){
			return true;
		}
	}
	public function getDashboardData(){

	}

	public function getTotalHelpRequests(){
		$tbl_requests = 0;
		$this->db->where('is_active',1);
		$q = $this->db->get('tbl_requests');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$tbl_requests = $tbl_requests + 1;
			}
			return $tbl_requests;
		}
		return 0;
	}

	public function getTotalHelpProviders(){
		$providers = 0;
		$this->db->where('tbl_user_provider',1);
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$providers = $providers + 1;
			}
			return $providers;
		}
		return 0;
	}
	public function getTotalHelpRequesters(){
		$providers = 0;
		$this->db->where("tbl_user_provider !=1");
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$providers = $providers + 1;
			}
			return $providers;
		}
		return 0;
	}
	public function getDashData($user){
		$openhelp=0;
		$servedhelp=0;

		$this->db->where('providerId',$user);
		$this->db->where('status', 1);
		$q = $this->db->get('tbl_request_providers');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				if($row->status==1){
					$openhelp = $openhelp + 1;
				}				
			}			
			
		}


		$this->db->where('provId',$user);
		$this->db->where('status', 2);
		$q = $this->db->get('tbl_request_approvels');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				if($row->status==2){
					$servedhelp = $servedhelp + 1;
				}
			}
		}
		$data=array('openhelp'=>$openhelp,'servedhelp'=>$servedhelp);
		return $data;
	}
	
}
?>