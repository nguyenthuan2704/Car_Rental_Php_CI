<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function show_page()
	{
		return $this->db->get('introduce')->result();
	}

	public function insert_page($data)
	{
		$this->db->insert('introduce',$data);
		return $this->db->insert_id();
	}

	public function update_page($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('introduce',$data);
	}

	public function update_page_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('introduce')->row();
	}

	public function delete_page($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('introduce');
	}

	public function check_the_existing_name_page_addnew($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('introduce');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_page_update($id,$name)
	{
		$this->db->select('name')->where(array('id !=' => $id,'name =' =>$name));
		$query = $this->db->get('introduce');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}

}
?>