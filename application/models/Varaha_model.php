<?php
class Varaha_model extends CI_Model
{
	
	public function __construct()
	{
		
		$this->load->database();
		
	}
	
	public function getGateways(){
		$this->db->where('tbl_institution_master_id',$this->session->userdata('institution_master_id'));
		$this->db->order_by('tbl_institution_gateway_detail_id','ASC');
		$q = $this->db->get('tbl_institution_gateway_details');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;

	}

	public function getInstitute(){
		
		if($this->session->userdata('user_type')==3){			
		}else if($this->session->userdata('user_type')==4){
		}else{
			$this->db->where('tbl_institution_master_id',$this->session->userdata('institution_master_id'));
		}

		
		$this->db->where('tbl_institution_is_active',1);
		$q = $this->db->get('tbl_institution_master');
		// $this->varaha->print_arrays($this->db->last_query());
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getBranches($institute){
		if($institute){
			$this->db->where('tbl_institution_master_id',$institute);
		}
		$q = $this->db->get('tbl_institution_branches');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getInsBranchGateways($institute, $branch){
		if($institute){
			$this->db->where('tbl_institution_master_id',$institute);
		}
		if($branch){
			$this->db->where('tbl_institution_branch_id',$branch);
		}
		$q = $this->db->get('tbl_institution_gateway_details');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function getStatusData(){
		$this->db->where('tbl_status_is_active',1);
		$q = $this->db->get('tbl_status_master');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getUserAccessPolices(){
		// $this->db->where('tbl_status_is_active',1);
		$q = $this->db->get('tbl_wifi_surfing_polices');
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function getCode($table,$id,$column,$code){
		$this->db->order_by($column,"DESC");
		$this->db->limit(1);
		$q = $this->db->get($table);
		if($q->num_rows()>0){
			$uniId = $q->row()->$column;
		}else{
			$uniId = 1;
		}
		$mcode = $code.sprintf('%06d', $uniId); 
		return $mcode;

	}
}
?>