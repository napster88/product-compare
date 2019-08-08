<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	  public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('template_model');
		  $this->load->model('project_model');
	 } 
	public function index()
	{
		$data['project']=$this->template_model->get_project_wo_template();
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('project');
		$this->load->view('nav/footer');
	
	}
	
	public function component()
	{
		$data['project']=$this->project_model->get('projects','*');
		$data['component']=$this->template_model->get('components','id,component_name');
		$data['dimension']=$this->template_model->get('dimensions','id,dimension_name');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('component-dimension',$data);
		$this->load->view('nav/footer');
	
	}
	
	
	public function project()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('project-component');
		$this->load->view('nav/footer');
	
	}
	public function add_component_dimension()
	{		
		$data['component_id']=$this->input->post('component');
		$data['dimension_id']=serialize($this->input->post('dimension'));
		$this->template_model->save_component_dimension($data);
		redirect('template/component');
	}
	
	public function create()
	{
		$data['project']=$this->project_model->get('projects','*');
		//$data['project']=$this->template_model->get('projects','id,project_name');
		/* $data['component']=$this->template_model->get('components','id,component_name');
		$data['dimension']=$this->template_model->get('dimensions','id,dimension_name'); */
		$component=$this->template_model->get_component();
		$component_array=array();
		foreach($component as $key=>$val)
		{
				$dim_id =unserialize($val['dimension_id']);	
				$dim_array=array();
				foreach($dim_id as $dim_id)
				{
					$dim_detail=$this->template_model->get_dim($dim_id);
					$dim_array[$dim_detail[0]['id']]=$dim_detail[0]['dimension_name'];
			
				}
				$component_array[]=array(
							'component_id' =>$val['component_id'],
							'component_name' =>$val['component_name'],
							'dimension_detail'=>$dim_array
						);
		}
		
		$data['component']=$component_array;
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('create_template',$data);
		$this->load->view('nav/footer');
	}
	public function add()
	{
		$data['project']=$this->template_model->get('projects','id,project_name');
		$data['project_list_wo_temp']=$this->template_model->get_project_wo_template();
		/* $data['component']=$this->template_model->get('components','id,component_name');
		$data['dimension']=$this->template_model->get('dimensions','id,dimension_name'); */
		$component=$this->template_model->get_component();
		$component_array=array();
		foreach($component as $key=>$val)
		{
				$dim_id =unserialize($val['dimension_id']);	
				$dim_array=array();
				foreach($dim_id as $dim_id)
				{
					$dim_detail=$this->template_model->get_dim($dim_id);
					$dim_array[$dim_detail[0]['id']]=$dim_detail[0]['dimension_name'];
			
				}
				$component_array[]=array(
							'component_id' =>$val['component_id'],
							'component_name' =>$val['component_name'],
							'component_image' =>$val['component_image'],
							
							'dimension_detail'=>$dim_array
						);
		}
		
		$data['component']=$component_array;
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('template_add',$data);
		$this->load->view('nav/footer');
	}
	public function save_template()
	{
		$data= $this->input->post('fields');
		$temp=array('template_title'=>$data['title'],
				'component_order'=>serialize($data['order']),
				'component_list'=>serialize($data['list']),
				);
				$project=$data['projects'];
		$template_id=$this->template_model->save_template('templates',$temp);
		foreach($project as $key=>$val)
		{
		
			$data=array('project_id'=>$val,
			'template_id'=>$template_id
			);
			$this->template_model->save_template('project-template-relationship',$data);
		}
	}
}
?>