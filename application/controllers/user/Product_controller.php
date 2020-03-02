<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' => 'Sản Phẩm',
			'com' => 'product',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function view_product()
	{
		$data = array(
			'title' => 'Sản Phẩm',
			'com' => 'product',
			'view' => 'index'
		);
		$this->load->view('user/layout',$data);
	}

	public function view_product_type()
	{
		$data = array(
			'title' => 'Sản Phẩm',
			'com' => 'product',
			'view' => 'product_type'
		);
		$this->load->view('user/layout',$data);
	}

	public function view_product_brand()
	{
		$data = array(
			'title' => 'Sản Phẩm',
			'com' => 'product',
			'view' => 'product_brand'
		);
		$this->load->view('user/layout',$data);
	}
}
