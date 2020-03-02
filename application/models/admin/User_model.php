<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert_user($data)
	{
		$this->db->set('status',1);
		$this->db->set('deleted',0);
		$this->db->insert('user',$data);
		return $this->db->insert_id();
	}

	public function show_user()
	{
		$this->db->where(array('deleted' => 0));
		return $this->db->get('user')->result();
	}

	public function show_subscriber()
	{
		return $this->db->get('subscriber')->result();
	}

	public function check_the_existing_email_subscriber_addnew($email)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('subscriber');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function insert_subscriber($data)
	{
		$this->db->set('subscribe_date', date('Y-m-d H:i:s'));
		$this->db->set('status',1);
		$this->db->insert('subscriber',$data);
		return $this->db->insert_id();
	}

	public function update_subscriber($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->set('unsubscribe_date', date('Y-m-d H:i:s'));
		$this->db->update('subscriber',$data);
	}

	public function show_user_deleted()
	{
		$this->db->where(array('status' => 0,'deleted' => 1));
		return $this->db->get('user')->result();
	}

	public function get_user_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('user')->row();
	}

	public function get_user_by_email($email)
	{
		$this->db->where(array('email' => $email,'status' => 1));
		return $this->db->get('user')->row();
	}

	public function update_user($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function restore_user($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function update_user_info($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function remove_user($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user');
	}

}

?>