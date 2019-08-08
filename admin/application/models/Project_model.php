<?php
class Project_model extends CI_Model {
       
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
	public function get_project($id)
	{
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->where_in('id',$id);
		return $this->db->get()->result_array();
	}
	public function get_template($project_id)
	{
		$this->db->select('ptr.project_id,ptr.template_id,tmp.template_title,tmp.component_order,tmp.component_list,pr.project_name, pr.project_image');
		$this->db->from('project-template-relationship ptr');
		$this->db->join('templates tmp', 'ptr.template_id = tmp.id','left');
		$this->db->join('projects pr', 'pr.id = ptr.project_id','left');
		$this->db->where('ptr.project_id',$project_id);
		return $this->db->get()->result_array();
	}
	public function save($data)
	{
		$this->db->insert('projects', $data);
	}
	public function get_components($table,$data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where_in('id',$data);
		return $this->db->get()->result_array();
	}
}

?>