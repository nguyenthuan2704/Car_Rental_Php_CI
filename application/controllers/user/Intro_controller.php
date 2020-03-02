<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Giới Thiệu',
			'com' => 'intro',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function detail_intro()
	{
		$data = array(
			'title' => 'Giới Thiệu',
			'com' => 'intro',
			'view' => 'detail'
		);
		$this->load->view('user/layout',$data);
	}
}
