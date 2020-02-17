<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Port extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('port_model');
        $this->perPage = 1;
        
    }


    public function index(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('port_model');

		$totalRec = count($this->port_model->get_port());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Home/ajaxport';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['port_data'] = $this->port_model->get_port_limits(array('limit'=>$this->perPage));
		$this->load->view('include/header');
		$this->load->view('port/port',$data);
		$this->load->view('include/footer');

	}

	public function ajaxport(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('port_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->port_model->get_port($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }
        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Home/ajaxcurrency';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['port_data'] = $this->port_model->get_port_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);
        $this->load->view('port/ajaxport',$data,false);
        
		
	} 


	public function Add_port(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'Currency Code', 'required');
			$this->form_validation->set_rules('name', 'Country Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$port_data['name'] = $this->input->post('name'); 
	        	$port_data['code'] = $this->input->post('code');
	        	$this->port_model->add_port($port_data);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}

	// GetPortEdit Start
	 public function GetPortEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_port_data = $this->port_model->get_port_by_id($id);
	 	echo json_encode($edit_port_data);
	 }
	// GetPortEdit End

	 // DeletePort Start
	 public function DeletePort(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->port_model->delete_port($id);
	 }
	 // DeletePort End


	 // UpdateCurrency Forms Start
	public function UpdatePort(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			$this->load->model('port_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id'); 
	        	$id = url_value_decode($id);
	        	$port_data['name'] = $this->input->post('name'); 
	        	$port_data['code'] = $this->input->post('code');
	        	$this->port_model->update_port($port_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}
	// UpdateCurrency Forms End

	public function SearchPort(){
		$keyword = $this->input->post('keyword');
		$result_set = $this->port_model->SearchPort($keyword);
		echo json_encode($result_set);
	}


	// Export 
	function export_port($keyword = ''){

        $sr = 1;
        $allData = $this->port_model->SearchPort($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Code'] = $data['code'];
            $arrangeData['Name'] = $data['name'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "port_data".time().".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $this->exportExcelData($dataToExports);

    }

    private function exportExcelData($records) {
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
                // return implode("\t", ($row)) . "\n";
            }
        }
    }





}

?>