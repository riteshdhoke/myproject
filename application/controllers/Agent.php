<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('agent_model');
        $this->perPage = 1;
        
    }


    public function index(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('agent_model');

		$totalRec = count($this->agent_model->get_agent());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxagent';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['agent_data'] = $this->agent_model->get_agent_limits(array('limit'=>$this->perPage));

        $data['group_data'] = $this->agent_model->get_agent_groups();
		$data['country_data'] = $this->agent_model->get_country();
		$data['port_data'] = $this->agent_model->get_port();
		$data['currency_data'] = $this->agent_model->get_currency();
		$data['term_data'] = $this->agent_model->get_term();

		$this->load->view('include/header');
		$this->load->view('agent/agents',$data);
		$this->load->view('include/footer');

	}

	public function ajaxagent(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('agent_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->agent_model->get_agent($keyword));

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
        $data['agent_data'] = $this->agent_model->get_agent_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);

        $data['group_data'] = $this->agent_model->get_agent_groups();
		$data['country_data'] = $this->agent_model->get_country();
		$data['port_data'] = $this->agent_model->get_port();
		$data['currency_data'] = $this->agent_model->get_currency();
		$data['term_data'] = $this->agent_model->get_term();


		$this->load->view('agent/ajaxagent',$data,false);
		

	}


	 public function Agent_group(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('agent_model');

		$totalRec = count($this->agent_model->get_agent_groups());

        if($totalRec == 0){
           $totalRec = 0; 
        }

         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxagentgroup';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['agent_data'] = $this->agent_model->get_agent_group_limits(array('limit'=>$this->perPage));

		$this->load->view('include/header');
		$this->load->view('agent/agents_group',$data);
		$this->load->view('include/footer');

	}

	public function ajaxagentgroup(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('agent_model');
		$keyword = $this->input->post('keyword');
		$totalRec = count($this->agent_model->get_agent_groups($keyword));

        if($totalRec == 0){
           $totalRec = 0; 
        }

        $offset = $this->input->post('page');
         //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Agent/ajaxagentgroup';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $data['sr'] = 1;
        $data['agent_data'] = $this->agent_model->get_agent_group_limits(array('limit'=>$this->perPage,'start' => $offset),$keyword);

        $data['group_data'] = $this->agent_model->get_agent_groups();
		$data['country_data'] = $this->agent_model->get_country();
		$data['port_data'] = $this->agent_model->get_port();
		$data['currency_data'] = $this->agent_model->get_currency();
		$data['term_data'] = $this->agent_model->get_term();


		$this->load->view('agent/ajaxagentgroup',$data,false);
		

	}


	public function Add_agent(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['full_name'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('agent_group', 'Agent Group', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('short_name', 'Short Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{

	        	$userdata = $this->session->userdata('userdata');

	        	$agent_data['agent_group'] = $this->input->post('agent_group'); 
	        	$agent_data['full_name'] = $this->input->post('full_name');
	        	$agent_data['short_name'] = $this->input->post('short_name');
	        	$agent_data['telephone_1'] = $this->input->post('telephone_1');
	        	$agent_data['telephone_2'] = $this->input->post('telephone_2');
	        	$agent_data['fax_1'] = $this->input->post('fax_1');
	        	$agent_data['fax_2'] = $this->input->post('fax_2');
	        	$agent_data['contact_1'] = $this->input->post('contact_1');
	        	$agent_data['contact_2'] = $this->input->post('contact_2');
	        	$agent_data['email_1'] = $this->input->post('email_1');
	        	$agent_data['email_2'] = $this->input->post('email_2');
	        	$agent_data['address'] = $this->input->post('address');
	        	$agent_data['port'] = $this->input->post('port');
	        	$agent_data['country'] = $this->input->post('country');
	        	$agent_data['remark'] = $this->input->post('remark');
	        	$agent_data['uei_no'] = $this->input->post('uei_no');
	        	$agent_data['cust_acc'] = $this->input->post('cust_acc');
	        	$agent_data['credit_limit'] = $this->input->post('credit_limit');
	        	$agent_data['currency'] = $this->input->post('currency');
	        	$agent_data['term'] = $this->input->post('term');
	        	$agent_data['user_id'] = $userdata[0]['id'];
	        	$this->agent_model->add_agent($agent_data);
	        }

		}else{
			$userdata = $this->session->userdata('userdata');
			$data['group_data'] = $this->agent_model->get_agent_groups();
			$data['country_data'] = $this->agent_model->get_country();
			$data['port_data'] = $this->agent_model->get_port();
			$data['currency_data'] = $this->agent_model->get_currency();
			$data['term_data'] = $this->agent_model->get_term();
			$this->load->view('include/header');
			$this->load->view('agent/add_agents',$data);
			$this->load->view('include/footer');	
		}

	}


	public function Add_agent_group(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['group_id'])){

			
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('group_id', 'Group ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{

	        	$userdata = $this->session->userdata('userdata');

	        	$agent_data['group_id'] = $this->input->post('group_id'); 
	        	$agent_data['name'] = $this->input->post('name');
	        	$this->agent_model->add_agent_group($agent_data);
	        	
	        }

		}else{
			$userdata = $this->session->userdata('userdata');
			$data['group_data'] = $this->agent_model->get_agent_groups();
			$this->load->view('include/header');
			$this->load->view('agent/add_agents_group',$data);
			$this->load->view('include/footer');	
		}

	}

	// GetAgentEdit Start
	 public function GetAgentEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_agent_data = $this->agent_model->get_agent_by_id($id);
	 	echo json_encode($edit_agent_data);
	 }
	// GetAgentEdit End

	 // GetAgentGroupEdit Start
	 public function GetAgentGroupEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_agent_data = $this->agent_model->get_agent_group_by_id($id);
	 	echo json_encode($edit_agent_data);
	 }
	// GetAgentGroupEdit End

	 // DeleteAgent Start
	 public function DeleteAgent(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->agent_model->delete_agent($id);
	 }
	 // DeleteAgent End


	  // DeleteAgentGroup Start
	 public function DeleteAgentGroup(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->agent_model->delete_agent_group($id);
	 }
	 // DeleteAgentGroup End


	 // UpdateAgent Forms Start
	public function UpdateAgent(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['full_name'])){

			$this->load->model('agent_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('agent_group', 'Agent Group', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('short_name', 'Short Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id'); 
	        	$id = url_value_decode($id);
	        	$userdata = $this->session->userdata('userdata');

	        	$agent_data['agent_group'] = $this->input->post('agent_group'); 
	        	$agent_data['full_name'] = $this->input->post('full_name');
	        	$agent_data['short_name'] = $this->input->post('short_name');
	        	$agent_data['telephone_1'] = $this->input->post('telephone_1');
	        	$agent_data['telephone_2'] = $this->input->post('telephone_2');
	        	$agent_data['fax_1'] = $this->input->post('fax_1');
	        	$agent_data['fax_2'] = $this->input->post('fax_2');
	        	$agent_data['contact_1'] = $this->input->post('contact_1');
	        	$agent_data['contact_2'] = $this->input->post('contact_2');
	        	$agent_data['email_1'] = $this->input->post('email_1');
	        	$agent_data['email_2'] = $this->input->post('email_2');
	        	$agent_data['address'] = $this->input->post('address');
	        	$agent_data['port'] = $this->input->post('port');
	        	$agent_data['country'] = $this->input->post('country');
	        	$agent_data['remark'] = $this->input->post('remark');
	        	$agent_data['uei_no'] = $this->input->post('uei_no');
	        	$agent_data['cust_acc'] = $this->input->post('cust_acc');
	        	$agent_data['credit_limit'] = $this->input->post('credit_limit');
	        	$agent_data['currency'] = $this->input->post('currency');
	        	$agent_data['term'] = $this->input->post('term');
	        	$agent_data['user_id'] = $userdata[0]['id'];
	        	$this->agent_model->update_agent($agent_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}
	// UpdateAgent Forms End



	 // UpdateAgent Forms Start
	public function UpdateAgentGroup(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['group_id'])){

			$this->load->model('agent_model');
			$this->load->library('form_validation'); //loading form validation library

			$this->form_validation->set_rules('group_id', 'Agent ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() == FALSE)
	        {
	                echo "there was an issue";
	        }else{
	        	$id = $this->input->post('id');
	        	$id = url_value_decode($id);
	        	$userdata = $this->session->userdata('userdata');

	        	$agent_data['group_id'] = $this->input->post('group_id'); 
	        	$agent_data['name'] = $this->input->post('name');
	        	$this->agent_model->update_agent_group($agent_data,$id);
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
		$result_set = $this->agent_model->SearchAgent($keyword);
		echo json_encode($result_set);
	}


	// Export 
	function export_agents($keyword = ''){

        $sr = 1;
        $allData = $this->agent_model->SearchAgent($keyword);
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

    function export_agents_group($keyword = ''){

        $sr = 1;
        $allData = $this->agent_model->SearchAgentGroup($keyword);
        $dataToExports = array();
        foreach ($allData as $data) {

            $arrangeData['Sr No'] =  $sr;
            $arrangeData['Group ID'] = $data['group_id'];
            $arrangeData['Name'] = $data['name'];
            $arrangeData['Date Added'] = $data['date_added'];
        
            $dataToExports[] = $arrangeData;
            $sr++;
        }
        $filename = "agents_group_data".time().".xls";
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