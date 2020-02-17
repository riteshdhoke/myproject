<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('customer_model');
        $this->perPage = 1;
        
    }


    public function index(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('customer_model');

		$totalRec = count($this->customer_model->get_customer());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Customer/ajaxcustomer';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['customer_data'] = $this->customer_model->get_customer_limits(array('limit'=>$this->perPage));
        $data['group_data'] = $this->customer_model->get_customer_groups();
		$data['country_data'] = $this->customer_model->get_country();
		$data['port_data'] = $this->customer_model->get_port();
		$data['currency_data'] = $this->customer_model->get_currency();
		$data['term_data'] = $this->customer_model->get_term();
		$data['sales_data'] = $this->customer_model->get_sales();

		$this->load->view('include/header');
		$this->load->view('customer/customer',$data);
		$this->load->view('include/footer');

	}

	 public function ajaxcustomer(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('customer_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->customer_model->get_customer($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }
        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Customer/ajaxcustomer';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['customer_data'] = $this->customer_model->get_customer_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);
        $data['customer_group_data'] = $this->customer_model->get_customer_groups();
		$data['country_data'] = $this->customer_model->get_country();
		$data['port_data'] = $this->customer_model->get_port();
		$data['currency_data'] = $this->customer_model->get_currency();
		$data['term_data'] = $this->customer_model->get_term();

		
		return $this->load->view('customer/ajaxcustomer',$data,false);

	}

	public function ajaxagent(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('customer_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->customer_model->get_agent($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }

        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxagent';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['agent_data'] = $this->customer_model->get_agent_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);

        $data['group_data'] = $this->customer_model->get_agent_groups();
		$data['country_data'] = $this->customer_model->get_country();
		$data['port_data'] = $this->customer_model->get_port();
		$data['currency_data'] = $this->customer_model->get_currency();
		$data['term_data'] = $this->customer_model->get_term();


		$this->load->view('agent/ajaxagent',$data,false);
		

	}


	 public function Customer_group(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('customer_model');

		$totalRec = count($this->customer_model->get_customer_groups());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxcustomergroup';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['customer_data'] = $this->customer_model->get_customer_groups_limits(array('limit'=>$this->perPage));

		$this->load->view('include/header');
		$this->load->view('customer/customergroup',$data);
		$this->load->view('include/footer');

	}

	public function ajaxcustomergroup(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('customer_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->customer_model->get_customer_groups($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }

        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxcustomergroup';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['customer_data'] = $this->customer_model->get_customer_groups_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);


		$this->load->view('customer/ajaxcustomergroup',$data,false);
		

	}


	public function Add_customer(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['full_name'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('customer_group', 'Customer Group', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('short_name', 'Short Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{

	        	$userdata = $this->session->userdata('userdata');

	        	$customer_data['group_id'] = $this->input->post('customer_group'); 
	        	$customer_data['full_name'] = $this->input->post('full_name');
	        	$customer_data['short_name'] = $this->input->post('short_name');
	        	$customer_data['telephone_1'] = $this->input->post('telephone_1');
	        	$customer_data['telephone_2'] = $this->input->post('telephone_2');
	        	$customer_data['fax_1'] = $this->input->post('fax_1');
	        	$customer_data['fax_2'] = $this->input->post('fax_2');
	        	$customer_data['contact_1'] = $this->input->post('contact_1');
	        	$customer_data['contact_2'] = $this->input->post('contact_2');
	        	$customer_data['email_1'] = $this->input->post('email_1');
	        	$customer_data['email_2'] = $this->input->post('email_2');
	        	$customer_data['address'] = $this->input->post('address');
	        	$customer_data['country_id'] = $this->input->post('country');
	        	$customer_data['remark'] = $this->input->post('remark');
	        	$customer_data['uei_no'] = $this->input->post('uei_no');
	        	$customer_data['cust_acc'] = $this->input->post('cust_acc');
	        	$customer_data['salesman'] = $this->input->post('sales');
	        	$customer_data['cred_limit'] = $this->input->post('credit_limit');
	        	$customer_data['currency_id'] = $this->input->post('currency');
	        	$customer_data['term_id'] = $this->input->post('term');
	        	$customer_data['userid'] = $userdata[0]['id'];
	        	$this->customer_model->add_customer($customer_data);
	        }

		}else{
			$userdata = $this->session->userdata('userdata');
			$data['group_data'] = $this->customer_model->get_customer_groups();
			$data['country_data'] = $this->customer_model->get_country();
			$data['port_data'] = $this->customer_model->get_port();
			$data['currency_data'] = $this->customer_model->get_currency();
			$data['term_data'] = $this->customer_model->get_term();
			$data['sales_data'] = $this->customer_model->get_sales();
			$this->load->view('include/header');
			$this->load->view('customer/add_customer',$data);
			$this->load->view('include/footer');	
		}

	}


	public function Add_customer_group(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['code'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'Group ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{

	        	$userdata = $this->session->userdata('userdata');

	        	$agent_data['group_id'] = $this->input->post('code'); 
	        	$agent_data['group_name'] = $this->input->post('name');
	        	$this->customer_model->add_customer_group($agent_data);
	        	
	        }

		}else{
			$userdata = $this->session->userdata('userdata');
			$data['group_data'] = $this->customer_model->get_customer_groups();
			$this->load->view('include/header');
			$this->load->view('customer/add_customer_group',$data);
			$this->load->view('include/footer');	
		}

	}

	// GetAgentEdit Start
	 public function GetCustomerEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_agent_data = $this->customer_model->get_customer_by_id($id);
	 	$this->db->last_query();
	 	echo json_encode($edit_agent_data);
	 }
	// GetAgentEdit End

	 // GetAgentGroupEdit Start
	 public function GetCustomerGroupEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_agent_data = $this->customer_model->get_customer_group_by_id($id);
	 	echo json_encode($edit_agent_data);
	 }
	// GetAgentGroupEdit End

	 // DeleteAgent Start
	 public function DeleteAgent(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->customer_model->delete_agent($id);
	 }
	 // DeleteAgent End


	  // DeleteAgentGroup Start
	 public function DeleteCustomerGroup(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->customer_model->delete_customer_group($id);
	 }
	 // DeleteAgentGroup End

	  // DeleteAgentGroup Start
	 public function DeleteCustomer(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->customer_model->delete_customer($id);
	 }
	 // DeleteAgentGroup End


	 // UpdateAgent Forms Start
	public function Updatecustomer(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['full_name'])){

			$this->load->model('customer_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('customer_group', 'Group', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('short_name', 'Short Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id'); 
	        	$id = url_value_decode($id);
	        	$userdata = $this->session->userdata('userdata');

	        	$customer_data['group_id'] = $this->input->post('customer_group'); 
	        	$customer_data['full_name'] = $this->input->post('full_name');
	        	$customer_data['short_name'] = $this->input->post('short_name');
	        	$customer_data['telephone_1'] = $this->input->post('telephone_1');
	        	$customer_data['telephone_2'] = $this->input->post('telephone_2');
	        	$customer_data['fax_1'] = $this->input->post('fax_1');
	        	$customer_data['fax_2'] = $this->input->post('fax_2');
	        	$customer_data['contact_1'] = $this->input->post('contact_1');
	        	$customer_data['contact_2'] = $this->input->post('contact_2');
	        	$customer_data['email_1'] = $this->input->post('email_1');
	        	$customer_data['email_2'] = $this->input->post('email_2');
	        	$customer_data['address'] = $this->input->post('address');
	        	$customer_data['country_id'] = $this->input->post('country');
	        	$customer_data['remark'] = $this->input->post('remark');
	        	$customer_data['uei_no'] = $this->input->post('uei_no');
	        	$customer_data['cust_acc'] = $this->input->post('cust_acc');
	        	$customer_data['cred_limit'] = $this->input->post('credit_limit');
	        	$customer_data['currency_id'] = $this->input->post('currency');
	        	$customer_data['term_id'] = $this->input->post('term');
	        	$customer_data['salesman'] = $this->input->post('sales');
	        	$customer_data['userid'] = $userdata[0]['id'];
	        	$this->customer_model->update_customer($customer_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}
	// UpdateAgent Forms End



	 // UpdateAgent Forms Start
	public function UpdateCustomerGroup(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['id'])){

			$this->load->model('customer_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('code', 'ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id');
	        	$id = url_value_decode($id);
	        	$userdata = $this->session->userdata('userdata');

	        	$customer_data['group_id'] = $this->input->post('code'); 
	        	$customer_data['group_name'] = $this->input->post('name');
	        	$this->customer_model->update_customer_group($customer_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}
	// UpdateCurrency Forms End


	public function SearchAgent(){
		$keyword = $this->input->post('keyword');
		$result_set = $this->customer_model->SearchAgent($keyword);
		echo json_encode($result_set);
	}


	// Export 
	function export_agents($keyword = ''){

        $sr = 1;
        $allData = $this->customer_model->SearchAgent($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Group'] = $data['agent_group'];
            $arrangeData['Full Name'] = $data['full_name'];
            $arrangeData['Short Name'] = $data['short_name'];
            $arrangeData['Address'] = $data['address'];
            $arrangeData['Telephone'] = "(".$data['telephone_1'].")"."(".$data['telephone_2'].")";
            $arrangeData['Fax'] ="(".$data['fax_1'].")"."(".$data['fax_2'].")";
            $arrangeData['Contact'] = "(".$data['contact_1'].")"."(".$data['contact_2'].")";
            $arrangeData['Email'] = "(".$data['email_1'].")"."(".$data['email_2'].")";
            $arrangeData['Country'] = $data['country'];
            $arrangeData['Port'] = $data['port'];
            $arrangeData['Remark'] = $data['remark'];
            $arrangeData['UEI No'] = $data['uei_no'];
            $arrangeData['Cust Acc'] = $data['cust_acc'];
            $arrangeData['Credit Limit'] = $data['credit_limit'];
            $arrangeData['Term'] = $data['term'];
            $arrangeData['Currency'] = $data['currency'];
            $arrangeData['User'] = $data['user_id'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "agent_data".time().".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $this->exportExcelData($dataToExports);

    }

    function export_customer_group($keyword = ''){

        $sr = 1;
        $allData = $this->customer_model->SearchCustomerGroup($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Group ID'] = $data['group_id'];
            $arrangeData['Name'] = $data['group_name'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "customer_group_data".time().".xls";
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