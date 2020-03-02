<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function user_role()
	{
		$data = array(
			'title' => 'Danh Sách Quyền Hạn',
			'com' => 'user_role',
			'view' => 'list_user_role'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_user_role()
	{
		$data = array(
			'title' => 'Thêm Quyền Hạn',
			'com' => 'user_role',
			'view' => 'insert_user_role'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_user_role()
	{
		$data = array(
			'title' => 'Cập Nhật Quyền Hạn',
			'com' => 'user_role',
			'view' => 'update_user_role'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_name_user_role_addnew()
	{
		$name = $this->input->post('name');
		if($this->user_role_model->check_the_existing_name_user_role_addnew($name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_user_role_addnew','Tên cấp bậc đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_user_role_addnew','Tên cấp bậc không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_user_role_update()
	{
		$id = $this->uri->segment(2);
		$name = $this->input->post('name');
		if($this->user_role_model->check_the_existing_name_user_role_update($id,$name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_user_role_update','Tên cấp bậc đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_user_role_update','Tên cấp bậc không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function process_insert_user_role()
	{
		if(isset($_POST['btn-submit'])):
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Bạn chưa nhập tên cấp bậc'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_user_role_addnew');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->insert_user_role();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status
				);
				$this->user_role_model->insert_user_role($data);
				redirect(base_url('user-role.html'));
			endif;
		endif;
	}

	public function process_update_user_role()
	{
		if(isset($_POST['btn-submit'])):
			$id = $this->uri->segment(2);
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên cấp bậc'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_user_role_update');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->update_user_role();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status
				);
				$this->user_role_model->update_user_role($id,$data);
				redirect(base_url('user-role.html'));
			endif;
		endif;
	}

	public function process_delete_user_role()
	{
		$user_role_id = $this->uri->segment(2);
		$this->user_role_model->delete_user_role($user_role_id);
		redirect(base_url('user-role.html'));
	}
}
