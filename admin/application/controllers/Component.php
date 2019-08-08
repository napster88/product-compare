<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Component extends CI_Controller {

	  public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('component_model');
		  $this->load->model('project_model');
	 } 
	public function index()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('component');
		$this->load->view('nav/footer');
	
	}
	
	public function add()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('component_add');
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
		$project_title=$this->input->post('component_title');
		$data['component_name']=$project_title;
		if (isset($_FILES['component_image']['name']) && !empty($_FILES['component_image']['name'])) 
		{
			if ( ! $this->upload->do_upload('component_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			}
			else
			{
				$datam = array('upload_data' => $this->upload->data());
				$file_name=$datam['upload_data']['file_name'];
				$data['component_image']=$config['file_name'].$this->upload->data('file_ext');	
			}
		}
		$this->component_model->save($data);
		redirect('component/add');
	}
	public function view()
	{
		$data['project']=$this->project_model->get('projects','*');
		$this->load->view('nav/header');
		$this->load->view('nav/sidebar',$data);
		$this->load->view('nav/headbar');
		$this->load->view('component_view');
		$this->load->view('nav/footer');
	
	}
		
}
?>