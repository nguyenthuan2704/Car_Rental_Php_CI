<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookCar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_booking()
	{
		return $this->db->get('booking')->result();
	}

	public function show_booking_cancel()
	{
		$this->db->where(array('status' => 0));
		return $this->db->get('booking')->result();
	}

	public function show_booking_for_user_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->get('booking')->result();
	}

	public function insert_booking($data)
	{
		$this->db->set('booking_date',date('Y-m-d H:i:s'));
		$this->db->set('status',1);
		$this->db->insert('booking',$data);
		return $this->db->insert_id();
	}

	public function cancel_bill_by_user_admin($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('booking',$data);
	}

	public function cancel_bill($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('booking');
	}
}

?>