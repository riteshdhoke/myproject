<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment_model extends CI_Model {

	public function get_port(){
		return $this->db->get('port')->result_array();
	}

	public function get_ship_import_limits($params = array()){
		$this->db->select('*');
		$this->db->from('import_ref');
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}

		public function add_port($data){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('port'); 
		$this->db->where('code',$data['code']); 
		$this->db->or_where('name',$data['name']);
		$result = $this->db->get()->result_array();

		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->insert('port',$data);
			redirect('Port');
		}
		
	}

	public function get_port_by_id($id){
		return $this->db->get_where('port',array('id' => $id))->result_array();
	}

	public function delete_port($id){
		$this->db->where('id',$id);
		$this->db->delete('port');
	}


	public function update_port($data,$id){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('port'); 
		$where = "id != ".$id." AND (code = '".$data['code']."' OR name = '".$data['name']."')";
		$this->db->where($where); 
		$result = $this->db->get()->result_array();
		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->where('id',$id);
			$this->db->update('port',$data);
			redirect('Port');
		}
		
	}

	public function add_shipping_import_ref($import_ref_data){
		$this->db->insert("import_ref",$import_ref_data);
		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}

	public function add_shipping_import_shipping($import_shipping_data){
		$this->db->insert("import_shipper",$import_shipping_data);

		$insert_id = $this->db->insert_id();

  		return  $insert_id;

	}

	public function add_shipping_import_master($import_ref_data_inserted_id,$import_shipping_data_inserted_id){
		$master_data['import_ref_id'] = $import_ref_data_inserted_id;
		$master_data['shipper_id'] = $import_shipping_data_inserted_id;
		$this->db->insert("sea_import_shipment_master",$master_data);

		redirect('Shipment/sea_import_shipment');

	}

	public function get_ship_import(){
		return $this->db->get('import_ref')->result_array();
	}

	public function get_master_shipment_data($id){
		$master_data = $this->db->get_where('sea_import_shipment_master',array('import_ref_id' => $id))->result_array();
		$data['import_ref_data'] = $this->db->get_where('import_ref',array('id' => $id))->result_array();
		$data['shipper_data'] = $this->db->get_where('import_shipper',array('id' => $master_data[0]['shipper_id']))->result_array();
		return $data;
	}

	public function get_agent_by_id($id){
		return $this->db->get_where('agents',array('id' => $id))->result_array();
	}

}