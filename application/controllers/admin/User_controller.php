<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function user()
	{
		$data = array(
			'title' => 'Danh Sách Thành Viên',
			'com' => 'member',
			'view' => 'list_member'
		);
		$this->load->view('admin/layout',$data);
	}

	public function user_deleted()
	{
		$data = array(
			'title' => 'Danh Sách Thành Viên Đã Xóa',
			'com' => 'member',
			'view' => 'list_member_deleted'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_user()
	{
		$data = array(
			'title' => 'Cập Nhật Thành Viên',
			'com' => 'member',
			'view' => 'update_member'
		);
		$this->load->view('admin/layout',$data);
	}

	public function process_update_user()
	{
		if(isset($_POST['btn-submit'])):
	    	$id = $this->uri->segment(2);
	        $status = $this->input->post('status');
	            $data = array(
	                    'status' => $status
	                );
	            $this->user_model->update_user($id,$data);
	            redirect(base_url('user.html'));
		endif;
	}

	public function process_delete_user()
	{
		$id = $this->uri->segment(2);
		$status = 0;
		$deleted = 1;
		$data = array(
			'status' => $status,
			'deleted' => $deleted
		);
		$this->user_model->update_user($id,$data);
		redirect(base_url('user.html'));
	}

	public function process_restore_user()
	{
		$id = $this->uri->segment(2);
		$status = 1;
		$deleted = 0;
		$data = array(
			'status' => $status,
			'deleted' => $deleted
		);
		$this->user_model->update_user($id,$data);
		redirect(base_url('user-deleted.html'));
	}

	public function process_remove_user()
	{
		$user_id = $this->uri->segment(2);
		$this->user_model->remove_user($user_id);
		redirect(base_url('user-deleted.html'));
	}

}

?>