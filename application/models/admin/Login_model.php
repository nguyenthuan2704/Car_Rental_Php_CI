<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_by_username($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('user_admin')->row();
	}

}

?>