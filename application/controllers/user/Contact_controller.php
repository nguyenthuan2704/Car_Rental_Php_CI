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
			'title' => 'Liên Hệ',
			'com' => 'contact',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function xuly_lienhe()
	{
		if(isset($_POST['btn-submit'])):
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$content = $this->input->post('content');
			if($fullname == ""):
			$this->form_validation->set_rules('fullname','fullname','trim|required|xss_clean',array('required' => 'Họ tên không được để trống!'));
			endif;
			$this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
			$this->form_validation->set_rules('subject','subject','trim|required|xss_clean',array('required' => 'Tiêu đề không được để trống!'));
			$this->form_validation->set_rules('content','content','trim|required|xss_clean',array('required' => 'Nội dung không được để trống!'));
			if($this->form_validation->run() == FALSE):
				$this->index();
				// redirect(base_url("lien-he.html"));
			else:
				$data = array(
					'fullname' => $fullname,
					'email' => $email,
					'subject' => $subject,
					'content' => $content
				);
				$this->contact_model->insert_contact($data);
				redirect(base_url('lien-he.html'));
			endif;
		endif;
	}
}
