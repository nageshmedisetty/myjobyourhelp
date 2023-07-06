<?php
class Newrequest_model extends CI_Model
{
	var $table = 'tbl_requests';
	var $column_order = array(null, 'request_seq_code'); //set column field database for datatable orderable
	var $column_search = array('request_seq_code'); //set column field database for datatable searchable 
	var $order = array('tbl_request_id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database(trim($this->session->userdata('companydb')),TRUE);
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		
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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['status']){
			$this->db->where('status',$_POST['status']);
		}
		// $this->db->where('created_by',$this->session->userdata('userid'));
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		// $this->varaha->print_arrays($this->db->last_query());
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function create($data, $dataimage=array(), $id){
		if($id){
			if($data){
				$this->db->where('tbl_request_id',$id);
				if($this->db->update($this->table, $data)){
					$id = $this->db->insert_id();
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
					}
	
				}
			}
		}
		return true;
		
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
			return $q->row();
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

	public function getStatusDit($id){
		$this->db->where("status_id",$id);
		$q = $this->db->get("tbl_status");
		if($q->num_rows()>0){
			return $q->row();
		}
		return FALSE;
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

	public function getProviderDitByCode($provId, $reqId){
		
		$row = $this->getRequestDetails($reqId);
		$this->db->where('tbl_user_id', $provId);
		$q = $this->db->get('tbl_user_details');
		if($q->num_rows()>0){
			$row->user = $q->row();
			return $row;
		}
		return FALSE;
	}

	public function getRequestApplayDetails($id){
		$this->db->where("requestId",$id);
		$this->db->where("providerId",$this->session->userdata('userid'));
		$q = $this->db->get('tbl_request_providers');
		if($q->num_rows()>0){
			return $q->row();
		}
		return FALSE;
	}

	public function intrestrequest($reqId){

		$data=array(
			'requestId' => $reqId,
			'providerId' => $this->session->userdata('userid'),
		);

		if($data){
			if($this->db->insert('tbl_request_providers',$data)){
				return true;
			}
		}
		return false;
	}

	public function approverequest($reqId, $provId, $type, $value){
		if($type==1){
			$column = 'phone';
		}else if($type==2){
			$column = 'email';
		}else if($type==2){
			$column = 'email';
		}else if($type==3){
			$column = 'whatsapp';
		}else if($type==3){
			$column = 'chat';
		}
		$this->db->where('reqId', $reqId);
		$this->db->where('provId', $provId);
		$q = $this->db->get('tbl_request_approvels');
		if($q->num_rows()>0){

			if($this->db->update('tbl_request_approvels',array($column=>$value))){
				return true;
			}

		}else{
			
			$data= array(
				'reqId' => $reqId,
				'provId' => $provId,
				$column => $value,
			);
			if($this->db->insert('tbl_request_approvels',$data)){
				return true;
			}
		}
		return false;
	}
}
?>