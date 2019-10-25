<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stream extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['content'] = 'stream/stream';
		$config['base_url'] = base_url().'stream/index'; //site url
        $config['total_rows'] = $this->db->count_all('streams'); //total row
        $config['per_page'] = 10;  //show record per halaman
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
        $data['list'] = $this->admin_model->get_stream_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('template/layout',$data);


		// $data['content'] = 'stream/stream';
		// $data['list'] = $this->admin_model->getAllStream();
		// $this->load->view('template/layout',$data);
	}

	public function stream_add()
	{
		$data['content'] = 'stream/stream-add';
		$this->load->view('template/layout',$data);
	}

	public function stream_edit($id)
	{
		$idStreams=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'stream/stream-edit';
		$data['get'] = $this->admin_model->getStreamById($idStreams);
		$this->load->view('template/layout',$data);
	}

	public  function prosess_stream_add()
	{
		$data['add'] = $this->admin_model->prosesAddStream();
		if ($data['add']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Succes'));
			redirect("stream");
		}
		else
		{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Failed'));
			redirect("stream");
		}
	}

	public  function  proses_edit_stream($id)
	{
		$idStreams=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'stream/stream';
		$data['get'] = $this->admin_model->editStream($idStreams);
		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Update Succes'));
			redirect("stream/stream_edit/".$this->dataencryption->enc_dec("encrypt",$idStreams));
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Update Failed'));
			redirect("stream/stream_edit/".$this->dataencryption->enc_dec("encrypt",$idStreams));
		}
		
	}

	public function stream_detail($id)
	{
		$idStreams=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'stream/stream-detail';
		$data['detail'] = $this->admin_model->getStreamById($idStreams);
		$this->load->view('template/layout',$data);
	}

	public function stream_delete($id)
	{
		$data['delete'] = $this->admin_model->deleteStream($id);
		if ($data['delete']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Delete Succes'));
			redirect("stream");
		}
		else
		{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Delete Failed'));
			redirect("stream");
		}
	}

	public function stream_search()
	{
		$data['content'] = 'stream/stream';
		$this->load->view('template/layout',$data);
	}
}
