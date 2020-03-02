<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function bill()
	{
		$data = array(
			'title' => 'Chi Tiết Đơn Hàng',
			'com' => 'bill',
			'view' => 'bill'
		);
		$this->load->view('user/layout',$data);
	}

	public function bill_detail()
	{
		$data = array(
			'title' => 'Chi Tiết Đơn Hàng',
			'com' => 'bill',
			'view' => 'bill_detail'
		);
		$this->load->view('user/layout',$data);
	}

	public function cancel_success()
	{
		$data = array(
			'title' => 'Hủy Đơn Hàng Thành Công',
			'com' => 'bill',
			'view' => 'cancel_success'
		);
		$this->load->view('user/layout',$data);
	}

	public function cancel_failed()
	{
		$data = array(
			'title' => 'Hủy Đơn Hàng Thất Bại',
			'com' => 'bill',
			'view' => 'cancel_failed'
		);
		$this->load->view('user/layout',$data);
	}

	public function cancel_bill_detail()
	{
		if(isset($_POST['cancel-submit'])):
			$id = $this->uri->segment(2);
			$reason_cancel = $this->input->post('reason_cancel');
			$this->form_validation->set_rules('reason_cancel','reason_cancel','trim|required',array('required' => 'Bạn chưa nhập lí do hủy đơn!'));
			if($this->form_validation->run() == FALSE):
				$this->bill_detail();
			else:
				$data = array(
					'reason_cancel' =>  $reason_cancel,
					'cancel' => 1,
					'cancel_date' => date('Y-m-d H:i:s')
				);
				$this->bookcar_model->cancel_bill_by_user($id,$data);
				redirect(base_url("cancel-success.html"));
			endif;
		endif;
	}

	public function cancel_bill()
	{
		$book_id = $this->uri->segment(2);
		$this->bookcar_model->cancel_bill($book_id);
		redirect(base_url("cancel-success.html"));
	}

}
?>