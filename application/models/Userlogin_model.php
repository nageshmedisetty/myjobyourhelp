<?php
class Userlogin_model extends CI_Model
{
	var $table = 'tbl_user_details';	
	var $column_order = array(null, 'name','username', 'password'); //set column field database for datatable orderable
	var $column_search = array('name','username', 'password'); //set column field database for datatable searchable 
	var $order = array('userId' => 'desc'); // default order 
	
	public function __construct()
	{
		
		$this->load->database();
		
	}

	// private function _get_datatables_query()
	// {
	// 	$this->db->from($this->table);
	// 	if($_POST['search']['value']){
	// 		$i = 0;
	// 		foreach ($this->column_search as $item){
	// 			if($i===0){	
	// 				$this->db->like('status',1);
	// 				$this->db->like($item, $_POST['search']['value']);
	// 				if($this->session->userdata('userid')!=1){
	// 					$this->db->where('id',$this->session->userdata('userid'));
	// 				}
	// 			}else{
	// 				$this->db->or_like($item, $_POST['search']['value']);
	// 				$this->db->like('status',1);
	// 				if($this->session->userdata('userid')!=1){
	// 					$this->db->where('id',$this->session->userdata('userid'));
	// 				}
	// 			}	
	// 		$i++;
	// 		}
	// 	}
	// 	if($this->session->userdata('userid')!=1){
	// 		$this->db->where('id',$this->session->userdata('userid'));
	// 	}
	// 	$this->db->where('status',1);
	// 	if(isset($_POST['order'])) // here order processing
	// 	{
	// 		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	// 	} 
	// 	else if(isset($this->order))
	// 	{
	// 		$order = $this->order;
	// 		$this->db->order_by(key($order), $order[key($order)]);
	// 	}
	// }

	// function get_datatables()
	// {
	// 	$this->_get_datatables_query();
	// 	if($this->session->userdata('userid')!=1){
	// 		$this->db->where('id',$this->session->userdata('userid'));
	// 	}
	// 	if($_POST['length'] != -1)
	// 	$this->db->limit($_POST['length'], $_POST['start']);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function count_filtered()
	// {
	// 	$this->_get_datatables_query();
	// 	if($this->session->userdata('userid')!=1){
	// 		$this->db->where('id',$this->session->userdata('userid'));
	// 	}
	// 	$this->db->where('status',1);
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }

	// public function count_all()
	// {	
	// 	if($this->session->userdata('userid')!=1){
	// 		$this->db->where('id',$this->session->userdata('userid'));
	// 	}
	// 	$this->db->from($this->table);		
	// 	return $this->db->count_all_results();
	// }

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
					$q = $this->db->get($this->table);
					if($q->num_rows()>0){
						$row = $q->row();		
						$data = array('userid'=> $row->tbl_user_id,'tbl_user_first_name'=> $row->tbl_user_first_name,'tbl_user_last_name'=> $row->tbl_user_last_name,'tbl_user_email'=> $row->tbl_user_email,'tbl_user_user_name'=> $row->tbl_user_user_name,'tbl_user_moble'=> $row->tbl_user_moble,'tbl_user_cuountry_code'=> $row->tbl_user_cuountry_code,'tbl_user_provider'=> $row->tbl_user_provider,'user_image'=> $row->user_image);
						$this->session->set_userdata($data);		
						return 1;
					}else{
						return 3;
					}
				
			}
			return 2;
		}
		return 5;
	}

	// public function register($data,$companyname){
	// 	if($data){
	// 		$this->db->where('tbl_user_login_username',$data['tbl_user_login_username']);
	// 		$q = $this->db->get($this->table);
	// 		if($q->num_rows()>0){
	// 			return 3;
	// 		}else{		
	// 			if($this->db->insert($this->table,$data)){
	// 				$insertId = $this->db->insert_id();
	// 				$institue_data= array(
	// 					'tbl_institution_name' => $companyname, 
	// 					'tbl_institution_is_active' => 1, 
	// 					'tbl_institution_created_by' => $insertId, 
	// 				);
	// 				if($this->db->insert('tbl_institution_master',$institue_data)){
	// 					$institue_id = $this->db->insert_id();
	// 					$this->db->where('userId',$insertId);
	// 					$this->db->update($this->table, array('tbl_institution_master_id'=> $institue_id, 'tbl_user_createdby' => $insertId));
	// 					$branch_data = array(
	// 						'tbl_institution_branch_name' => 'Main Branch',
	// 						'tbl_institution_branch_createdby' => $insertId,
	// 						'tbl_institution_master_id' => $institue_id
	// 					);
	// 					if($this->db->insert('tbl_institution_branches',$branch_data)){
	// 						$branch_id = $this->db->insert_id();
	// 						$gateway_data= array(
	// 							'tbl_institution_master_id' => $institue_id,
	// 							'tbl_institution_branch_id' => $branch_id,
	// 							'tbl_institution_gateway_name' => 'Spio',
	// 							'tbl_institution_gateway_location' => 'Default',
	// 							'tbl_institution_gateway_createdby' => $insertId,
	// 						);
	// 						if($this->db->insert('tbl_institution_gateway_details',$gateway_data)){
	// 							$this->db->where('userId',$insertId);
	// 							$q = $this->db->get($this->table);
	// 							if($q->num_rows()>0){
	// 								$row = $q->row();
	// 								$data = array('userid'=> $row->userId,
	// 									'user'=> $row->name,
	// 									'username'=> $row->username,
	// 									'institution_master_id'=> $row->tbl_institution_master_id,	
	// 									'parent_userId' => $row->tbl_parent_userId,
	// 									'user_status_id' => $row->tbl_user_status_id,
	// 									'user_type' => $row->tbl_user_type					
	// 								);
	// 							$this->session->set_userdata($data);
	// 							return 1;
	// 						}else{
	// 							return 6;
	// 						}							
	// 					}else{
	// 						return 5;
	// 					}
	// 				}else{
	// 					return 4;
	// 				}
	// 			}else{
	// 				return 2;
	// 			}
	// 		}
	// 	}
	// 	}
	// 	// $this->varaha->print_arrays("SS");
	// }

	// public function logout(){
		
	// 	$data = array('userId'=> '',
	// 				  'user'=> '',
	// 				  'username'=> '',
	// 				  'institution_master_id'=> '',
	// 				  'parent_userId'=> '',
	// 				  'user_status_id'=> '',
	// 				  'user_type' => '');
	// 	$this->session->set_userdata($data);
	// 	$this->session->sess_destroy();	
	// 	session_start();
	// 	session_destroy();
	// 	return true;
	// }


	// public function getEditData($id,$table){
	
	// 	$this->db->where('id',$id);
	// 	$q = $this->db->get($this->table);
	// 	if($q->num_rows()>0){			
	// 		return $q->row();
	// 	}
	// 	return FALSE;
	// }
	
	
	
	
	
	
	
	
	
	
}
?>