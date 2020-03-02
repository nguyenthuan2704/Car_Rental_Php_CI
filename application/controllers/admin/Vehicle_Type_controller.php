<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_Type_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function vehicle_type()
	{
		$data = array(
			'title' => 'Danh Sách Loại Xe',
			'com' => 'vehicle_type',
			'view' => 'list_vehicle_type'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_vehicle_type()
	{
		$data = array(
			'title' => 'Thêm Loại Xe',
			'com' => 'vehicle_type',
			'view' => 'insert_vehicle_type'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_vehicle_type()
	{
		$data = array(
			'title' => 'Cập Nhật Loại Xe',
			'com' => 'vehicle_type',
			'view' => 'update_vehicle_type'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_name_vehicle_type_addnew()
	{
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_type_addnew($name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_type_addnew','Tên loại xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_type_addnew','Tên loại xe không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_type_update()
	{
		$id = $this->uri->segment(2);
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_type_update($id,$name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_type_update','Tên loại xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_type_update','Tên loại xe không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function process_insert_vehicle_type()
	{
		if(isset($_POST['btn-submit'])):
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Bạn chưa nhập tên loại xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_type_addnew');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->insert_vehicle_type();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status
				);
				$this->admin_model->insert_vehicle_type($data);
				redirect(base_url('vehicle-type.html'));
			endif;
		endif;
	}

	public function process_update_vehicle_type()
	{
		if(isset($_POST['btn-submit'])):
			$id = $this->uri->segment(2);
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên loại xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_type_update');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->update_vehicle_type();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status
				);
				$this->admin_model->update_vehicle_type($id,$data);
				redirect(base_url('vehicle-type.html'));
			endif;
		endif;
	}

	public function process_delete_vehicle_type()
	{
		$vehicle_type_id = $this->uri->segment(2);
		$this->admin_model->delete_vehicle_type($vehicle_type_id);
		redirect(base_url('vehicle-type.html'));
	}
}
