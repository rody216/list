<?php 

class Model_blood_types extends CI_Model
{
	private $table = 'blood_types';

	public function __construct()
	{
		parent::__construct();
	}

	public function getBloodTypes()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
}