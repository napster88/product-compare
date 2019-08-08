<?php
class Component_model extends CI_Model {
       
	function __contruct()
	{
		parent::__construct();
	}
	public function get($table,$field)
	{
		$this->db->select($field);
		$this->db->from($table);
		return $this->db->get()->result_array();
	}
	public function get_token($table,$field,$userid)
	{
		
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where('userid',$userid);
		
		return $this->db->get()->result_array();
	}

	public function update($table,$data,$id)
	{
	  $data['accessToken']=$data['access_token'];
	  unset($data['access_token']);
	  $this->db->update($table, $data, array('userid' => $id));
	}
	
	public function save($data)
	{
		$this->db->insert('components', $data);
	}

       

}

?>