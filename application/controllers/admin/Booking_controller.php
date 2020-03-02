<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function list_booking()
	{
		$data = array(
			'title' => 'Danh Sách Đơn Hàng Đặt Xe',
			'com' => 'booking',
			'view' => 'list_booking'
		);
		$this->load->view('admin/layout',$data);
	}

	public function list_booking_cancel()
	{
		$data = array(
			'title' => 'Danh Sách Đơn Hàng Từ Chối',
			'com' => 'booking',
			'view' => 'list_booking_cancel'
		);
		$this->load->view('admin/layout',$data);
	}

	public function page_cancel()
	{
		$data = array(
			'title' => 'Lý Do Từ Chối',
			'com' => 'booking',
			'view' => 'page_cancel'
		);
		$this->load->view('admin/layout',$data);
	}

	public function process_page_cancel()
	{
	      if(isset($_POST['btn-submit'])):
				$id = $this->input->post('id');
				$reason_cancel = $this->input->post('reason_cancel');
					$data = array(
						'reason_cancel' =>  $reason_cancel,
						'status' => 0,
						'cancel' => 1,
						'confirm' => 0,
						'cancel_date' => date('Y-m-d H:i:s')
					);
					$this->bookcar_model->cancel_bill_by_user_admin($id,$data);
					redirect(base_url("booking.html"));
			endif;
	}

	public function booking_confirm()
	{
		$id = $this->uri->segment(2);
			$data = array(
				'reason_cancel' =>  null,
				'status' => 1,
				'cancel' => 0,
				'confirm' => 1,
				'cancel_date' => null
			);
			$this->bookcar_model->cancel_bill_by_user_admin($id,$data);
			redirect(base_url("booking.html"));
	}
}
?>