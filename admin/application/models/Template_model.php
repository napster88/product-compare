<?php
class Template_model extends CI_Model {
       
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
	public function get_project_wo_template()
	{
		$this->db->select('projects.*,ptr.project_id');
		$this->db->from('projects');
		$this->db->join('project-template-relationship ptr', 'projects.id = ptr.project_id','left outer');
		$this->db->where('ptr.project_id IS NULL',null,false);
		//$this->db->where('projects.id IS NULL');
		return $this->db->get()->result_array();
	}
	public function save_template($table, $data)
	{
		$this->db->insert($table, $data);
		return $insertId = $this->db->insert_id();
	}
	public function save_component_dimension($data)
	{
		$this->db->insert('component-dimension-relationship', $data);
	}
	public function get_component()
	{
		$this->db->select('cdr.id as cdr_id, cdr.component_id as component_id, ,components.component_name,components.component_image,cdr.dimension_id');
		//,dimensions.id as dimension_id, dimensions.dimension_name');
		$this->db->from('component-dimension-relationship cdr');
		$this->db->join('components', 'components.id = cdr.component_id');
		return $this->db->get()->result_array();
	}
  	public function get_dim($dim_id)
	{
		$this->db->select('*');
		$this->db->from('dimensions');
		$this->db->where('id',$dim_id);
		return $this->db->get()->result_array();
	}
}
?>