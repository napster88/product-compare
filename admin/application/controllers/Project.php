<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	  public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('project_model');
		 
	 } 
	public function index()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('project');
		$this->load->view('nav/footer');
	
	}
	
	public function add_project_listing()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('project_add');
		$this->load->view('nav/footer');
	
	}
	public function create($project)
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('project_add');
		$this->load->view('nav/footer');
	
	}
	public function add($id)
	{
		$data['render_template']=$this->get_template_field($id);
		$data['template']= $this->project_model->get_template($id);
		$data['project_title']=$this->project_model->get_project($id);
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('add',$data);
		$this->load->view('nav/footer');
	
	}
	public function get_template_field($id)
	{
		$template= $this->project_model->get_template($id);
		
		if(count($template)>=1):
		$order=unserialize($template[0]['component_order']);
		$list=unserialize($template[0]['component_list']);
		$order=array_filter($order);
		$list=array_filter($list);
		$render_template=array();
		foreach($order as $key=>$val)
		{
			$dim=implode( ',', $list[$val]);
			$component= $this->project_model->get_components('components',$val);
			$dimension=$this->project_model->get_components('dimensions',$list[$val]);
			$template_component['component']=$component;
			$template_component['dimension']=$dimension;
			$render_template[]=$template_component;
		}
		return $render_template;
		endif;
	}
	public function view($id)
	{
		$data['render_template']=$this->get_template_field($id);
		$data['project_title']=$this->project_model->get_project($id);
		$data['template']=$this->project_model->get_template($id);
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('view',$data);
		$this->load->view('nav/footer');
	
	}
	public function do_upload()
	{
		$config['upload_path']          = 'application/web/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name'] = rand(10000,999999999);
		//$config['max_size']             = 100;
		// $config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		$project_title=$this->input->post('product_title');
		$data['project_name']=$project_title;
		if (isset($_FILES['project_image']['name']) && !empty($_FILES['project_image']['name'])) 
		{
			if ( ! $this->upload->do_upload('product_image'))
			{
					$error = array('error' => $this->upload->display_errors());
							print_r($error);
			}
			else
			{
					$datam = array('upload_data' => $this->upload->data());
					$file_name=$datam['upload_data']['file_name'];
					
					$data['project_image']=$config['file_name'].$this->upload->data('file_ext');
					
			}
		}
		
		$this->project_model->save($data);
		redirect('project/add_project_listing');
	}
	
	
	
}
?>