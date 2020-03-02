<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_user_admin()
	{
		$this->db->where(array('deleted' => 0));
		return $this->db->get('user_admin')->result();
	}

	public function show_user_admin_deleted()
	{
		$this->db->where(array('status' => 0,'deleted' => 1));
		return $this->db->get('user_admin')->result();
	}


	public function get_user_admin_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('user_admin')->row();
	}

	public function get_user_admin_by_username($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('user_admin')->row();
	}

	public function insert_user_admin($data)
	{
		$this->db->set('deleted',0);
		$this->db->insert('user_admin',$data);
		return $this->db->insert_id();
	}

	public function update_user_admin($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user_admin',$data);
	}

	public function delete_user_admin($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user_admin');
	}

	public function check_the_existing_username_user_admin_addnew($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('user_admin');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_username_user_admin_update($id,$username)
	{
		$this->db->select('username')->where(array('id !=' => $id,'username =' =>$username));
		$query = $this->db->get('user_admin');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}
}

?>