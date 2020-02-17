<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {

	public function get_country($keyword = ''){
		if($keyword == ''){
			return $this->db->get('country')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->like('country_code',$keyword);
			$this->db->or_like('country_name',$keyword);
			return $this->db->get()->result_array();
		}
	}

	public function get_country_limits($params = array(),$keyword = ''){
		$this->db->select('*');
		$this->db->from('country');
		if($keyword != ''){
			$this->db->like('country_code',$keyword);
			$this->db->or_like('country_name',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}

		public function add_country($data){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('country'); 
		$this->db->where('country_code',$data['country_code']); 
		$this->db->or_where('country_name',$data['country_name']);
		$result = $this->db->get()->result_array();

		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->insert('country',$data);
			redirect('Country');
		}
		
	}

	public function get_country_by_id($id){
		return $this->db->get_where('country',array('id' => $id))->result_array();
	}

	public function delete_country($id){
		$this->db->where('id',$id);
		$this->db->delete('country');
	}

	public function update_country($data,$id){
		// check code and country name already present and then add to ciurrency table
		$this->db->select('*');
		$this->db->from('country'); 
		$where = "id != ".$id." AND (country_code = '".$data['country_code']."' OR country_name = '".$data['country_name']."')";
		$this->db->where($where); 
		$result = $this->db->get()->result_array();
		if(count($result) > 0){
			echo "data already exist";
		}else{
			$this->db->where('id',$id);
			$this->db->update('country',$data);
			redirect('Country');
		}
		
	}

	public function SearchCountry($keyword){
		$this->db->select('*');
		$this->db->from('country');
		$this->db->like('country_code',$keyword);
		$this->db->or_like('country_name',$keyword);

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}

}