<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Port_model extends CI_Model {

	public function get_port($keyword = ''){

		if($keyword == ''){
			return $this->db->get('port')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('port');
			$this->db->like('code',$keyword);
			$this->db->or_like('name',$keyword);
			return $this->db->get()->result_array();
		}

	}

	public function get_port_limits($params = array(),$keyword = ''){
		$this->db->select('*');
		$this->db->from('port');
		if($keyword != ''){
			$this->db->like('code',$keyword);
			$this->db->or_like('name',$keyword);
		}

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


	public function SearchPort($keyword){
		$this->db->select('*');
		$this->db->from('port');
		$this->db->like('code',$keyword);
		$this->db->or_like('name',$keyword);

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}

}