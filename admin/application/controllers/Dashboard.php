<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->view('dashboard');
		$this->load->view('nav/footer');
	
	}
	
}
?>