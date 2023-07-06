<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->library('columns');
		$this->load->model('user_list_report_model');
		$this->load->model('wifi_sessions_list_model');

		
    }
	public function index()
	{
		// $this->varaha->print_arrays($this->session->userdata());
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{		
			$this->data['headtitle'] = "Reports";
			
			// $this->varaha->print_arrays($this->data['gateways']);
			$this->page_construct('reports',$this->data);	
		}
	}
	public function report($repId){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('authentication/login',$this->data);
		}else{
			if($repId==1){
				$this->data['headtitle'] = "Users List Report";
				$this->data['report_title'] = "Users List Report";
			}
			if($repId==2){
				$this->data['headtitle'] = "Wife Sessions List Report";
				$this->data['report_title'] = "Wife Sessions List Report";
			}
			$this->data['tableBorders'] = null;
			$this->data['repId'] = $repId;
			$this->data['from_date'] = date('Y-m-01',time());
			$this->data['to_date'] = date('Y-m-t',time());
			$this->data['controller'] = "reports";
			$this->data['functions'] = "list_ajax";
			$this->data['columns'] = $this->columns->getReportColumns($this->data['repId']);	
			

			$this->page_rep_construct('reports/report',$this->data);
		}
	}

	public function list_ajax(){
			

		if($_POST['repId']==1){
			$sno=null;			
			$list_data = $this->user_list_report_model->get_datatables();
			$list = $list_data;
			$recordsTotal=count($list_data);
			$recordsFiltered=count($list_data);
			
		}
		if($_POST['repId']==2){
			$sno=null;			
			$list_data = $this->wifi_sessions_list_model->get_datatables();			
			$list = $list_data;
			$recordsTotal=count($list_data);
			$recordsFiltered=count($list_data);
			
		}
		$columns = $this->columns->getReportColumns($_POST['repId']);	
		
		$array_keys = array_keys($columns);		
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $loc) {
			$no++;
			$action ='';
			$row = array();
			if($array_keys){
				for($i=0; $i<count($array_keys); $i++){
					if($sno){
						if($i==0){
							$row[] = $no;
						}else{
							$mrowname = $array_keys[$i];
							$row[] = $loc->$mrowname;
						}
					}else{
						$mrowname = $array_keys[$i];
							$row[] =  (isset($loc->$mrowname) ? $loc->$mrowname : "");
					}
					
				}
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $recordsTotal,
						"recordsFiltered" => $recordsFiltered,
						"data" => $data,
				);
		//output to json format
		// $this->varaha->print_arrays($output);
		echo json_encode($output);
	}
	
	public function reporttype(){
		if($this->session->userdata('userid')==''){
			$this->data['headtitle'] = "LogIn";
			$this->load->view('login/signin',$this->data);
		}else{
			$this->data['repId'] = $_POST['repId'];
			if($this->data['repId']==1){
				$this->data['headtitle'] = "Users List Report";
				$this->data['report_title'] = "Users List Report";
			}
			if($this->data['repId']==2){
				$this->data['headtitle'] = "Wife Sessions List Report";
				$this->data['report_title'] = "Wife Sessions List Report";
			}
			$this->data['tableBorders'] = null;			
			$this->data['controller'] = "reports";
			$this->data['functions'] = "list_ajax";			
			$this->data['sno'] = false;
			$this->data['columns'] = $this->columns->getReportColumns($_POST['repId']);	
			$this->data['from_date'] = date('Y-m-d',strtotime($_POST['fromdt']));
			$this->data['to_date'] = date('Y-m-d',strtotime($_POST['todt']));
			

				$filename = $this->data['report_title'].date('Ymdhis');
				$perms=array(
					'repId' => $_POST['repId'],
					'from_date' => $_POST['fromdt'],
					'to_date' => $_POST['todt'],
				);				
			
			if($_POST['repId']==1){				
				$this->data['res'] = $this->user_list_report_model->directReport($perms);				
			}else if($_POST['repId']==2){				
				$this->data['res'] = $this->wifi_sessions_list_model->directReport($perms);				
			}else{
				$this->page_construct('reports/notfound',$this->data);
			}
				


			if($_POST['type']==1){ // PDF
				$this->pdf($html,$filename);
			}
			
			if($_POST['type']==2){ // EXCEL
				$html = $this->load->view('reports/reportprint', $this->data, true);
				$this->excel($html,$filename);
			}

			if($_POST['type']==3){ // PRINT			
				$html = $this->load->view('reports/reportprint', $this->data, true);
				echo $html;
			}

			if($_POST['type']==4){ // GRID				
				$this->page_rep_construct('reports/report',$this->data);
			}

			// $this->page_construct('jute/jutereport',$this->data);
			
		}
	}

	function excel($result,$filename){
		
		$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
				   <head>
					   <!--[if gte mso 9]>
					   <xml>
						   <x:ExcelWorkbook>
							   <x:ExcelWorksheets>
								   <x:ExcelWorksheet>
									   <x:Name>Sheet 1</x:Name>
									   <x:WorksheetOptions>
										   <x:Print>
											   <x:ValidPrinterInfo/>
										   </x:Print>
									   </x:WorksheetOptions>
								   </x:ExcelWorksheet>
							   </x:ExcelWorksheets>
						   </x:ExcelWorkbook>
					   </xml>
					   <![endif]-->
				   </head>
				   <body>'.$result.'</body></html>';
				   
	   
	   
	//    header('Content-Encoding: UTF-8');
	//    header('Content-Type: application/vnd.ms-excel');
	//    header('Content-Type: UTF-8');
	//    header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
	//    header('Cache-Control: max-age=0');		
	//    mb_convert_encoding($data, 'UCS-2LE', 'UTF-8');

	   ob_end_clean();
	   header('Content-Encoding: UTF-8');
	   header('Content-Type: application/vnd.ms-excel');
	//    header('Content-Type: UTF-8');
	   header("Content-type: application/vnd.ms-excel" );
	   header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
	   header('Cache-Control: max-age=0');		
	   header("Pragma: no-cache");
	   header("Expires: 0");
	   ob_end_clean();
	   mb_convert_encoding($data, 'UCS-2LE', 'UTF-8');	 
	   echo $data;
   }
	
}
