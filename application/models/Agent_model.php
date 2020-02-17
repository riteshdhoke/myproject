<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_model extends CI_Model {

	public function get_agent($keyword = ''){
		

		if($keyword == ''){
			return $this->db->get('agents')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('agents');
			$this->db->like('full_name',$keyword);
			return $this->db->get()->result_array();
		}

	}

	public function get_agent_limits($params = array(),$keyword = ''){
		$this->db->select('*');
		$this->db->from('agents');
		if($keyword != ''){
			$this->db->like('full_name',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}


	public function get_agent_group_limits($params = array(),$keyword =''){
		$this->db->select('*');
		$this->db->from('agent_group');
		if($keyword != ''){
			$this->db->like('name',$keyword);
			$this->db->or_like('group_id',$keyword);
		}
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        return $this->db->get()->result_array();
	}

		public function add_agent($data){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->insert('agents',$data);
			redirect('Agent');
		
	}

	public function add_agent_group($data){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->insert('agent_group',$data);
			redirect('Agent/Agent_group');
		
	}

	public function get_agent_by_id($id){
		return $this->db->get_where('agents',array('id' => $id))->result_array();
	}


	public function get_agent_group_by_id($id){
		return $this->db->get_where('agent_group',array('id' => $id))->result_array();
	}

	public function delete_agent($id){
		$this->db->where('id',$id);
		$this->db->delete('agents');
	}
	public function delete_agent_group($id){
		$this->db->where('id',$id);
		$this->db->delete('agent_group');
	}


	public function update_agent($data,$id){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->where('id',$id);
			$this->db->update('agents',$data);
			redirect('Agent');
		
	}

	public function update_agent_group($data,$id){
		// check code and country name already present and then add to ciurrency table
		
			$this->db->where('id',$id);
			$this->db->update('agent_group',$data);
			redirect('Agent/Agent_group');
		
	}


	public function get_agent_groups($keyword = ''){

		if($keyword == ''){
			return $this->db->get('agent_group')->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('agent_group');
			$this->db->like('group_id',$keyword);
			$this->db->or_like('name',$keyword);
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

	public function SearchAgent($keyword){
		$this->db->select('*');
		$this->db->from('agents');
		$this->db->like('full_name',$keyword);
		$this->db->or_like('short_name',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}


	public function SearchAgentGroup($keyword){
		$this->db->select('*');
		$this->db->from('agent_group');
		$this->db->like('name',$keyword);
		$this->db->or_like('group_id',$keyword);
		

		$result_array = $this->db->get()->result_array();
		
		return $result_array;
	}





}