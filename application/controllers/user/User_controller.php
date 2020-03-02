<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function capnhat_taikhoan()
	{
		$data = array(
			'title' => 'Cập Nhật Thông Tin Tài Khoản',
			'com' => 'member',
			'view' => 'update_member'
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


	public function xuly_capnhat_taikhoan()
	{
		if(isset($_POST['update-submit'])):
		        	$id = $this->uri->segment(2);
		            $fullname = $this->input->post('fullname');
		            $email = $this->input->post('email');
		            $password = $this->input->post('password');
		            $hash = password_hash($password, PASSWORD_DEFAULT);
		            $password_confirm = $this->input->post('password_confirm');
		            $phone = $this->input->post('phone');
		            $date_of_birth = $this->input->post('date_of_birth');
					$time = strtotime($date_of_birth);
					$newformat = date('Y-m-d',$time);
		            $url_image = $_FILES['url_image']['name'];
		            $this->form_validation->set_rules('fullname','fullname','trim|required|xss_clean',array('required' => 'Họ tên không được để trống!'));
					$this->form_validation->set_rules('phone','phone','trim|required|regex_match[/^[0-9]{10}$/]',array('required' => 'Số điện thoại không được để trống!','regex_match' => 'Số điện thoại không hợp lệ!'));
					$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
					$this->form_validation->set_rules('date_of_birth','date_of_birth','trim|required|xss_clean',array('required' => 'Ngày sinh không được để trống!'));
					$this->form_validation->set_rules('password','password','trim|required|xss_clean',array('required' => 'Mật khẩu không được để trống!'));
            		$this->form_validation->set_rules('password_confirm', 'password_confirm','trim|required|matches[password]',array('required' => 'Bạn chưa nhập xác nhận mật khẩu.','matches' => 'Mật khẩu không trùng khớp.'));
            		$this->form_validation->set_rules('url_image', 'url_image','callback_check_image_is_invalid_or_valid');
		            if($this->form_validation->run() == FALSE):
		                $this->capnhat_taikhoan();
		            else:
		                $_FILES['file']['name']     = $_FILES['url_image']['name'];
		                $_FILES['file']['type']     = $_FILES['url_image']['type'];
		                $_FILES['file']['tmp_name'] = $_FILES['url_image']['tmp_name'];
		                $_FILES['file']['size']     = $_FILES['url_image']['size'];
		                $_FILES['file']['error']    = $_FILES['url_image']['error'];
		                if($url_image == ""):
		                    $_FILES['file']['name'] = $this->input->post('current_image');
		                    $data = array(
			                    'fullname'          => $fullname,
			                    'phone'				=> $phone,
			                    'password'          => $hash,
			                    'email'             => $email,
			                    'date_of_birth'		=> $newformat,
			                    'url_image'         => $_FILES['file']['name']
		                    );
		                    $this->user_model->update_user_info($id,$data);
		                else:
		                    $config = array(
		                        'upload_path'   => 'public/user/images/member/',
		                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
		                        'overwrite'     => true
		                    );
		                    $this->load->library('upload', $config);
		                    $this->upload->initialize($config);
		                    if($this->upload->do_upload('file')):
		                     $data = array(
			                    'fullname'          => $fullname,
			                    'phone'				=> $phone,
			                    'password'          => $hash,
			                    'email'             => $email,
			                    'date_of_birth'		=> $time,
			                    'url_image'         => $_FILES['file']['name']
		                        );
		                        $this->user_model->update_user_info($id,$data);
		                        unlink('public/user/images/member/'.$this->input->post('current_image'));
		                    else:
		                        echo $this->upload->display_errors();
		                    endif;
		                endif;
		                redirect(base_url('index.html'));
		            endif;
		        endif;
	}

}

?>