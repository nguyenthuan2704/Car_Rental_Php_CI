<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_intro()
	{
		return $this->db->get('introduce')->result();
	}

	public function get_intro_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('introduce')->row();
	}

}
?>