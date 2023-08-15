<?php 

class Model_countries extends CI_Model
{
	private $table = 'countries';

	public function __construct()
	{
		parent::__construct();
	}

	/*get the active document_types information*/
	public function getAllCountries()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

}