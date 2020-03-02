<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function vehicle()
	{
		$data = array(
			'title' => 'Danh Sách Xe',
			'com' => 'vehicle',
			'view' => 'list_vehicle'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_vehicle()
	{
		$data = array(
			'title' => 'Thêm Xe',
			'com' => 'vehicle',
			'view' => 'insert_vehicle'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_vehicle()
	{
		$data = array(
			'title' => 'Cập Nhật Xe',
			'com' => 'vehicle',
			'view' => 'update_vehicle'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_name_vehicle_addnew()
	{
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_addnew($name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_addnew','Tên xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_addnew','Tên xe không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_update()
	{
		$id = $this->uri->segment(2);
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_update($id,$name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_update','Tên xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_update','Tên xe không hợp lệ');
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

	public function process_delete_vehicle()
	{
		$vehicle_id = $this->uri->segment(2);
		$this->admin_model->delete_vehicle($vehicle_id);
		redirect(base_url('vehicle.html'));
	}

	public function process_update_vehicle()
	{
        if(isset($_POST['btn-submit'])):
        	$id = $this->uri->segment(2);
            $name          = $this->input->post('name');
            $slug_name = $this->admin_model->changeTitle($name);
            $url_image          = $_FILES['url_image']['name'];
            $status             = $this->input->post('status');
            $content             = $this->input->post('content');
            $hot             = $this->input->post('hot');
            $vehicle_brand_id = $this->input->post('vehicle_brand_id');
            $vehicle_type_id = $this->input->post('vehicle_type_id');
            $this->form_validation->set_rules('url_image', 'url_image',
                    'callback_check_image_is_invalid_or_valid'
            );
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_update');
			endif;
            if($this->form_validation->run() == FALSE):
                $this->update_vehicle();
            else:
                $_FILES['file']['name']     = $_FILES['url_image']['name'];
                $_FILES['file']['type']     = $_FILES['url_image']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['url_image']['tmp_name'];
                $_FILES['file']['size']     = $_FILES['url_image']['size'];
                $_FILES['file']['error']    = $_FILES['url_image']['error'];
                if($url_image == ""):
                    $_FILES['file']['name'] = $this->input->post('current_image');
                    $data = array(
                        'name'	=> $name,
                        'slug_name'	=> $slug_name,
                        'url_image'	=> $_FILES['file']['name'],
                        'status'	=> $status,
                        'content' => $content,
                        'hot' => $hot,
                        'vehicle_brand_id'	=> $vehicle_brand_id,
                        'vehicle_type_id' => $vehicle_type_id
                    );
                    $this->admin_model->update_vehicle($id, $data);
                else:
                    $config = array(
                        'upload_path'   => 'public/user/images/vehicle/',
                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                        'overwrite'     => true
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')):
                        $data = array(
	                        'name' => $name,
	                        'slug_name'	=> $slug_name,
	                        'url_image'	=> $_FILES['file']['name'],
	                        'status'=> $status,
                            'content' => $content,
	                        'vehicle_brand_id'	=> $vehicle_brand_id,
	                        'vehicle_type_id' => $vehicle_type_id
                        );
                        $this->admin_model->update_vehicle($id,$data);
                        unlink('public/upload/'.$this->input->post('current_image'));
                    else:
                        echo $this->upload->display_errors();
                    endif;
                endif;
                if($_FILES['uploadimages']['name'][0] != ''):
                    $count = count($_FILES['uploadimages']['name']);
                    for ($i = 0; $i < $count; $i++):
                        $_FILES['file']['name']     = $_FILES['uploadimages']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['uploadimages']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['uploadimages']['tmp_name'][$i];
                        $_FILES['file']['size']     = $_FILES['uploadimages']['size'][$i];
                        $_FILES['file']['error']    = $_FILES['uploadimages']['error'][$i];
                        $config = array(
                            'upload_path'   => 'public/upload/',
                            'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                            'overwrite'     => true
                        );
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('file');
                        $data_images[] = $this->upload->data();
                        if ($this->upload->do_upload('file')):
                            $data = array(
                                'image'  => $_FILES['file']['name'],
                                'id'    => $id
                            );
                            $this->admin_model->addnew_upload_image($data);
                        else:
                            echo $this->upload->display_errors();
                        endif;
                    endfor;
                else:
                    $id_current_images = $this->input->post('id[]');
                    $current_images = $this->input->post('currentimages[]');
                    foreach($id_current_images as $key => $value):
                        $_FILES['file']['name']     = $_FILES['newimage']['name'][$key];
                        $_FILES['file']['type']     = $_FILES['newimage']['type'][$key];
                        $_FILES['file']['tmp_name'] = $_FILES['newimage']['tmp_name'][$key];
                        $_FILES['file']['size']     = $_FILES['newimage']['size'][$key];
                        $_FILES['file']['error']    = $_FILES['newimage']['error'][$key];

                        if($_FILES['newimage']['name'][$key] == ''):
                            $images = $this->admin_model->get_upload_image_by_id($value);
                            $_FILES['file']['name'] = $images->url_image;
                        else:
                            $config = array(
                                'upload_path'   => 'public/user/images/sub_image_vehicle/',
                                'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                                'overwrite'     => true
                            );
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('file');
                            $data_images[] = $this->upload->data();
                            if ($this->upload->do_upload('file')):
                                $data = array(
                                    'url_image'  => $_FILES['file']['name'],
                                    'id'    => $id
                                );
                                $this->admin_model->update_upload_image($value, $data);
                            else:
                                echo $this->upload->display_errors();
                            endif;
                        endif;
                    endforeach;
                endif;
                redirect(base_url('vehicle.html'));
            endif;
        endif;
        if(isset($_POST['btn-delete'])):
            $upload_image_id = $this->input->post('upload_image_id[]');
            foreach($upload_image_id as $key => $value):
                $upload_image  = $this->admin_model->get_upload_image_by_id($value);
                $current_image = $upload_image->url_image;
                $this->admin_model->delete_upload_image($value);
                unlink('public/user/images/sub_image_vehicle/'.$current_image);
            endforeach;
            redirect(base_url("vehicle.html"));
        endif;
	}

	public function process_insert_vehicle()
	{

        if(isset($_POST['btn-submit'])):
            $name          = $this->input->post('name');
            $slug_name = $this->admin_model->changeTitle($name);
            $url_image          = $_FILES['url_image']['name'];
            $status             = $this->input->post('status');
            $content             = $this->input->post('content');
            $hot             = $this->input->post('hot');
			$vehicle_brand_id = $this->input->post('vehicle_brand_id');
			$vehicle_type_id = $this->input->post('vehicle_type_id');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_addnew');
			endif;
            if($url_image == ''):
                $this->form_validation->set_rules('url_image', 'url_image',
                    'trim|required|xss_clean',
                    array(
                        'required' => 'Bạn chưa chọn hình sản phẩm xe.'
                    )
                );
            else:
                $this->form_validation->set_rules('url_image', 'url_image',
                    'callback_check_image_is_invalid_or_valid'
                );
            endif;
            if($this->form_validation->run() == FALSE):
                $flag = 'wrong';
                $this->session->set_userdata('flag', $flag);
                $this->insert_vehicle();
            else:
                if(isset($flag)):
                    $this->session->sess_destroy('flag');
                else:
                    $_FILES['file']['name']     = $_FILES['url_image']['name'];
                    $_FILES['file']['type']     = $_FILES['url_image']['type'];
                    $_FILES['file']['tmp_name'] = $_FILES['url_image']['tmp_name'];
                    $_FILES['file']['size']     = $_FILES['url_image']['size'];
                    $_FILES['file']['error']    = $_FILES['url_image']['error'];

                    $config = array(
                        'upload_path'   => 'public/user/images/vehicle',
                        'allowed_types' => 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG',
                        'overwrite'     => true
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('file')):
                        $data = array(
                            'name' => $name,
                            'slug_name'	=> $slug_name,
                            'url_image' => $_FILES['url_image']['name'],
                            'status' => $status,
                            'content' => $content,
                            'hot' => $hot,
                            'vehicle_brand_id' => $vehicle_brand_id,
                            'vehicle_type_id' => $vehicle_type_id
                        );
                        $vehicle_id = $this->admin_model->insert_vehicle($data);

                        $cpt = count($_FILES['uploadimages']['name']);
                        for($i = 0; $i < $cpt; $i++) :
                            $_FILES['file']['name']     = $_FILES['uploadimages']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['uploadimages']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['uploadimages']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['uploadimages']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['uploadimages']['size'][$i];

                            $config['upload_path']   = 'public/user/images/sub_image_vehicle/';
                            $config['allowed_types'] = 'jpg|jpeg|pjpeg|png|gif|JPG|PNG|JPEG|GIF|PJPEG';
                            $config['overwrite']     = true;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('file');
                            $data_images[] = $this->upload->data();
                            if($this->upload->do_upload('file')):
                                $data = array(
                                    'url_image'  => $_FILES['file']['name'],
                                    'id'    => $vehicle_id
                                );
                                $this->admin_model->addnew_upload_image($data);
                            else :
                                echo $this->upload->display_errors();
                            endif;
                        endfor;
                        redirect(base_url('vehicle.html'));
                    else:
                        echo $this->upload->display_errors();
                    endif;
                endif;
            endif;
        endif;
	}

}

?>