<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->perPage = 1;
        
    }


    public function index(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$totalRec = count($this->country_model->get_country());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Country/ajaxcountry';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['country_data'] = $this->country_model->get_country_limits(array('limit'=>$this->perPage));
		$this->load->view('include/header');
		$this->load->view('country/country',$data);
		$this->load->view('include/footer');

	}

	 public function ajaxcountry(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->country_model->get_country($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }
        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Country/ajaxcountry';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['country_data'] = $this->country_model->get_country_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);
		
		$this->load->view('country/ajaxcountry',$data,false);

	}


	public function Add_country(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'Country Code', 'required');
			$this->form_validation->set_rules('name', 'Country Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$country_data['country_name'] = $this->input->post('name'); 
	        	$country_data['country_code'] = $this->input->post('code');
	        	$this->country_model->add_country($country_data);

	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('country/add_country');
			$this->load->view('include/footer');	
		}

	}

	// GetcountrytEdit Start
	 public function GetcountryEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_country_data = $this->country_model->get_country_by_id($id);
	 	echo json_encode($edit_country_data);
	 }
	// GetcountryEdit End

	 // Deletecountry Start
	 public function Deletecountry(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->country_model->delete_country($id);
	 }
	 // Deletecountryt End

	 // UpdateCurrency Forms Start
	public function UpdateCountry(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'Code', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id'); 
	        	$id = url_value_decode($id);
	        	$port_data['country_name'] = $this->input->post('name'); 
	        	$port_data['country_code'] = $this->input->post('code');
	        	$this->country_model->update_country($port_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('country/add_country');
			$this->load->view('include/footer');	
		}

	}
	// UpdateCurrency Forms End


	// Export 
	function export_country($keyword = ''){

        $sr = 1;
        $allData = $this->country_model->SearchCountry($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Code'] = $data['country_code'];
            $arrangeData['Name'] = $data['country_name'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "country_data".time().".xls";
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