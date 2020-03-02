<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookCar_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function book_car()
	{
		$data = array(
			'title' => 'Thông Tin Đặt Xe',
			'com' => 'book',
			'view' => 'book_car'
		);
		$this->load->view('user/layout',$data);
	}

	public function book_success()
	{
		$data = array(
			'title' => 'Đặt Xe Thành Công',
			'com' => 'book',
			'view' => 'book_success'
		);
		$this->load->view('user/layout',$data);
	}

	public function process_book_car()
	{
		if(isset($_POST['btn-submit'])):
			$fullname = $this->input->post('fullname');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$departure_date = $this->input->post('departure_date');
            $time = strtotime($departure_date);
            $date_departure = date('Y-m-d',$time);
			$back_date = $this->input->post('back_date');
            $times = strtotime($back_date);
            $date_back = date('Y-m-d',$times);
            $departure_address = $this->input->post('departure_address');
            $schedule = $this->input->post('schedule');
            $vehicle_id = $this->uri->segment(2);
            $user_id = $this->input->post('user_id');
            $service_id = $this->input->post('service_id');
				$this->form_validation->set_rules('departure_date','date_departure','trim|required|xss_clean',array('required' => 'Ngày khởi hành không được để trống!'));
				$this->form_validation->set_rules('back_date','back_date','trim|required|xss_clean',array('required' => 'Ngày về không được để trống!'));
            	$this->form_validation->set_rules('departure_address','departure_address','trim|required|xss_clean',array('required' => 'Địa chỉ khởi hành không được để trống!'));
            	$this->form_validation->set_rules('schedule','schedule','trim|required|xss_clean',array('required' => 'Lịch trình không được để trống!'));
            if($service_id == ""):
            	$this->form_validation->set_rules('service_id','service_id','trim|required|xss_clean',array('required' => 'Bạn chưa chọn mục đích thuê xe!'));
        	endif;
			if($this->form_validation->run() == FALSE):
				$this->book_car();
            else:
                $data = array(
                    'fullname' => $fullname,
                    'phone' => $phone,
                    'email' => $email,
                    'departure_date' => $date_departure,
                    'back_date' => $date_back,
                    'departure_address' => $departure_address,
                    'schedule' => $schedule,
                    'vehicle_id' => $vehicle_id,
                    'user_id' => $user_id,
                    'service_id' => $service_id
                );
                $this->bookcar_model->insert_booking($data);
                redirect(base_url("book-success.html"));
            endif;
		endif;
	}

}

?>