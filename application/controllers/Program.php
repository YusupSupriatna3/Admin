<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("pagination");
	}
	public function index()
	{
		$data['content'] = 'program/program';
		$jumlah_data = $this->admin_model->jumlah_users();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'program/index/';
		$config['total_rows'] = $jumlah_data;
		if (!empty($_POST)) {
			$tamp = $this->input->post();
			$config['per_page'] = $tamp['no'];
		}else{
			$config['per_page'] = 10;
		}
		$from = $this->uri->segment(3);
		$config['full_tag_open'] = "<ul class='pagination'>";
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li>';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';



	    $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';


	    $config['next_link'] = '<i class="material-icons">chevron_right</i>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);		
		$data['program'] = $this->admin_model->data_program($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function program_add()
	{
		$data['content'] = 'program/program-add';
		$data['payment'] = $this->admin_model->getPayment();
		$data['game'] = $this->admin_model->getGame();
		$data['tournament'] = $this->admin_model->getTournament();
		if (isset($_POST['btn-add'])) {
			echo "<pre>";
				print_r($_POST);
			echo "</pre>";
			die();
			$data['admin_add'] = $this->admin_model->admin_add();
			if ($data['admin_add']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Admin Succes'));
				redirect(base_url().'program/program');
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Admin Failed'));
				redirect(base_url().'program/program');
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function program_edit($idProgram)
	{
		$idProgram = $this->dataencryption->enc_dec('decrypt',$idProgram);
		$data['content'] = 'program/program-edit';
		$data['program'] = $this->admin_model->getDetailProgram($idProgram);
		$data['payment'] = $this->admin_model->getPayment();
		if (isset($_POST['btn-edit'])) {
			$data['program_edit'] = $this->admin_model->program_edit($idProgram);
			if ($data['program_edit']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Edit Program Succes'));
				redirect(base_url().'program/program_edit/'.$this->dataencryption->enc_dec('encrypt',$idProgram));
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Edit Program Failed'));
				redirect(base_url().'program/admin_edit/'.$this->dataencryption->enc_dec('encrypt',$idProgram));
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function admin()
	{
		$data['content'] = 'users/admin';
		$jumlah_data = $this->admin_model->jumlah_admin();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'users/admin/';
		$config['total_rows'] = $jumlah_data;
		if (!empty($_POST)) {
			$tamp = $this->input->post();
			$config['per_page'] = $tamp['no'];
		}else{
			$config['per_page'] = 10;
		}
		$from = $this->uri->segment(3);
		$config['full_tag_open'] = "<ul class='pagination'>";
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li>';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';


	    $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';


	    $config['next_link'] = '<i class="material-icons">chevron_right</i>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);		
		$data['admin'] = $this->admin_model->data_admin($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function admin_add()
	{
		$data['content'] = 'users/admin-add';
		if (isset($_POST['btn-add'])) {
			$data['admin_add'] = $this->admin_model->admin_add();
			if ($data['admin_add']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Admin Succes'));
				redirect(base_url().'users/admin');
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Admin Failed'));
				redirect(base_url().'users/admin');
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function admin_edit($idAdmin)
	{
		$idAdmin = $this->dataencryption->enc_dec('decrypt',$idAdmin);
		$data['content'] = 'users/admin-edit';
		$data['admin'] = $this->admin_model->getDetailAdmin($idAdmin);
		if (isset($_POST['btn-edit'])) {
			$data['admin_edit'] = $this->admin_model->admin_edit($idAdmin);
			if ($data['admin_edit']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Edit Admin Succes'));
				redirect(base_url().'users/admin_edit/'.$this->dataencryption->enc_dec('encrypt',$idAdmin));
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Edit Admin Failed'));
				redirect(base_url().'users/admin_edit/'.$this->dataencryption->enc_dec('encrypt',$idAdmin));
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function profile()
	{
		$data['content'] = 'users/profile';
		$this->load->view('template/layout',$data);	
	}

	public function setting()
	{
		$data['content'] = 'users/setting';
		$this->load->view('template/layout',$data);	
	}
}
