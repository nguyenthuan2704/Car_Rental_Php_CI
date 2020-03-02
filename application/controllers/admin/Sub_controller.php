<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function sub()
	{
		$data = array(
			'title' => 'Danh Sách Đăng Ký Nhận Tin',
			'com' => 'sub',
			'view' => 'list_sub'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_email_subscriber_addnew()
	{
		$email = $this->input->post('email');
		if($this->user_model->check_the_existing_email_subscriber_addnew($email) == FALSE):
			$this->form_validation->set_message('check_the_existing_email_subscriber_addnew','Email đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($email, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_email_subscriber_addnew','Email không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	// public function process_sub_user()
	// {
	// 	if(isset($_POST['btn-submit'])):
	// 		$email = $this->input->post('email');
	// 		if($email == ""):
	// 			$this->form_validation->set_rules('email','email','trim|required|xss_clean',array('required' => 'Không được bỏ trống email'));
	// 		else:
	// 			$this->form_validation->set_rules('email','email','callback_check_the_existing_email_subscriber_addnew');
	// 		endif;
	// 		if($this->form_validation->run() == FALSE):

	// 			$this->load->view('user/modules/footer.php');
	// 		else:
	// 			$data = array(
	// 				'email' => $email
	// 			);
	// 			$this->user_model->insert_subscriber($data);
	// 			redirect(base_url('index.html'));
	// 		endif;
	// 	endif;
	// }
	public function process_sub_user()
	{
		if(isset($_POST['btn-submit'])):
			$email = $this->input->post('email');
			$data = array(
				'email' => $email
			);
			$this->user_model->insert_subscriber($data);
			redirect(base_url('index.html'));
		endif;
	}

	public function process_unsub_user()
	{
		$id = $this->uri->segment(2);
		$status = 0;
		$data = array(
			'status' => $status
		);
		$this->user_model->update_subscriber($id,$data);
		redirect(base_url("sub.html"));
	}

}

?>