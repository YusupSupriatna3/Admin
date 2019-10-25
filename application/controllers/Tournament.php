<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("pagination");
	}
	public function index()
	{
		$data['content'] = 'tournament/tournament';
		$jumlah_data = $this->admin_model->jumlah_tournaments();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'tournament/index/';
		$config['total_rows'] = $jumlah_data;
		if (!empty($this->input->post('no'))) {
			$config['per_page'] = $this->input->post('no');
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
		$data['tournament'] = $this->admin_model->data_tournaments($config['per_page'],$from);
		$this->load->view('template/layout',$data);
	}

	public function tournament_detail($idTournament)
	{
		$data['content'] = 'tournament/tournament-detail';
		$config['base_url'] = base_url().'tournament-detail/'.$idTournament; //site url
		$idTournament = $this->dataencryption->enc_dec('decrypt',$idTournament);
		$data['data_participant'] = $this->admin_model->data_participants($idTournament);
        $config['total_rows'] = sizeof($data['data_participant']); //total row
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];

        $config["num_links"] = floor($choice);
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list'] = $this->admin_model->get_data_list($idTournament, $config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();

		$data['tournament_detail'] = $this->admin_model->tournament_detail($idTournament);
		$data['content'] = 'tournament/tournament-detail';
		$this->load->view('template/layout',$data);
	}

	public function tournament_active()
	{
		$data['content'] = 'tournament/tournament-detail';
		$this->load->view('template/layout',$data);
	}

	public function tournament_search()
	{
		$data['content'] = 'tournament/tournament-detail';
		$this->load->view('template/layout',$data);
	}

	public function accept()
	{
		$this->admin_model->accept_tournament();
		redirect(base_url().'tournament/tournament_detail/'.$this->dataencryption->enc_dec('encrypt',$this->input->post('id')));
	}
}
