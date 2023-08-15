<?php 

class Model_provinces extends CI_Model
{
	private $table = 'provinces';

	public function __construct()
	{
		parent::__construct();
	}

	public function getProvinces()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getProvincesByDepartmentId($department_id)
	{
		$sql = "SELECT * FROM $this->table WHERE department_id = ?";
		$query = $this->db->query($sql, array($department_id));
		
		return $query->result_array();
	}

}