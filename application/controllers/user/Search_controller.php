<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function search()
	{
		$data = array(
			'title' => 'Tìm Kiếm',
			'com' => 'search',
			'view' => 'search'
		);
		$this->load->view('user/layout',$data);
	}

	public function process_search()
	{
		try {
			if(isset($_POST['submit'])):
				$keyword = $this->admin_model->changeTitle($this->input->post('keyword'));
				redirect(base_url("search/{$keyword}.html"));
			endif;
		} catch (Exception $e) {
			exit();
		}
	}

}
