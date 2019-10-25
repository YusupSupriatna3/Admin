<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['content'] = 'about/about';
		$data['list'] = $this->admin_model->getAbout();
		$this->load->view('template/layout',$data);
	}

	public function about_add()
	{
		// $data['content'] = 'about/about';
		$data['get'] = $this->admin_model->addAbout();

		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Succes'));
			redirect("about");
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Failed'));
			redirect("about");
		}
	}

	public function about_update($id)
	{
		// $data['content'] = 'about/about';
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['get'] = $this->admin_model->updateAbout($id);

		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Succes'));
			redirect("about");
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Failed'));
			redirect("about");
		}
	}
}
