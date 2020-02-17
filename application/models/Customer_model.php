<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function get_customer($keyword = ''){
		

		if($keyword == ''){
			return $this->db->get('customers')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('customers');
			$this->db->like('full_name',$keyword);
			$this->db->or_like('short_name',$keyword);
			return $this->db->get()->result_array();
		}

	}

	public function get_customer_limits($params = array(),$keyword = ''){
		$this->db->select('*');
		$this->db->from('customers');
		if($keyword != ''){
			$this->db->like('full_name',$keyword);
			$this->db->or_like('short_name',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}


	public function get_customer_groups_limits($params = array(),$keyword =''){
		$this->db->select('*');
		$this->db->from('customer_group');
		if($keyword != ''){
			$this->db->like('group_name',$keyword);
			$this->db->or_like('group_id',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}

		public function add_customer($data){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->insert('customers',$data);
			redirect('Customer');
		
	}

	public function add_customer_group($data){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->insert('customer_group',$data);
			redirect('Customer/Customer_group');
		
	}

	public function get_customer_by_id($id){
		return $this->db->get_where('customers',array('id' => $id))->result_array();
	}


	public function get_customer_group_by_id($id){
		return $this->db->get_where('customer_group',array('id' => $id))->result_array();
	}

	public function delete_customer($id){
		$this->db->where('id',$id);
		$this->db->delete('customers');
	}
	public function delete_customer_group($id){
		$this->db->where('id',$id);
		$this->db->delete('customer_group');
	}


	public function update_customer($data,$id){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->where('id',$id);
			$this->db->update('customers',$data);
			redirect('Customer');
		
	}

	public function update_customer_group($data,$id){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->where('id',$id);
			$this->db->update('customer_group',$data);
			redirect('Customer/Customer_group');
		
	}


	public function get_customer_groups($keyword = ''){

		if($keyword == ''){
			return $this->db->get('customer_group')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('customer_group');
			$this->db->like('group_id',$keyword);
			$this->db->or_like('group_name',$keyword);
			return $this->db->get()->result_array();
		}

	}

	public function get_country(){
		return $this->db->get('country')->result_array();
	}

	public function get_port(){
		return $this->db->get('port')->result_array();
	}

	public function get_currency(){
		return $this->db->get('currency')->result_array();
	}

	public function get_term(){
		return $this->db->get('term')->result_array();
	}

	public function get_sales(){
		return $this->db->get('sales')->result_array();
	}

	public function SearchAgent($keyword){
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->like('full_name',$keyword);
		$this->db->or_like('short_name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}


	public function SearchCustomerGroup($keyword){
		$this->db->select('*');
		$this->db->from('customer_group');
		$this->db->like('group_id',$keyword);
		$this->db->or_like('group_name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}





}