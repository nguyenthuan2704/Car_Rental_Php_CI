<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Quản Lý Liên Hệ',
			'com' => 'contact',
			'view' => 'list_contact'
		);
		$this->load->view('admin/layout',$data);
	}

	public function list_contact_examined()
	{
		$data = array(
			'title' => 'Quản Lý Liên Hệ Đã Xem',
			'com' => 'contact',
			'view' => 'list_contact_examined'
		);
		$this->load->view('admin/layout',$data);
	}

	public function contact_details()
	{
		$data = array(
			'title' => 'Nội Dung Liên Hệ',
			'com' => 'contact',
			'view' => 'contact_details'
		);
		$this->load->view('admin/layout',$data);
	}

	public function process_contact_details()
	{
		if(isset($_POST['btn-submit'])):
			$id = $this->uri->segment(2);
			$status = $this->input->post('status');
				$data = array(
					'status' => $status
				);
				$this->contact_model->update_contact($id,$data);
				redirect(base_url('contact-examined.html'));
		endif;
	}

	public function process_delete_contact()
	{
		$contact_id = $this->uri->segment(2);
		$this->contact_model->delete_contact($contact_id);
		redirect(base_url('contact.html'));
	}
}
