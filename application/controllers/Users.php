<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("pagination");
	}
	public function index()
	{
		$data['content'] = 'users/users';
		$jumlah_data = $this->admin_model->jumlah_users();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'users/index/';
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
		$data['users'] = $this->admin_model->data_users($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function users_detail($email)
	{
		$email=$this->dataencryption->enc_dec("decrypt", $email);
		$data['detail'] = $this->admin_model->getDetailUser($email);
		$data['content'] = 'users/users-detail';
		$this->load->view('template/layout',$data);	
	}

	public function users_deactive($email,$status)
	{
		$data['status'] = $this->admin_model->updateStatus(strtolower($email),strtolower($status));
		if ($data['status']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Succes'));
			redirect(base_url().'users');
		}else{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Failed'));
			redirect(base_url().'users');
		}
	}

	public function casters()
	{
		// $data['caster'] = $this->admin_model->newCaster();
		$data['content'] = 'users/caster';
		$jumlah_data = $this->admin_model->jumlah_casters();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'users/casters/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
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
		$data['caster'] = $this->admin_model->data_casters($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function casters_detail($email)
	{
		$email = $this->dataencryption->enc_dec('decrypt',$email);
		$data['detail'] = $this->admin_model->getDetailCaster($email);
		$data['content'] = 'users/caster-detail';
		$this->load->view('template/layout',$data);	
	}

	public function casters_deactive($email,$status)
	{
		$data['status'] = $this->admin_model->updateStatusCaster(strtolower($email),strtolower($status));
		if ($data['status']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Succes'));
			redirect(base_url().'users/casters');
		}else{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Failed'));
			redirect(base_url().'users/casters');
		}
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

	public function admin_detail($idAdmin)
	{
		$idAdmin = $this->dataencryption->enc_dec('decrypt',$idAdmin);
		$data['content'] = 'users/admin-detail';
		$data['admin_detail'] = $this->admin_model->getDetailAdmin($idAdmin);
		$this->load->view('template/layout',$data);	
	}

	public function admin_deactive($id,$status)
	{
		$data['status'] = $this->admin_model->updateStatusAdmin(($id),strtolower($status));
		if ($data['status']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Succes'));
			redirect(base_url().'users/admin');
		}else{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Failed'));
			redirect(base_url().'users/admin');
		}	
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
