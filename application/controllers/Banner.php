<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('admin_model');
	}

	public function index()
	{

		$data['content'] = 'banner/banner';
		$config['base_url'] = base_url().'banner/index'; //site url
        $config['total_rows'] = $this->db->count_all('banner'); //total row
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
        $data['list'] = $this->admin_model->get_banner_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('template/layout',$data);
	}

	public function banner_add()
	{
		$data['list'] = $this->admin_model->getAllBanner();
		$data['content'] = 'banner/banner-add';
		$this->load->view('template/layout',$data);
	}

	public function banner_edit($id)
	{
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'banner/banner-edit';
		$data['edit'] = $this->admin_model->getBannerById($id);
		$this->load->view('template/layout',$data);
	}

	public function proses_edit_banner($id)
	{
		$banner_id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'banner/banner';
		$data['get'] = $this->admin_model->editBanner($banner_id);

		if ($data['get'] ) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Update Succes'));
			redirect("banner/banner_edit/".$this->dataencryption->enc_dec("encrypt",$banner_id));
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Update Failed'));
			redirect("banner/banner_edit/".$this->dataencryption->enc_dec("encrypt",$banner_id));
		}
		
	}

	public function banner_edit_status($id,$status = NULL){
		$banner_id=$this->dataencryption->enc_dec("decrypt", $id);
		if ($status == "inactive") {
			$status = "active";
		}
		else
		{
			$status = 'inactive';
		}
		
		$data['content'] = 'banner/banner';
		$data['get'] = $this->admin_model->deactiveBanner($banner_id, $status);

		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> ' Succes'));
			redirect("banner");
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> ' Failed'));
			redirect("banner");
		}
	}

	public function proses_add_banner()
	{
		$data['add'] = $this->admin_model->prosesAddBanner();
		if ($data['add']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Succes'));
			redirect("banner-add");
		}
		else
		{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Failed'));
			redirect("banner-add");
		}
	}

	public function banner_detail($id)
	{
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'banner/banner-detail';
		$data['detail'] = $this->admin_model->getBannerById($id);
		$this->load->view('template/layout',$data);
	}

	public function blog_delete($id)
	{
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		echo $id; die();
		$data['delete'] = $this->admin_model->deleteBlog($id);
		if ($data['delete']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Delete Succes'));
			redirect("blog");
		}
		else
		{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Delete Failed'));
			redirect("blog");
		}
	}


	
}
