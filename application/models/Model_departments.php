<?php 

class Model_departments extends CI_Model
{
	private $table = 'departments';

	public function __construct()
	{
		parent::__construct();
	}

	public function getDepartments()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getDepartmentsByCountry($country_id)
	{
		$sql = "SELECT * FROM $this->table WHERE country_id = ?";
		$query = $this->db->query($sql, array($country_id));
		
		return $query->result_array();
	}
}