<?php 

class Model_vehicle_types extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllVehicleTypes()
	{
		$sql = "SELECT * FROM `vehicle_types`";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

}