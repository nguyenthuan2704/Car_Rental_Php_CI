<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function user_admin()
	{
		$data = array(
			'title' => 'Quản Trị Viên',
			'com' => 'user_admin',
			'view' => 'list_user_admin'
		);
		$this->load->view('admin/layout',$data);
	}

	public function user_admin_deleted()
	{
		$data = array(
			'title' => 'Quản Trị Viên',
			'com' => 'user_admin',
			'view' => 'list_user_admin_deleted'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_user_admin()
	{
		$data = array(
			'title' => 'Thêm Quản Trị Viên',
			'com' => 'user_admin',
			'view' => 'insert_user_admin'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_user_admin()
	{
		$data = array(
			'title' => 'Cập Nhật Thông Tin Quản Trị Viên',
			'com' => 'user_admin',
			'view' => 'update_user_admin'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_user_admin_userrole()
	{
		$data = array(
			'title' => 'Cập Nhật Quyền Hạn Quản Trị Viên',
			'com' => 'user_admin',
			'view' => 'update_user_admin_userrole'
		);
		$this->load->view('admin/layout',$data);
	}

	public function process_delete_user_admin()
	{
		$id = $this->uri->segment(2);
		$status = 0;
		$deleted = 1;
		$data = array(
			'status' => $status,
			'deleted' => $deleted
		);
		$this->user_admin_model->update_user_admin($id,$data);
		redirect(base_url('user-admin.html'));
	}

	public function process_reset_user_admin()
	{
		$id = $this->uri->segment(2);
		$status = 1;
		$deleted = 0;
		$data = array(
			'status' => $status,
			'deleted' => $deleted
		);
		$this->user_admin_model->update_user_admin($id,$data);
		redirect(base_url('user-admin-deleted.html'));
	}

	public function process_remove_user_admin()
	{
		$user_admin_id = $this->uri->segment(2);
		$this->user_admin_model->delete_user_admin($user_admin_id);
		redirect(base_url('user-admin.html'));
	}

	public function check_the_existing_username_user_admin_addnew()
	{
		$username = $this->input->post('username');
		if($this->user_admin_model->check_the_existing_username_user_admin_addnew($username) == FALSE):
			$this->form_validation->set_message('check_the_existing_username_user_admin_addnew','Tên đăng nhập đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($username, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_username_user_admin_addnew','Tên đăng nhập không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_username_user_admin_update()
	{
		$id = $this->uri->segment(2);
		$username = $this->input->post('username');
		if($this->user_admin_model->check_the_existing_username_user_admin_update($id,$username) == FALSE):
			$this->form_validation->set_message('check_the_existing_username_user_admin_update','Tên đăng nhập đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($username, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_username_user_admin_update','Tên đăng nhập không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
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

public function process_insert_user_admin()
	{
        if(isset($_POST['btn-submit'])):
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $password_confirm = $this->input->post('password_confirm');
            $email = $this->input->post('email');
            $url_image = $_FILES['url_image']['name'];
            $status = $this->input->post('status');
            $user_role_id = $this->input->post('user_role_id');
			if($username == ""):
				$this->form_validation->set_rules('username','username','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên đăng nhập'));
			else:
				$this->form_validation->set_rules('username','username','callback_check_the_existing_username_user_admin_addnew');
			endif;
			$this->form_validation->set_rules('fullname','fullname','trim|required|xss_clean',array('required' => 'Họ tên không được để trống!'));
			$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
            $this->form_validation->set_rules('password', 'password','trim|required',array('required' => 'Bạn chưa nhập mật khẩu.'));
            $this->form_validation->set_rules('password_confirm', 'password_confirm','trim|required|matches[password]',array('required' => 'Bạn chưa nhập xác nhận mật khẩu.','matches' => 'Mật khẩu không trùng khớp.'));
            if($url_image == ""):
                $this->form_validation->set_rules('url_image', 'url_image','trim|required|xss_clean',array('required' => 'Bạn chưa chọn ảnh đại diện.'));
            else:
                $this->form_validation->set_rules('url_image', 'url_image','callback_check_image_is_invalid_or_valid');
            endif;
            if($this->form_validation->run() == FALSE):
                $this->insert_user_admin();
            else:
                    $_FILES['file']['name']     = $_FILES['url_image']['name'];
                    $_FILES['file']['type']     = $_FILES['url_image']['type'];
                    $_FILES['file']['tmp_name'] = $_FILES['url_image']['tmp_name'];
                    $_FILES['file']['size']     = $_FILES['url_image']['size'];
                    $_FILES['file']['error']    = $_FILES['url_image']['error'];
                    $config = array(
                        'upload_path'   => 'public/admin/images/',
                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                        'overwrite'     => true
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')):
                        $data = array(
                            'fullname' => $fullname,
                            'username' => $username,
                            'password' => $hash,
                            'email' => $email,
                            'url_image' => $_FILES['url_image']['name'],
                            'status' => $status,
                            'user_role_id' => $user_role_id
                        );
                        $this->user_admin_model->insert_user_admin($data);
                        redirect(base_url('user-admin.html'));
                    else:
                        echo $this->upload->display_errors();
                    endif;
            endif;
        endif;
	}

	public function process_update_user_admin()
	{
        if(isset($_POST['btn-submit'])):
        	$id = $this->uri->segment(2);
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $password_confirm = $this->input->post('password_confirm');
            $email = $this->input->post('email');
            $url_image = $_FILES['url_image']['name'];
            if($username == ""):
				$this->form_validation->set_rules('username','username','trim|required|xss_clean|',array('required' => 'Không được bỏ trống tên đăng nhập'));
			else:
				$this->form_validation->set_rules('username','username','callback_check_the_existing_username_user_admin_update');
			endif;
			$this->form_validation->set_rules('fullname','fullname','trim|required|xss_clean',array('required' => 'Họ tên không được để trống!'));
			$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
            $this->form_validation->set_rules('password', 'password','trim|required',array('required' => 'Bạn chưa nhập mật khẩu.'));
            $this->form_validation->set_rules('password_confirm', 'password_confirm','trim|required|matches[password]',array('required' => 'Bạn chưa nhập xác nhận mật khẩu.','matches' => 'Mật khẩu không trùng khớp.'));
                $this->form_validation->set_rules('url_image', 'url_image','callback_check_image_is_invalid_or_valid');
            if($this->form_validation->run() == FALSE):
                $this->update_user_admin();
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
	                    'username'          => $username,
	                    'password'          => $hash,
	                    'email'             => $email,
	                    'url_image'         => $_FILES['file']['name']
                    );
                    $this->user_admin_model->update_user_admin($id, $data);
                else:
                    $config = array(
                        'upload_path'   => 'public/admin/images/',
                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                        'overwrite'     => true
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')):
                        $data = array(
		                    'fullname'          => $fullname,
		                    'username'          => $username,
		                    'password'          => $hash,
		                    'email'             => $email,
		                    'url_image'         => $_FILES['file']['name']
                        );
                        $this->user_admin_model->update_user_admin($id,$data);
                        unlink('public/admin/images/'.$this->input->post('current_image'));
                    else:
                        echo $this->upload->display_errors();
                    endif;
                endif;
                redirect(base_url('admin.html'));
            endif;
        endif;
	}

public function process_update_user_admin_userrole()
	{
        if(isset($_POST['btn-submit'])):
        	$id = $this->uri->segment(2);
            $status = $this->input->post('status');
                $data = array(
                    'status'          => $status
                );
            $this->user_admin_model->update_user_admin($id,$data);
            redirect(base_url('user-admin.html'));
        endif;
	}

}