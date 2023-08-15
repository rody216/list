<?php 

class Model_civil_status extends CI_Model
{
	private $table = 'civil_status';

	public function __construct()
	{
		parent::__construct();
	}

	public function getCivilStatus()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
}