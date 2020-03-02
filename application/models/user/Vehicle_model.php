<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

// Vehicle

	public function show_vehicle()
	{
		$this->db->where(array('status' => 1))->order_by('id','DESC')->limit(8);
		return $this->db->get('vehicle')->result();
	}

	public function total_vehicle()
	{
		$this->db->where(array('status' => 1));
		return $this->db->get('vehicle')->num_rows();
	}

	public function pagination_product($number, $offset)
	{
		$this->db->where(array('status' => 1))->limit($number, $offset);
		return $this->db->get('vehicle')->result();
	}

	public function show_vehicle_hot()
	{
		$this->db->where(array('status' => 1,'hot' => 1))->limit(8);
		return $this->db->get('vehicle')->result();
	}

	public function get_vehicle_for_id($id)
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

// Vehicle Type
	public function vehicle_type()
	{
		$this->db->where(array('status' => 1));
		return $this->db->get('vehicle_type')->result();
	}

	public function get_vehicle_type_for_vehicle_type_id($vehicle_type_id)
	{
		$this->db->where('id',$vehicle_type_id);
		return $this->db->get('vehicle_type')->row();
	}

	public function get_vehicle_for_vehicle_type_id($vehicle_type_id)
	{
		$this->db->where('vehicle_type_id',$vehicle_type_id);
		return $this->db->get('vehicle')->row();
	}

    public function total_vehicle_by_type($vehicle_type_id)
	{
		$this->db->where(array(
			'status' => 1,
			'vehicle_type_id' => $vehicle_type_id
		));
		return $this->db->get('vehicle')->num_rows();
	}

	public function pagination_vehicle_by_type($vehicle_type_id, $number, $offset)
    {
        $this->db->where(array(
        	'status' => 1,
        	'vehicle_type_id' => $vehicle_type_id
        ))->limit($number, $offset);
        return $this->db->get('vehicle')->result();
    }

// Vehicle Brand
	public function vehicle_brand()
	{
		$this->db->where(array('status' => 1));
		return $this->db->get('vehicle_brand')->result();
	}

	public function get_brand_by_type($vehicle_type_id)
	{
		$this->db->where(array('status' => 1,'vehicle_type_id' => $vehicle_type_id));
		return $this->db->get('vehicle_brand')->result();
	}

	public function get_brand_by_id($id)
	{
		$this->db->where(array('status' => 1,'id' => $id));
		return $this->db->get('vehicle_brand')->row();
	}

    public function total_vehicle_by_brand($vehicle_brand_id)
	{
		$this->db->where(array(
			'status' => 1,
			'vehicle_brand_id' => $vehicle_brand_id
		));
		return $this->db->get('vehicle')->num_rows();
	}

	public function pagination_vehicle_by_brand($vehicle_brand_id, $number, $offset)
    {
        $this->db->where(array(
        	'status' => 1,
        	'vehicle_brand_id' => $vehicle_brand_id
        ))->limit($number, $offset);
        return $this->db->get('vehicle')->result();
    }

}

?>