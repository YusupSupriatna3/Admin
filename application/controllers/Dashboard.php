<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}
	public function index()
	{
		$data['content'] = 'dashboard/index';
		// $data['user'] = $this->admin_model->userTournament();
		// $data['organizer'] = $this->admin_model->Organizer();
		// $data['caster'] = $this->admin_model->Caster();
		// $data['toornament'] = $this->admin_model->Toornament();
		$data['dashboard'] = $this->admin_model->dashboard();
		$data['popular_game'] = $this->admin_model->popularGame();
		$data['new_user'] = $this->admin_model->newUser();
		$data['new_caster'] = $this->admin_model->newCaster();
		$data['new_toornament'] = $this->admin_model->newToornament();
		$this->load->view('template/layout',$data);
	}

	public function login()
	{
		if (isset($_SESSION['logged_in'])) {
			redirect('dashboard');
		}else {
			if (isset($_POST['btn_login'])) {
			$data['login'] = $this->admin_model->login();
				if ($data['login']!=NULL) {
					$sessdata = array(
					        'admin_id'  => $data['login'][0]['admin_id'],
					        'name'  => $data['login'][0]['name'],
					        'email' => $data['login'][0]['email'],
					        'password' => $data['login'][0]['password'],
					        'status'=> $data['login'][0]['status'],
					        'logo'=> $data['login'][0]['logo'],
					        'logged_in' => TRUE
					);
					$this->session->set_userdata($sessdata);
					redirect('dashboard');
				}else {
					$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Email / Password Tidak ditemukan'));
					redirect(base_url());
				}
			}
		}
		$this->load->view('dashboard/login');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
