<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_Brand_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function vehicle_brand()
	{
		$data = array(
			'title' => 'Danh Sách Thương Hiệu Xe',
			'com' => 'vehicle_brand',
			'view' => 'list_vehicle_brand'
		);
		$this->load->view('admin/layout',$data);
	}

	public function update_vehicle_brand()
	{
		$data = array(
			'title' => 'Cập Nhật Thương Hiệu Xe',
			'com' => 'vehicle_brand',
			'view' => 'update_vehicle_brand'
		);
		$this->load->view('admin/layout',$data);
	}

	public function insert_vehicle_brand()
	{
		$data = array(
			'title' => 'Thêm Thương Hiệu Xe',
			'com' => 'vehicle_brand',
			'view' => 'insert_vehicle_brand'
		);
		$this->load->view('admin/layout',$data);
	}

	public function check_the_existing_name_vehicle_brand_addnew()
	{
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_brand_addnew($name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_brand_addnew','Tên thương hiệu xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_brand_addnew','Tên thương hiệu xe không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_brand_update()
	{
		$id = $this->uri->segment(2);
		$name = $this->input->post('name');
		if($this->admin_model->check_the_existing_name_vehicle_brand_update($id,$name) == FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_brand_update','Tên thương hiệu xe đã tồn tại');
			return FALSE;
		endif;
		if($this->security->xss_clean($name, TRUE) === FALSE):
			$this->form_validation->set_message('check_the_existing_name_vehicle_brand_update','Tên thương hiệu xe không hợp lệ');
			return FALSE;
		endif;
		return TRUE;
	}

	public function process_delete_vehicle_brand()
	{
		$vehicle_brand_id = $this->uri->segment(2);
		$this->admin_model->delete_vehicle_brand($vehicle_brand_id);
		redirect(base_url('vehicle-brand.html'));
	}

	public function process_update_vehicle_brand()
	{
		if(isset($_POST['btn-submit'])):
			$id = $this->uri->segment(2);
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			$vehicle_type_id = $this->input->post('vehicle_type_id');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên thương hiệu xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_brand_update');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->update_vehicle_brand();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status,
					'vehicle_type_id' => $vehicle_type_id
				);
				$this->admin_model->update_vehicle_brand($id,$data);
				redirect(base_url('vehicle-brand.html'));
			endif;
		endif;
	}

	public function process_insert_vehicle_brand()
	{
		if(isset($_POST['btn-submit'])):
			$name = $this->input->post('name');
			$slug_name = $this->admin_model->changeTitle($name);
			$status = $this->input->post('status');
			$vehicle_type_id = $this->input->post('vehicle_type_id');
			if($name == ""):
				$this->form_validation->set_rules('name','name','trim|required|xss_clean',array('required' => 'Không được bỏ trống tên thương hiệu xe'));
			else:
				$this->form_validation->set_rules('name','name','callback_check_the_existing_name_vehicle_brand_addnew');
			endif;
			if($this->form_validation->run() == FALSE):
				$this->insert_vehicle_brand();
			else:
				$data = array(
					'name' => $name,
					'slug_name' => $slug_name,
					'status' => $status,
					'vehicle_type_id' => $vehicle_type_id
				);
				$this->admin_model->insert_vehicle_brand($data);
				redirect(base_url('vehicle-brand.html'));
			endif;
		endif;
	}

}

?>