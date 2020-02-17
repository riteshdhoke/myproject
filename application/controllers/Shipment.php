<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('shipment_model');
        $this->perPage = 10;
        
    }

    public function all_shipment(){

    	$this->load->view('include/header');
    	echo "all shipment";
    	$this->load->view('include/footer');
    }
    public function sea_import_shipment(){

		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$this->load->model('shipment_model');

		$totalRec = count($this->shipment_model->get_ship_import());

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
        $data['ship_import_data'] = $this->shipment_model->get_ship_import_limits(array('limit'=>$this->perPage));
		$this->load->view('include/header');
		$this->load->view('shipment/sea_import_shipment',$data);
		$this->load->view('include/footer');

	}


	public function add_sea_import_shipment(){
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
	        	$this->shipment_model->add_port($port_data);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('shipment/add_sea_import_shipment');
			$this->load->view('include/footer');	
		}

	}

	// GetPortEdit Start
	 public function GetPortEdit(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$edit_port_data = $this->shipment_model->get_port_by_id($id);
	 	echo json_encode($edit_port_data);
	 }
	// GetPortEdit End

	 // DeletePort Start
	 public function DeletePort(){
	 	$id = $this->input->post('id');
	 	$id = url_value_decode($id);
	 	$this->shipment_model->delete_port($id);
	 }
	 // DeletePort End


	 // UpdateCurrency Forms Start
	public function UpdatePort(){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		if(isset($_POST['name'])){

			$this->load->model('shipment_model');
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
	        	$this->shipment_model->update_port($port_data,$id);
	        }

		}else{
			$this->load->view('include/header');
			$this->load->view('port/add_port');
			$this->load->view('include/footer');	
		}

	}
	// UpdateCurrency Forms End


	public function Add_Shipment_import(){
			$this->load->library('form_validation'); //loading form validation library


		// Prepare data for import ref start
		$import_ref_data['ref_no'] = time();
		$import_ref_data['status'] = $this->input->post('status');
		$import_ref_data['job_type'] = $this->input->post('job_type');
		$import_ref_data['job_date'] = $this->input->post('job_date');
		$import_ref_data['agent'] = $this->input->post('agent');
		$import_ref_data['eta'] = $this->input->post('eta');
		$import_ref_data['edt'] = $this->input->post('edt');
		$import_ref_data['vessel'] = $this->input->post('vessel');
		$import_ref_data['voyage'] = $this->input->post('voyage');
		$import_ref_data['pol'] = $this->input->post('pol');
		$import_ref_data['pod'] = $this->input->post('pod');
		$import_ref_data['ocean_bl'] = $this->input->post('ocean_bl');
		$import_ref_data['cr_agent'] = $this->input->post('cr_agent');
		$import_ref_data['cr_booking_no'] = $this->input->post('cr_booking_no');
		$import_ref_data['nvocc_agent'] = $this->input->post('nvocc_agent');
		$import_ref_data['nvocc_bl'] = $this->input->post('nvocc_bl');
		$import_ref_data['warehouse'] = $this->input->post('warehouse');
		$import_ref_data['total_m3'] = $this->input->post('total_m3');
		$import_ref_data['forword_agent'] = $this->input->post('forword_agent');
		$import_ref_data['total_wt'] = $this->input->post('total_wt');
		$import_ref_data['transport'] = $this->input->post('transport');
		$import_ref_data['total_packages'] = $this->input->post('total_packages');
		$import_ref_data['ref_currency'] = $this->input->post('currency');
		$import_ref_data['pkg_types'] = $this->input->post('pkg_types');
		$import_ref_data['remark'] = $this->input->post('remark');
		$import_ref_data['user'] = $this->input->post('user');
		// Prepare data for import ref end

		$import_ref_data_inserted_id = $this->shipment_model->add_shipping_import_ref($import_ref_data);

		// Prepare data for shipping start
		$import_shipping_data['shipper_shipper_id'] = $this->input->post('shipper_shipper_id');
		$import_shipping_data['shipper_consignee_id'] = $this->input->post('shipper_consignee_id');
		$import_shipping_data['shipper_notify_party_id'] = $this->input->post('shipper_notify_party_id');
		$import_shipping_data['shipper_agent_id'] = $this->input->post('shipper_agent_id');
		// Prepare data for shipping end

		$import_shipping_data_inserted_id = $this->shipment_model->add_shipping_import_shipping($import_shipping_data);

		$this->shipment_model->add_shipping_import_master($import_ref_data_inserted_id,$import_shipping_data_inserted_id);

	}


	public function edit_sea_import_shipment($id){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}
		$id = url_value_decode($id);

		$edit_all_data = $this->shipment_model->get_master_shipment_data($id);
		if($edit_all_data['import_ref_data'][0]['agent'] != ''){
		$edit_all_data['imp_reff_agent_data'] =  $this->shipment_model->get_agent_by_id($edit_all_data['import_ref_data'][0]['agent']);
		}

		$this->load->view('include/header');
		$this->load->view('shipment/edit_sea_import_shipment',$edit_all_data);
		$this->load->view('include/footer');
		

	}


	public function Add_Shipment_import_Job($ref_id){
		if(!$this->session->userdata('userdata')){
			redirect('Home');
		}

		$this->load->view('include/header');
		$ref_id = url_value_decode($ref_id);
		echo "ssssssssssssssssss:".$ref_id;
		// $this->load->view('shipment/edit_sea_import_shipment',$edit_all_data);
		$this->load->view('include/footer');

	}


}

?>