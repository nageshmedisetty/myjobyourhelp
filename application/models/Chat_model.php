<?php
class Chat_model extends CI_Model
{
	 

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database(trim($this->session->userdata('companydb')),TRUE);
		$this->load->database();
	}

	
	
	
	
	public function fireLogTimesheetInsertUpdate($id,$data){
	
		if($data){
			$this->db->where('id', $id);
			if($this->db->update('timesheet_log_history',$data)){
				return true;
			}
		}
	}

	
	public function getAllusers(){

		$this->db->where('tbl_user_id !=',$this->session->userdata('userid'));
		$this->db->where('is_active',1);		
		$this->db->select('tbl_user_id, tbl_technologies');		
		$q = $this->db->get('tbl_user_details');
		// return $this->db->last_query();
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$row->userId = $this->session->userdata('userid');
				$row->reciverId = $row->tbl_user_id;
				$row->sender = $this->getFullName($this->session->userdata('userid'));
				$row->reciver = $this->getFullName($row->tbl_user_id);
				$row->message = $row->tbl_technologies;
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function getAllusersSearch($query){

		$this->db->where('tbl_user_id !=',$this->session->userdata('userid'));
		$this->db->where('is_active',1);		
		$this->db->where("(tbl_user_code LIKE '%".$query."%' OR CONCAT(`tbl_user_first_name`,`tbl_user_last_name`) LIKE '%".$query."%')");		
		$this->db->select('tbl_user_id, tbl_technologies');		
		$q = $this->db->get('tbl_user_details');
		// return $this->db->last_query();
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$row->userId = $this->session->userdata('userid');
				$row->reciverId = $row->tbl_user_id;
				$row->sender = $this->getFullName($this->session->userdata('userid'));
				$row->reciver = $this->getFullName($row->tbl_user_id);
				$row->message = $row->tbl_technologies;
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	
	public function getPreviousChat(){
		$this->db->where('userId',$this->session->userdata('userid'));
		$this->db->where('status',1);
		// $this->db->where("id IN ( SELECT MAX(id) FROM chat GROUP BY reciverId )");
		$this->db->group_by('reciverId');
		$q = $this->db->get('chat');
		// return $this->db->last_query();
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$row->sender = $this->getFullName($row->userId);
				$row->reciver = $this->getFullName($row->reciverId);
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}

	public function getFullName($id){
		$this->db->where('tbl_user_id',$id);
		$qc = $this->db->get('tbl_user_details');
		if($qc->num_rows()>0){
			return $qc->row()->tbl_user_first_name.' '.$qc->row()->tbl_user_last_name;
		}
		return false;
	}

	public function getWindowChat($id){
		if($id){
			$userId = $this->session->userdata('userid');
			$this->db->where("(userId = $userId AND reciverId = $id) OR (userId= $id AND reciverId=$userId)");
			$this->db->where('status',1);
			$q = $this->db->get('chat');
			if($q->num_rows()>0){
				foreach($q->result() as $row){
					$row->sender = $this->getFullName($row->userId);
					$row->reciver = $this->getFullName($row->reciverId);
					$row->time = $this->varaha->facebook_time_ago($row->datetime);
					$this->db->where('reciverId',$userId);
					$this->db->update('chat', array('read_msg'=>1));
					$data[] = $row;
				}
				return $data;
			}
		}
		
		return FALSE;
	}
	public function insertChat($data){
		if($this->db->insert('chat',$data)){
			return true;
		}
		return false;
	}
}
?>