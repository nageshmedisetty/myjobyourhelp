<?php
class Requests_model extends CI_Model
{
	var $table = 'tbl_requests';
	var $tableView = 'view_tbl_requests';
	
	var $column_order = array(null, 'request_seq_code'); //set column field database for datatable orderable
	var $column_search = array('request_seq_code'); //set column field database for datatable searchable 
	var $order = array('tbl_request_id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database(trim($this->session->userdata('companydb')),TRUE);
		$this->load->database();
	}

	private function _get_datatables_query($type)
	{
		if($type==1){
			$this->db->from($this->tableView);
		}else{
			$this->db->from($this->tableView);
		}
		
		
		if($_POST['search']['value']){
			$i = 0;
			foreach ($this->column_search as $item){
				if($i===0){	
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}	
			$i++;
			}
		}
		
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

	function get_datatables($type)
	{
		$this->_get_datatables_query($type);
		if($_POST['status']){
			$this->db->where('status',$_POST['status']);
		}		
		// $this->db->where("created_by = ".$this->session->userdata('userid')." OR providerId = ".$this->session->userdata('userid'));		
		if($type==1){
			$this->db->where('created_by',$this->session->userdata('userid'));	
		}else if($type==4){
			$this->db->where('created_by',$this->session->userdata('userid'));
	
		}else{
			$this->db->where('providerId',$this->session->userdata('userid'));	
		}
			
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($type)
	{
		$this->_get_datatables_query($type);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($type)
	{
		if($type==1){
			$this->db->from($this->tableView);
		}else{
			$this->db->from($this->tableView);
		}
		
		return $this->db->count_all_results();
	}
	
	public function create($data, $dataimage=array(), $id=null){
		if($id){
			if($data){
				$this->db->where('tbl_request_id',$id);
				if($this->db->update($this->table, $data)){					
					if($dataimage){
						foreach($dataimage as $img){
							$img['request_id'] = $id;
							$this->db->insert('tbl_request_images', $img);
						}
					}
	
				}
			}
		}else{
			if($data){
				if($this->db->insert($this->table, $data)){
					$insertId = $this->db->insert_id();
					if($dataimage){
						$code = $this->varaha_model->getCode('tbl_requests',$insertId,'tbl_request_id','REQ');
						foreach($dataimage as $img){
							$img['request_id'] = $insertId;
							$this->db->insert('tbl_request_images', $img);
						}
						if($code){
							$this->db->where('tbl_request_id',$insertId);
							$this->db->update($this->table,array('request_seq_code' => $code));
						}
					}else{
						$code = $this->varaha_model->getCode('tbl_requests',$insertId,'tbl_request_id','REQ');
						if($code){
							$this->db->where('tbl_request_id',$insertId);
							$this->db->update($this->table,array('request_seq_code' => $code));
						}
					}
	
				}
			}
		}
		return true;
		
	}

	public function fileDelete($id){
		$this->db->where("request_image_id",$id);
		$q = $this->db->get('tbl_request_images');
		if($q->num_rows()>0){
			$row = $q->row();			
			$filename = 'uploads/'.$row->request_image;
			if(unlink($filename)){
				$this->db->where("request_image_id",$id);
				if($this->db->delete('tbl_request_images')){
					return true;
				}
			}
			return false;			
		}
		return FALSE;
	}

	public function getRequesterId($id){
		$this->db->where("tbl_user_id",$id);
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			$row = $q->row();
			return $row->tbl_user_user_name;
		}
		return FALSE;
	}
	
	public function getRequestDetails($id){
		$this->db->where("tbl_request_id",$id);
		$q = $this->db->get($this->table);
		if($q->num_rows()>0){
			return$q->row();
		}
		return FALSE;
	}

	public function getAllRequests($limit){
		$this->db->order_by("tbl_request_id","DESC");
		$this->db->limit($limit);
		$q = $this->db->get($this->table);
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}

	public function getStatusDit($reqId,$provId){
		$this->db->where("reqId",$reqId);
		if($provId){
			$this->db->where("provId",$provId);
		}		
		$this->db->limit(1);
		$q = $this->db->get("tbl_request_approvels");
		if($q->num_rows()>0){
			$this->db->where("status_id",$q->row()->status);
			$q = $this->db->get("tbl_status");
			if($q->num_rows()>0){
				return $q->row();
			}
			return FALSE;
		}
		return false;
	}

	public function getTableData($table){
		$this->db->where("status",1);
		$q = $this->db->get($table);
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function getProviderDit($table,$column, $providerId){
		$this->db->where("tbl_user_id",$providerId);
		$q = $this->db->get($table);
		if($q->num_rows()>0){
			return $q->row()->$column;
		}
		return FALSE;
	}

	public function getRequestProviders($id){
		$providers = '';
		$this->db->where("requestId",$id);
		$this->db->where("status",1);
		$q = $this->db->get("tbl_request_providers");
		if($q->num_rows()>0){
			$i=0;
			foreach($q->result() as $row){
				$providercode = $this->getProviderDit('tbl_user_details','tbl_user_code',$row->providerId);
				if($i==0){
					$providers = $providercode;
				}else{
					$providers = $providers.','.$providercode;
				}
				
			$i++;
			}
			return $providers;
		}
		return FALSE;
	}

	public function getApprovedData($reqId, $provId){
		$this->db->where("is_active",1);
		$this->db->where("reqId",$reqId);
		$this->db->where("provId",$provId);
		$q = $this->db->get('tbl_request_approvels');
		if($q->num_rows()>0){
			return $q->row();
		}
		return FALSE;
	}
	public function getAllReviewsByProvId($provId){
						
			$this->db->where('created_by',$provId);
			$this->db->where('status',1);
			$q = $this->db->get('tbl_reviews');
	
			if($q->num_rows()>0){
				foreach($q->result() as $row){
					$row->reqCode = $this->getRequestDetails($row->reqId)->request_seq_code;
					$row->provCode = $this->getProviderDit('tbl_user_details','tbl_user_code', $row->provId);
					$row->requesterCode = $this->getProviderDit('tbl_user_details','tbl_user_code', $row->requesterId);
					$row->fname = $this->getProviderDit('tbl_user_details','tbl_user_first_name', $row->created_by);
					$row->lname = $this->getProviderDit('tbl_user_details','tbl_user_last_name', $row->created_by);
					$row->lname = $this->getProviderDit('tbl_user_details','tbl_user_last_name', $row->created_by);
					$row->user_image = $this->getProviderDit('tbl_user_details','user_image', $row->created_by);
					$data[] = $row;
				}
				return $data;
			}
			return null;
		
	}

	

	public function getUpdateStatus($parms){
		if($parms['status']==2){
			$this->db->where("provId",$parms['provId']);
			$q = $this->db->get('tbl_request_approvels');
			if($q->num_rows()>0){
				foreach($q->result() as $row){
					$this->db->where('id',$q->row()->id);
					$this->db->update('tbl_request_approvels',array('status' => 2));
				}
				return true;
			}
		}else{
			$this->db->where("reqId",$parms['reqId']);
			$this->db->where("provId",$parms['provId']);
			$q = $this->db->get('tbl_request_approvels');
			if($q->num_rows()>0){
				if($parms['status']==5){
					$mstatus = 7;
				}else if($parms['status']==8){
					$mstatus = 8;
				}else if($parms['status']==2){
					$mstatus = 2;
				}
				$this->db->where('id',$q->row()->id);
				if($this->db->update('tbl_request_approvels',array('status' => $mstatus))){
					return TRUE;
				}
			}
		}
		
		return FALSE;
	}

	public function createReview($data){
		if($data){
			if($this->db->insert('tbl_reviews',$data)){
				return true;
			}
		}
		return FALSE;
	}

	public function getAllReviews($memcode=null){
		$memId = "";
		if($memcode){
			$this->db->where("tbl_user_code",$memcode);
			$qs = $this->db->get('tbl_user_details');
			if($qs->num_rows()>0){
				$memId =  $qs->row()->tbl_user_id;
				// $this->varaha->print_arrays($memId);
			}
			if($memId){
				$this->db->where('created_by',$memId);
			}
			
		}
		
		$this->db->where('status',1);
		$q = $this->db->get('tbl_reviews');

		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$row->reqCode = $this->getRequestDetails($row->reqId)->request_seq_code;
				$row->provCode = $this->getProviderDit('tbl_user_details','tbl_user_code', $row->provId);
				$row->requesterCode = $this->getProviderDit('tbl_user_details','tbl_user_code', $row->requesterId);
				$row->fname = $this->getProviderDit('tbl_user_details','tbl_user_first_name', $row->created_by);
				$row->lname = $this->getProviderDit('tbl_user_details','tbl_user_last_name', $row->created_by);
				$row->lname = $this->getProviderDit('tbl_user_details','tbl_user_last_name', $row->created_by);
				$row->user_image = $this->getProviderDit('tbl_user_details','user_image', $row->created_by);
				$data[] = $row;
			}
			return $data;
		}
		return null;
	}
}
?>