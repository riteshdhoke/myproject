<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {


	public function get_user($username,$password)
	{
		
		$userdata = $this->db->get_where('user',array('username' => $username))->result_array();
		
		if(count($userdata) > 0){

			if(password_verify($password,$userdata[0]['password'])){
				// setting session start
				$this->session->set_userdata('userdata',$userdata);
				return "OK";
				
			}else{
				return "invalid password";
			}
		}else{
			return "invalid username";
		}
		
	}

	public function add_currency($data){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('currency'); 
		$this->db->where('currency_code',$data['currency_code']); 
		$this->db->or_where('name',$data['name']);
		$result = $this->db->get()->result_array();

		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->insert('currency',$data);
			redirect('Home/Currency');
		}
		
	}


		public function update_currency($data,$id){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('currency'); 
		$where = "id != ".$id." AND (currency_code = '".$data['currency_code']."' OR name = '".$data['name']."')";
		$this->db->where($where); 
		$result = $this->db->get()->result_array();
		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->where('id',$id);
			$this->db->update('currency',$data);
			redirect('Home/Currency');
		}
		
	}

	public function get_currency($keyword = ''){
		if($keyword == ''){
			return $this->db->get('currency')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('currency');
			$this->db->like('currency_code',$keyword);
			$this->db->or_like('name',$keyword);
			return $this->db->get()->result_array();
		}
	}

	public function get_currency_by_id($id){
		return $this->db->get_where('currency',array('id' => $id))->result_array();
	}


	public function get_currency_limits($params = array(),$keyword = ''){
		$this->db->select('*');
		$this->db->from('currency');
		if($keyword != ''){
			$this->db->like('currency_code',$keyword);
			$this->db->or_like('name',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}


	public function Get_export_currency($keyword = ''){
		$this->db->select('*');
		$this->db->from('currency');
		if($keyword != ''){
			$this->db->like('currency_code',$keyword);
			$this->db->or_like('name',$keyword);
		}
		
        return $this->db->get()->result_array();
	}


	public function delete_currency($id){
		$this->db->where('id',$id);
		$this->db->delete('currency');
	}

	public function get_website_settings(){
		return $this->db->get('website_settings')->result_array();
	}

	public function update_website_settings($data){
		if(count($this->db->get('website_settings')->result_array()) == 0){
			// Add Data
			$this->db->insert('website_settings',$data);
			$website_settings = $this->get_website_settings();
			$this->session->set_userdata('website_settings',$website_settings);
		}else{
			// Update Data
			$this->db->update('website_settings',$data);

			$website_settings = $this->get_website_settings();
			$this->session->set_userdata('website_settings',$website_settings);

		}
	}

	public function SearchVendor($keyword){
		$this->db->select('*');
		$this->db->from('vendors');
		$this->db->like('full_name',$keyword);
		$this->db->or_like('short_name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}

		public function SearchCurrency($keyword){
		$this->db->select('*');
		$this->db->from('currency');
		$this->db->like('currency_code',$keyword);
		$this->db->or_like('name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}

	public function SearchCustomer($keyword){
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->like('full_name',$keyword);
		$this->db->or_like('short_name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}
	
}

?>
