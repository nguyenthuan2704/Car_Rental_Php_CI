<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Đăng Nhập',
			'com' => 'login',
			'view' => 'index'
		);
		$this->load->view('admin/components/login/index',$data);
	}

	public function check_xss_clean_username()
	{
		$username = $this->input->post('username');
		if($this->security->xss_clean($username,TRUE) === FALSE):
			return FALSE;
		else:
			return TRUE;
		endif;
	}

	public function check_xss_clean_password()
	{
		$password = $this->input->post('password');
		if($this->security->xss_clean($password,TRUE) === FALSE):
			return FALSE;
		else:
			return TRUE;
		endif;
	}

	public function process_login()
	{
		if(isset($_POST['login-submit'])):
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->form_validation->set_rules('username','username','trim|callback_check_xss_clean_username');
			$this->form_validation->set_rules('password','password','trim|callback_check_xss_clean_password');
			if($this->form_validation->run() == FALSE):
				$this->index();
			else:
				$user = $this->login_model->get_user_by_username($username);
				if(! $user):
					$data['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
					$this->load->view('admin/components/login/index',$data);
				else:
					$hash = $user->password;
					if(password_verify($password,$hash) == TRUE):
						if($user->status == 1):
							$this->session->set_userdata('username',$username);
							redirect(base_url('admin.html'));
						endif;
					else:
						$attemp = $this->session->userdata('attemp');
						$attemp++;
						$this->session->set_userdata('attemp',$attemp);
						$data['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
						$this->load->view('admin/components/login/index',$data);
					endif;
				endif;
			endif;
		endif;
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		// $this->session->sess_destroy();
		redirect(base_url('login.html'));
	}
}
