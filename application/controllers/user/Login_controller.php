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
			'title' => 'Đăng Nhập Thành Viên',
			'com' => 'login',
			'error' => '',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function quen_matkhau()
	{
		$data = array(
			'title' => 'Quên Mật Khẩu',
			'com' => 'login',
			'error' => '',
			'view' => 'forget_pass'
		);
		$this->load->view('user/layout',$data);
	}

	public function capnhat_matkhau()
	{
		$data = array(
			'title' => 'Cập Nhật Mật Khẩu',
			'com' => 'login',
			'view' => 'update_pass'
		);
		$this->load->view('user/layout',$data);
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

	public function tim_matkhau()
	{
		if(isset($_POST['email-submit'])):
			$email = $this->input->post('email');
			$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
            if($this->form_validation->run() == FALSE):
            	$this->quen_matkhau();
            else:
            	$user = $this->user_model->get_user_by_email($email);
				if(! $user):
					$data = array(
						'title' => 'Quên Mật Khẩu',
						'com' => 'login',
						'error' => 'Email không tồn tại',
						'view' => 'forget_pass'
					);
					$this->load->view('user/layout',$data);
				else:
					$this->session->set_userdata('email',$email);
					redirect(base_url('capnhat-matkhau.html'));
				endif;
            endif;
		endif;
	}

	public function matkhau_moi()
	{
		if(isset($_POST['pass-submit'])):
			$id = $this->input->post('id');
			$password = $this->input->post('password');
			$password_confirm = $this->input->post('password_confirm');
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$this->form_validation->set_rules('password','password','trim|required|xss_clean',array('required' => 'Mật khẩu không được để trống!'));
            $this->form_validation->set_rules('password_confirm', 'password_confirm','trim|required|matches[password]',array('required' => 'Bạn chưa nhập xác nhận mật khẩu.','matches' => 'Mật khẩu không trùng khớp.'));
			if($this->form_validation->run() == FALSE):
				$this->capnhat_matkhau();
            else:
                $data = array(
                    'id' => $id,
                    'password' => $hash,
                );
                $this->user_model->update_user($id,$data);
                $this->session->unset_userdata('email');
                redirect(base_url("dang-nhap.html"));
            endif;
		endif;
	}

	public function check_xss_clean_email()
	{
		$email = $this->input->post('email');
		if($this->security->xss_clean($email,TRUE) === FALSE):
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

	public function xuly_dangnhap()
	{
		if(isset($_POST['log-submit'])):
			$email = $this->input->post('email');
			$password = $this->input->post('password');
				$this->form_validation->set_rules('email','email','trim|required|valid_email|callback_check_xss_clean_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
				$this->form_validation->set_rules('password','password','trim|required|callback_check_xss_clean_password',array('required' => 'Bạn chưa nhập mật khẩu'));
			if($this->form_validation->run() == FALSE):
				$this->index();
			else:
				$user = $this->user_model->get_user_by_email($email);
				if(! $user):
					$data = array(
						'title' => 'Đăng Nhập Thành Viên',
						'com' => 'login',
						'error' => 'Sai Email đăng nhập hoặc mật khẩu!',
						'view' => 'index'
					);
					$this->load->view('user/layout',$data);
				else:
					$hash = $user->password;
					if(password_verify($password,$hash) == TRUE):
						if($user->status == 1):
							$this->session->set_userdata('email',$email);
							redirect(base_url('index.html'));
						endif;
					else:
						$attemp = $this->session->userdata('attemp');
						$attemp++;
						$this->session->set_userdata('attemp',$attemp);
						$data = array(
							'title' => 'Đăng Nhập Thành Viên',
							'com' => 'login',
							'error' => 'Sai Email đăng nhập hoặc mật khẩu!',
							'view' => 'index'
						);
						$this->load->view('user/layout',$data);
					endif;
				endif;
			endif;
		endif;
	}

	public function dang_xuat()
	{
		$this->session->unset_userdata('email');
		// $this->session->sess_destroy();
		redirect(base_url('dang-nhap.html'));
	}

}