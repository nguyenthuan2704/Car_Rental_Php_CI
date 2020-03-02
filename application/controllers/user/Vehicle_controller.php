<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Chi Tiết Xe',
			'com' => 'vehicle',
			'view' => 'vehicle_detail'
		);
		$this->load->view('user/layout',$data);
	}

	public function vehicle_detail()
	{
		$data = array(
			'title' => 'Chi Tiết Xe',
			'com' => 'vehicle',
			'view' => 'vehicle_detail'
		);
		$this->load->view('user/layout',$data);
	}

}

?>