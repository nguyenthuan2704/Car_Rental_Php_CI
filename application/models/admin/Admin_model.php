<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function stripUnicode($str)
	{
		if(!$str) :
			return false;
		endif;
		$unicode = array(
			'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd' => 'đ',
			'D' => 'Đ',
		  	'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		  	'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		  	'i' => 'í|ì|ỉ|ĩ|ị',
		  	'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
		 	'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		  	'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 	'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		  	'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 	'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
		 	'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 	''  => ':| -|)|!',
		 	'va'=> '&',
		 	'-' => ' |.|-(|,-|-+-'
		);
		foreach($unicode as $no_punctuation => $punctuation) :
			$arr = explode("|", $punctuation);
			$str = str_replace($arr, $no_punctuation, $str);
		endforeach;
		return $str;
	}

	public function changeTitle($str)
	{
		$str = trim($str);
		if ($str == "") :
			return "";
		endif;
		$str = str_replace('"', '', $str);
		$str = str_replace("'", '', $str);
		$str = $this->stripUnicode($str);
		$str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
		// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str = str_replace(' ', ' ', $str);
		return $str;
	}

//Search
	public function search($key)
	{
		$this->db->where('MATCH (name) AGAINST ("'.$key.'")', NULL, FALSE);
		return $this->db->get('vehicle')->result();
	}

	public function total_search_by_fulltext($key)
    {
        $this->db->where('MATCH (name) AGAINST ("'.$key.'")', NULL, FALSE);
        $this->db->where('status', 1);
        return $this->db->get('vehicle')->num_rows();
    }

    public function pagination_search_by_fulltext($key, $number, $offset)
    {
        $this->db->where('MATCH (name) AGAINST ("'.$key.'")', NULL, FALSE)->limit($number, $offset);
        return $this->db->get('vehicle')->result();
    }

    public function addnew_upload_image($data)
    {
        $this->db->insert('vehicle_image',$data);
    }

    public function get_upload_image_by_id($uploadImageId)
    {
        $this->db->where('id', $uploadImageId);
        return $this->db->get('vehicle_image')->row();
    }

    public function update_upload_image($uploadImageId, $data)
    {
        $this->db->where('id', $uploadImageId);
        $this->db->update('vehicle_image', $data);
    }

    public function delete_upload_image($uploadImageId)
    {
        $this->db->where('id', $uploadImageId);
        $this->db->delete('vehicle_image');
    }
// Vehicle Type
	public function show_vehicle_type()
	{
		return $this->db->get('vehicle_type')->result();
	}

	public function show_vehicle_type_for_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_type')->result();
	}

	public function get_vehicle_type_for_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_type')->row();
	}

	public function check_the_existing_name_vehicle_type_addnew($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('vehicle_type');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_type_update($id,$name)
	{
		$this->db->select('name')->where(array('id !=' => $id,'name =' =>$name));
		$query = $this->db->get('vehicle_type');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function insert_vehicle_type($data)
	{
		$this->db->insert('vehicle_type',$data);
		return $this->db->insert_id();
	}

	public function update_vehicle_type($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('vehicle_type',$data);
	}

	public function update_vehicle_type_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_type')->row();
	}

	public function delete_vehicle_type($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('vehicle_type');
	}

// Vehicle Brand

	public function check_the_existing_name_vehicle_brand_addnew($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('vehicle_brand');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_brand_update($id,$name)
	{
		$this->db->select('name')->where(array('id !=' => $id,'name =' =>$name));
		$query = $this->db->get('vehicle_brand');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function show_vehicle_brand()
	{
		return $this->db->get('vehicle_brand')->result();
	}

	public function show_vehicle_brand_for_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_brand')->result();
	}

	public function get_vehicle_brand_for_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_brand')->row();
	}

	public function delete_vehicle_brand($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('vehicle_brand');
	}

	public function update_vehicle_brand($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('vehicle_brand',$data);
	}

	public function update_vehicle_brand_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle_brand')->row();
	}

	public function insert_vehicle_brand($data)
	{
		$this->db->insert('vehicle_brand',$data);
		return $this->db->insert_id();
	}

// Vehicle

	public function check_the_existing_name_vehicle_addnew($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('vehicle');
		if($query->num_rows() > 0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function check_the_existing_name_vehicle_update($id,$name)
	{
		$this->db->select('name')->where(array('id !=' => $id,'name =' =>$name));
		$query = $this->db->get('vehicle');
		if($query->num_rows() >0):
			return FALSE;
		endif;
		return TRUE;
	}

	public function show_vehicle()
	{
		return $this->db->get('vehicle')->result();
	}

	public function show_vehicle_for_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle')->result();
	}

	public function get_vehicle_for_vehicle_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle')->row();
	}

	public function delete_vehicle($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('vehicle');
	}

	public function update_vehicle($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('vehicle',$data);
	}

	public function update_vehicle_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('vehicle')->row();
	}

	public function insert_vehicle($data)
	{
		$this->db->insert('vehicle',$data);
		return $this->db->insert_id();
	}

//Service
	public function show_service()
	{
		return $this->db->get('service')->result();
	}
//Booking
	public function show_booking()
	{
		$this->db->where('status',1);
		return $this->db->get('booking')->result();
	}

	public function show_booking_cancel()
	{
		$this->db->where('status',0);
		return $this->db->get('booking')->result();
	}

	public function show_booking_by_id($id)
	{
		$this->db->where(array('id'=> $id,'status' => 1));
		return $this->db->get('booking')->row();
	}

	public function get_booking_by_user_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->get('booking')->row();
	}

	public function show_all_booking_by_user_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->get('booking')->result();
	}

}

?>