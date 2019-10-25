<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("pagination");
	}
	public function game_list()
	{
		$data['content'] = 'game/game';
		$jumlah_data = $this->admin_model->jumlah_games();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'games/game_list/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;
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
		$data['game'] = $this->admin_model->data_games($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function game_add()
	{
		$data['content'] = 'game/game-add';
		$data['platform_game'] = $this->admin_model->platform_game();
		$data['category_game'] = $this->admin_model->category_game();
		if (isset($_POST['btn_game_add'])) {
			$data['game_add']= $this->admin_model->game_add();
			if ($data['game_add']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Game Succes'));
				redirect(base_url().'games/game_list');
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Game Failed'));
				redirect(base_url().'games/game_list');
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function game_edit($idGame)
	{
		$idGame = $this->dataencryption->enc_dec('decrypt',$idGame);
		$data['content'] = 'game/game-edit';
		$data['game_edit'] = $this->admin_model->game_edit($idGame);

		$data['platform_game'] = $this->admin_model->platform_game();
		
		$data['platform_game_detail'] = $this->admin_model->platform_game_detail($idGame);

		$data['plt_game'] = array();
		$data['plt_id'] = array();
		for ($i=0; $i < sizeof($data['platform_game']); $i++) {
			$data['plt_game'][$i]=$data['platform_game'][$i];
				for ($a=0; $a < sizeof($data['platform_game_detail']); $a++) {
					if ($data['plt_game'][$i]['platform_id']==$data['platform_game_detail'][$a]['platform_id']) {
						$data['plt_id'][$a] = $data['plt_game'][$i]['platform_id'];
					}
				}
		}
		$data['category_game'] = $this->admin_model->category_game();
		$data['category_detail'] = $this->admin_model->category_detail($idGame);
		$data['ct_game'] = array();
		$data['ct_id'] = array();
		for ($i=0; $i < sizeof($data['category_game']); $i++) {
			$data['ct_game'][$i]=$data['category_game'][$i];
				for ($a=0; $a < sizeof($data['category_detail']); $a++) {
					if ($data['ct_game'][$i]['category_id']==$data['category_detail'][$a]['category_id']) {
						$data['ct_id'][$a] = $data['ct_game'][$i]['category_id'];
					}
				}
		}
		$this->load->view('template/layout',$data);	
	}

	public function game_edit_proses($idGame)
	{
		$idGame = $this->dataencryption->enc_dec('decrypt',$idGame);
		$data['game_edit_proses'] = $this->admin_model->game_edit_proses($idGame);
		$data['game_edit_category'] = $this->admin_model->game_edit_category($idGame);
		$data['game_edit_platform'] = $this->admin_model->game_edit_platform($idGame);
		if ($data['game_edit_proses']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Edit Game Succes'));
			redirect(base_url().'games/game_edit/'.$this->dataencryption->enc_dec('encrypt',$idGame));
		}else{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Edit Game Failed'));
			redirect(base_url().'games/game_edit/'.$this->dataencryption->enc_dec('encrypt',$idGame));
		}
	}

	public function game_detail($idGame)
	{
		$idGame = $this->dataencryption->enc_dec('decrypt',$idGame);
		$data['content'] = 'game/game-detail';
		$data['game_detail'] = $this->admin_model->game_detail($idGame);
		$data['platform_game_id'] = $this->admin_model->platform_game_id($idGame);
		$this->load->view('template/layout',$data);	
	}

	public function game_delete($idGame)
	{
		// $idGame = $this->dataencryption->enc_dec('decrypt',$idGame);
		// $data['content'] = 'game/game-detail';
		$data['delete_game'] = $this->admin_model->game_delete($idGame);
		$data['delete_category'] = $this->admin_model->game_delete_category($idGame);
		$data['delete_platform'] = $this->admin_model->game_delete_platform($idGame);
		if ($data['delete_game']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Delete Game Succes'));
			redirect(base_url().'games/game_list');
		}else{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Delete Game Failed'));
			redirect(base_url().'games/game_list');
		}
		
		// $this->load->view('template/layout',$data);	
	}

	public function category()
	{
		$data['content'] = 'game/category';
		$jumlah_data = $this->admin_model->jumlah_category();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'games/category/';
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
		$data['category'] = $this->admin_model->data_category($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function category_add()
	{
		$data['content'] = 'game/category-add';
		if (isset($_POST['btn_category'])) {
			$data['category'] = $this->admin_model->category_add();
			if ($data['category']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Category Succes'));
				redirect(base_url().'games/category');
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Category Failed'));
				redirect(base_url().'games/category_add');
			}
		}
		$this->load->view('template/layout',$data);	
	}

	public function category_deactive()
	{
		$data['content'] = 'game/category-add';
		$this->load->view('template/layout',$data);	
	}

	public function platform()
	{
		$data['content'] = 'game/platform';
		$jumlah_data = $this->admin_model->jumlah_platform();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'games/platform/';
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
		$data['platform'] = $this->admin_model->data_platform($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function platform_add()
	{
		$data['content'] = 'game/platform-add';
		if (isset($_POST['btn_platform'])) {
			$data['platform'] = $this->admin_model->platform_add();
			if ($data['platform']) {
				$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Platform Succes'));
				redirect(base_url().'games/platform');
			}else{
				$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Platform Failed'));
				redirect(base_url().'games/platform_add');
			}
		}
		$this->load->view('template/layout',$data);
	}

	public function platform_deactive()
	{
		$data['content'] = 'game/platform-add';
		$this->load->view('template/layout',$data);
	}

	public function platform_search()
	{
		$data['content'] = 'game/platform-search';
		$this->load->view('template/layout',$data);
	}
}
