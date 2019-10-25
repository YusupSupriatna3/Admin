<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('admin_model');
	}

	public function index()
	{

		$data['content'] = 'blog/blog';
		$config['base_url'] = base_url().'blog/index'; //site url
        $config['total_rows'] = $this->db->count_all('blog'); //total row
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
        $data['list'] = $this->admin_model->get_blog_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('template/layout',$data);
	}

	public function blog_add()
	{
		$data['content'] = 'blog/blog-add';
		$this->load->view('template/layout',$data);
	}

	public function blog_edit($id)
	{
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'blog/blog-edit';
		$data['edit'] = $this->admin_model->getBlogById($id);
		$this->load->view('template/layout',$data);
	}

	public function proses_edit_blog($id)
	{
		$idBlog=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'blog/blog';
		$data['get'] = $this->admin_model->editBlog($idBlog);

		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Update Succes'));
			redirect("blog/blog_edit/".$this->dataencryption->enc_dec("encrypt",$idBlog));
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Update Failed'));
			redirect("blog/blog_edit/".$this->dataencryption->enc_dec("encrypt",$idBlog));
		}
		
	}

	public function blog_edit_status($id,$status = NULL){
		$idBlog=$this->dataencryption->enc_dec("decrypt", $id);
		if ($status == "inactive") {
			$status = "active";
		}
		else
		{
			$status = 'inactive';
		}
		
		$data['content'] = 'blog/blog';
		$data['get'] = $this->admin_model->deactiveBlog($idBlog, $status);

		if ($data['get']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> ' Succes'));
			redirect("blog");
		}
		else {
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> ' Failed'));
			redirect("blog");
		}
	}

	public function proses_add_blog()
	{
		$data['add'] = $this->admin_model->prosesAddBlog();
		if ($data['add']) {
			$this->session->set_flashdata('msg', array('class' => 'info', 'message'=> 'Add Succes'));
			redirect("blog-add");
		}
		else
		{
			$this->session->set_flashdata('msg', array('class' => 'danger', 'message'=> 'Add Failed'));
			redirect("blog-add");
		}
	}

	public function blog_detail($id)
	{
		$id=$this->dataencryption->enc_dec("decrypt", $id);
		$data['content'] = 'blog/blog-detail';
		$data['detail'] = $this->admin_model->getBlogById($id);
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
