<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_contact()
	{
		return $this->db->get('contact')->result();
	}

	public function show_contact_unread()
	{
		$this->db->where(array('status' => 1));
		return $this->db->get('contact')->result();
	}

	public function show_contact_new()
	{
		$this->db->where(array('status' => 1))->order_by('id','DESC');
		return $this->db->get('contact')->result();
	}

	public function show_contact_examined()
	{
		$this->db->where(array('status' => 0));
		return $this->db->get('contact')->result();
	}

	public function get_contact_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('contact')->row();
	}

	public function insert_contact($data)
	{
		$this->db->set('contact_date', date('Y-m-d H:i:s'));
		$this->db->set('status',1);
		$this->db->insert('contact',$data);
		return $this->db->insert_id();
	}

	public function update_contact($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('contact',$data);
	}

	public function delete_contact($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('contact');
	}
}

?>