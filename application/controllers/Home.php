<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->perPage = 1;
        
    }

	
	// Load Login Page Start
	public function index()
	{
		if($this->session->userdata('userdata')){
			redirect('Home/Dashboard');
		}
		$website_settings = $this->home_model->get_website_settings();
		$this->session->set_userdata('website_settings',$website_settings);
		$this->load->view('login');
		
	}
	// Load Login Page End

	// Auth Login Check Start
	public function AuthLogin(){

		$this->load->model('home_model');
		$this->load->library('form_validation'); //loading form validation library

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
        {
                echo "there was an issue";
        }
        else
        {
        	   $username = $this->input->post('username');
        	   $password = $this->input->post('password');
               $return_result = $this->home_model->get_user($username,$password);

               if($return_result == "OK"){
               		redirect('Home/Dashboard');
               }else{
               		echo "invalid user";
               }
        }
	}
	// Auth Login Check End

	// Dashbord Page Start
	public function Dashboard(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$this->load->view('include/header');
		$this->load->view('dashboard');
		$this->load->view('include/footer');
	}
	// Dashbord Page End



	public function Agents(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$this->load->view('include/header');
		$this->load->view('agent/agents');
		$this->load->view('include/footer');
	}

	public function Currency(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('home_model');

		$totalRec = count($this->home_model->get_currency());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Home/ajaxcurrency';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['currency_data'] = $this->home_model->get_currency_limits(array('limit'=>$this->perPage));
		$this->load->view('include/header');
		$this->load->view('currency/currency',$data);
		$this->load->view('include/footer');
	} 


	public function ajaxcurrency(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('home_model');

		$keyword = $this->input->post('keyword');

		$totalRec = count($this->home_model->get_currency($keyword));

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
        $data['currency_data'] = $this->home_model->get_currency_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);
        $this->load->view('currency/ajaxcurrency',$data,false);
        
		
	} 



	public function Country(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$this->load->view('include/header');
		$this->load->view('country/country');
		$this->load->view('include/footer');

	}


	public function Agents_group(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$this->load->view('include/header');
		$this->load->view('agent/agents_group');
		$this->load->view('include/footer');

	}

	// All Add Forms Start
	public function Add_currency(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			$this->load->model('home_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('currency_code', 'Currency Code', 'required');
			$this->form_validation->set_rules('name', 'Country Name', 'required');
			$this->form_validation->set_rules('rate', 'Rate', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$currency_data['name'] = $this->input->post('name'); 
	        	$currency_data['currency_code'] = $this->input->post('currency_code'); 
	        	$currency_data['rate'] = $this->input->post('rate'); 
	        	$this->home_model->add_currency($currency_data);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('currency/add_currency');
			$this->load->view('include/footer');	
		}

	}
	// All Add Forms End



	// UpdateCurrency Forms Start
	public function UpdateCurrency(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			$this->load->model('home_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('currency_code', 'Currency Code', 'required');
			$this->form_validation->set_rules('name', 'Country Name', 'required');
			$this->form_validation->set_rules('rate', 'Rate', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id'); 
	        	$id = url_value_decode($id);
	        	$currency_data['name'] = $this->input->post('name'); 
	        	$currency_data['currency_code'] = $this->input->post('currency_code'); 
	        	$currency_data['rate'] = $this->input->post('rate'); 
	        	$this->home_model->update_currency($currency_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('currency/add_currency');
			$this->load->view('include/footer');	
		}

	}
	// UpdateCurrency Forms End

	// GetCurrencyEdit Start
	 public function GetCurrencyEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_currency_data = $this->home_model->get_currency_by_id($id);
	 	echo json_encode($edit_currency_data);
	 }
	// GetCurrencyEdit End

	 // DeleteCurrency Start
	 public function DeleteCurrency(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_currency_data = $this->home_model->delete_currency($id);
	 }
	 // DeleteCurrency End


	 // public function Website_settings start
	 public function Website_settings(){
	 	if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

			$data['website_settings_data'] = $this->home_model->get_website_settings();
			$this->load->view('include/header');
			$this->load->view('manage_website',$data);
			$this->load->view('include/footer');


	 }

	 public function EditWebsite_settings(){
	 	if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

			$data['website_settings_data'] = $this->home_model->get_website_settings();
			$this->load->view('include/header');
			$this->load->view('update_manage_website',$data);
			$this->load->view('include/footer');


	 }

	 public function Update_website_settings(){
	 	if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
			$update_data['name'] = $this->input->post('name');
			
			$update_data['smtp_host'] = $this->input->post('smtp_host');
			$update_data['smtp_port'] = $this->input->post('smtp_port');
			$update_data['smtp_username'] = $this->input->post('smtp_username');
			$update_data['contact_address'] = $this->input->post('contact_address');
			$update_data['email'] = $this->input->post('email');
			$update_data['contact_number'] = $this->input->post('contact_number');

			// check for upload logo and fevicon start
			if($_FILES["logo"]["name"] != ''){
				$this->load->library('upload');
				$config['upload_path'] = './assets/uploads/website_settings/';
				$config['allowed_types'] = 'png|jpg|bmp';
				$this->upload->initialize($config);
				$upload = $this->upload->do_upload('logo');
				$upload_data = $this->upload->data();
				$update_data['logo'] = $upload_data['file_name'];
			}

			if($_FILES["fevicon"]["name"] != ''){
				$this->load->library('upload');
				$config['upload_path'] = './assets/uploads/website_settings/';
				$config['allowed_types'] = 'png|jpg|bmp';
				$this->upload->initialize($config);
				$upload = $this->upload->do_upload('fevicon');
				$upload_data = $this->upload->data();
				$update_data['fevicon'] = $upload_data['file_name'];
			}
			// check for upload logo and fevicon end

			$this->home_model->update_website_settings($update_data);
			redirect('Home/Website_settings');
	 }
	 // public function Website_settings end

	public function Logout(){
		$this->session->unset_userdata('userdata');
		redirect('Home');
	}


	// Export 
	function export_currency($keyword = ''){

        $sr = 1;
        $allData = $this->home_model->Get_export_currency($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Code'] = $data['currency_code'];
            $arrangeData['Name'] = $data['name'];
            $arrangeData['Rate'] = $data['rate'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "currency_data".time().".xls";
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


    
    	public function SearchVendor(){
		$keyword = $this->input->post('keyword');
		$result_set = $this->home_model->SearchVendor($keyword);
		echo json_encode($result_set);
	}

	public function SearchCurrency(){
		$keyword = $this->input->post('keyword');
		$result_set = $this->home_model->SearchCurrency($keyword);
		echo json_encode($result_set);
	}

	public function SearchCustomer(){
		$keyword = $this->input->post('keyword');
		$result_set = $this->home_model->SearchCustomer($keyword);
		echo json_encode($result_set);
	}
    

}
