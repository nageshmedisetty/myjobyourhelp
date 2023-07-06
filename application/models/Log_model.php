<?php
class Log_model extends CI_Model
{
	var $table = 'tbl_logs';
	var $column_order = array(null, 'tbl_log_table_auto_id', 'tbl_log_table_name', 'tbl_log_previous_data', 'tbl_log_modified_data', 'tbl_log_created_by', 'tbl_log_created_time'); //set column field database for datatable orderable
	var $column_search = array('tbl_log_table_auto_id', 'tbl_log_table_name', 'tbl_log_previous_data', 'tbl_log_modified_data', 'tbl_log_created_by', 'tbl_log_created_time'); //set column field database for datatable searchable 
	var $order = array('tbl_log_id' => 'asc'); // default order 

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
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
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
	
	public function getScreenData($id){
		
		$this->db->where('md5(id)', $id);
		$q = $this->db->get('menu');		
		if ($q->num_rows() > 0) {
			return $q->row();
		}else{
			return FALSE;
		}
		
	}
	
	public function fireUserLog($table,$column_id_name,$id,$data){
		$this->db->where($column_id_name,$id);
		$q = $this->db->get($table);
		if($q->num_rows()>0){
			$row = $q->row();
			$data = array(
				'tbl_log_table_auto_id' =>  $id,
				'tbl_log_table_name' =>  $table,
				'tbl_log_previous_data' =>  json_encode($row),
				'tbl_log_modified_data' =>  json_encode($data),
				'tbl_log_created_by' =>  $this->session->userdata('userid'),
				);			
			$this->db->insert($this->table,$data);
		}
		
	}

	public function fireUserLogStatusUpdate($table,$column_id_name,$id,$data){
		$this->db->where($column_id_name,$id);
		$q = $this->db->get($table);
		if($q->num_rows()>0){
			$row = $q->row();
			$data = array(
				'tbl_log_table_auto_id' =>  $id,
				'tbl_log_table_name' =>  $table,
				'tbl_log_previous_data' =>  json_encode($data),
				'tbl_log_modified_data' =>  json_encode($row),
				'tbl_log_created_by' =>  $this->session->userdata('userid'),
				);			
			$this->db->insert($this->table,$data);
		}
		
	}

	public function fireUserLog_New($log,$menuid){
		
		$this->db->where('id',$menuid);
		$q=$this->db->get('menu');
		if($q->num_rows()>0){
			$menu = $q->row();
		}
		
		
		$date = date('Y-m-d H:i:s',time());
		$ip_address = $this->_prepare_ip($this->input->ip_address());
		$data = array(
				'screenid' =>  $menu->id,
				'screen' =>  $menu->name,
				'message' =>  $menu->name.' '.$log,
				'ip' =>  $ip_address,
				'logby' =>  $this->session->userdata('userid'),
				'user' =>  $this->session->userdata('uname'),
				'date' =>  $date				
				);			
		$this->db->insert($this->table,$data);
	}
	
	protected function _prepare_ip($ip_address)
    {
        if ($this->db->platform() === 'postgre' || $this->db->platform() === 'sqlsrv' || $this->db->platform() === 'mssql' || $this->db->platform() === 'mysqli' || $this->db->platform() === 'mysql') {
            return $ip_address;
        } else {
            return inet_pton($ip_address);
        }
    }
	
	public function fireLogTimesheetInsert($data){
		
		if($data){
		
			if($this->db->insert('timesheet_log_history',$data)){
				
				return $this->db->insert_id();
			}
		}
	}
	
	
	
	public function fireLogTimesheetInsertUpdate($id,$data){
	
		if($data){
			$this->db->where('id', $id);
			if($this->db->update('timesheet_log_history',$data)){
				return true;
			}
		}
	}
	
	public function fireLogImportingData($messge,$uploadFileName,$file_url){
		$data = array(
			'date' => date('Y-m-d',time()),
			'user' => $this->session->userdata('userid'),
			'messge' => $messge,
			'uploadFileName' => $uploadFileName,
			'file_url' => $file_url,
			'created_on' => date('Y-m-d H:i:s',time()),			
		);
		if($data){
		
			if($this->db->insert('importlog',$data)){
				
				return $this->db->insert_id();
			}
		}
	}
	
	
}
?>