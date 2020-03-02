<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_user_role()
	{
		return $this->db->get('user_role')->result();
	}

	public function get_user_role_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('user_role')->row();
	}

	public function insert_user_role($data)
	{
		$this->db->set('created_at', date('Y-m-d H:i:s'));
		$this->db->set('deleted',0);
		$this->db->insert('user_role',$data);
		return $this->db->insert_id();
	}

	public function update_user_role($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user_role',$data);
	}

	public function delete_user_role($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user_role');
	}

	public function check_the_existing_name_user_role_addnew($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('user_role');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_user_role_update($id,$name)
	{
		$this->db->select('name')->where(array('id !=' => $id,'name =' =>$name));
		$query = $this->db->get('user_role');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}
}

?>