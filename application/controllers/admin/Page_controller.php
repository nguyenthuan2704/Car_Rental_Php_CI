<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function list_page()
	{
		$data = array(
			'title' => 'Danh Sách Các Trang',
			'com' => 'page',
			'view' => 'list_page'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_page()
	{
		$data = array(
			'title' => 'Thêm Trang',
			'com' => 'page',
			'view' => 'insert_page'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_page()
	{
		$data = array(
			'title' => 'Cập Nhật Trang',
			'com' => 'page',
			'view' => 'update_page'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_name_page_addnew()
	{
		$name = $this->input->post('name');
		if($this->page_model->check_the_existing_name_page_addnew($name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_page_addnew','Tiêu đề trang đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_page_addnew','Tiêu đề trang không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_page_update()
	{
		$id = $this->uri->segment(2);
		$name = $this->input->post('name');
		if($this->page_model->check_the_existing_name_page_update($id,$name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_page_update','Tiêu đề trang đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_page_update','Tiêu đề trang không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function process_insert_page()
	{
		if(isset($_POST['insert-page-submit'])):
			$name = $this->input->post('name');
			$content = $this->input->post('content');
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Bạn chưa nhập tiêu đề trang'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_page_addnew');
			endif;
				$this->form_validation->set_rules('content','content','trim|required|xss_clean',array('required' => 'Bạn chưa nhập nội dung trang'));
			if($this->form_validation->run() == FALSE):
				$this->insert_page();
			else:
				$data = array(
					'name' => $name,
					'content' => $content,
					'status' => $status
				);
				$this->page_model->insert_page($data);
				redirect(base_url('list-page.html'));
			endif;
		endif;
	}

	public function process_update_page()
	{
		if(isset($_POST['update-page-submit'])):
			$id = $this->uri->segment(2);
			$name = $this->input->post('name');
			$content = $this->input->post('content');
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Bạn chưa nhập tiêu đề trang'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_page_update');
			endif;
				$this->form_validation->set_rules('content','content','trim|required|xss_clean',array('required' => 'Bạn chưa nhập nội dung trang'));
			if($this->form_validation->run() == FALSE):
				$this->update_page();
			else:
				$data = array(
					'name' => $name,
					'content' => $content,
					'status' => $status
				);
				$this->page_model->update_page($id,$data);
				redirect(base_url('list-page.html'));
			endif;
		endif;
	}

	public function process_delete_page()
	{
		$page_id = $this->uri->segment(2);
		$this->page_model->delete_page($page_id);
		redirect(base_url('list-page.html'));
	}
}
