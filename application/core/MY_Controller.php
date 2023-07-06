<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('varaha');
        $this->load->library('form_validation');
		$this->data['assets'] = base_url() . 'public/'; 
		
    }

    function page_construct($page, $data = array()) {
        	
        // $this->varaha->print_arrays($this->data['data']);
        	
        $this->data['data'] = $data;	
		$this->load->view('common/header',$this->data);
		$this->load->view('common/pageheader',$this->data);
		$this->load->view('common/menu',$this->data);
        if($this->data['data']['sidepanel']){
            $this->load->view('common/sidepanel');
        }
		
		$this->load->view($page);
		$this->load->view('common/footer');
    }
	
	function page_view($page, $data = array()) {
       $this->load->view($page,$this->data);
    }
	
	function page_rep_construct($page, $data = array()) {
        $this->data['data'] = $data;		
		$this->load->view('common/header',$this->data);
		$this->load->view('common/pageheader',$this->data);
		$this->load->view('common/menu',$this->data);
		
		$this->load->view('reports/header');
		$this->load->view($page);
		$this->load->view('common/footer');
    }
	
	
	

}
