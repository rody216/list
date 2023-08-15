<?php 

class Model_relationship extends CI_Model
{
	private $table = 'relationship';

	public function __construct()
	{
		parent::__construct();
	}

	public function getRelationship()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
}