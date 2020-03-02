<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Đăng Ký Thành Viên',
			'com' => 'register',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function success()
	{
		$data = array(
			'title' => 'Đăng Ký Thành Công',
			'com' => 'register',
			'view' => 'success'
		);
		$this->load->view('user/layout',$data);
	}

    public function check_image_is_invalid_or_valid()
    {
        $url_image = $_FILES['url_image']['name'];
        $mime_types = array(
            'image/gif', 'image/jpeg',
            'image/jpg', 'image/png',
            'image/x-png', 'image/pjpeg'
        );
        if($url_image != '') :
            $img = get_mime_by_extension($url_image);
            if(in_array($img, $mime_types)) :
                return true;
            else :
                $this->form_validation->set_message('check_image_is_invalid_or_valid', 'Hình ảnh không hợp lệ.');
                return false;
            endif;
        endif;
        return true;
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

	public function xuly_dangky()
	{
		if(isset($_POST['reg-submit'])):
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$date_of_birth = $this->input->post('date_of_birth');
            $time = strtotime($date_of_birth);
            $newformat = date('Y-m-d',$time);
            $password = $this->input->post('password');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $password_confirm = $this->input->post('password_confirm');
            $user_role_id = $this->input->post('user_role_id');
            $url_image = $_FILES['url_image']['name'];
			$this->form_validation->set_rules('fullname','fullname','trim|required|xss_clean',array('required' => 'Họ tên không được để trống!'));
			$this->form_validation->set_rules('phone','phone','trim|required|regex_match[/^[0-9]{10}$/]',array('required' => 'Số điện thoại không được để trống!','regex_match' => 'Số điện thoại không hợp lệ!'));
            if($email == ""):
			$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
            else:
            $this->form_validation->set_rules('email','email','callback_check_the_existing_email_subscriber_addnew');
            endif;
			$this->form_validation->set_rules('date_of_birth','date_of_birth','trim|required|xss_clean',array('required' => 'Ngày sinh không được để trống!'));
			$this->form_validation->set_rules('password','password','trim|required|xss_clean',array('required' => 'Mật khẩu không được để trống!'));
            $this->form_validation->set_rules('password_confirm', 'password_confirm','trim|required|matches[password]',array('required' => 'Bạn chưa nhập xác nhận mật khẩu.','matches' => 'Mật khẩu không trùng khớp.'));
            if($url_image == ""):
                $this->form_validation->set_rules('url_image', 'url_image','trim|required|xss_clean',array('required' => 'Bạn chưa chọn ảnh đại diện.'));
            else:
                $this->form_validation->set_rules('url_image', 'url_image','callback_check_image_is_invalid_or_valid');
            endif;
			if($this->form_validation->run() == FALSE):
				$this->index();
            else:
                    $_FILES['file']['name']     = $_FILES['url_image']['name'];
                    $_FILES['file']['type']     = $_FILES['url_image']['type'];
                    $_FILES['file']['tmp_name'] = $_FILES['url_image']['tmp_name'];
                    $_FILES['file']['size']     = $_FILES['url_image']['size'];
                    $_FILES['file']['error']    = $_FILES['url_image']['error'];
                    $config = array(
                        'upload_path'   => 'public/user/images/member/',
                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                        'overwrite'     => true
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')):
                        $data = array(
                            'fullname' => $fullname,
                            'phone' => $phone,
                            'date_of_birth' => $newformat,
                            'password' => $hash,
                            'email' => $email,
                            'url_image' => $_FILES['url_image']['name'],
                            'user_role_id' => $user_role_id
                        );
                        $this->user_model->insert_user($data);
                        redirect(base_url('success.html'));
                    else:
                        echo $this->upload->display_errors();
                    endif;
            endif;
		endif;
	}

}