<?php 

class Model_families extends CI_Model
{
	private $table = 'families';

	public function __construct()
	{
		parent::__construct();
	}

	public function getFamiliesByEmployeeId()
	{
		$sql = "SELECT tab.*, per.document_number, per.first_name, per.last_name, dot.name as document_type_name,
				rel.name as relationship_name
				FROM $this->table tab
				INNER JOIN persons per ON per.id = tab.person_id
				INNER JOIN document_types dot ON dot.id = per.document_type_id
				INNER JOIN relationship rel ON rel.id = tab.relationship_id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert($this->table, $data);

			if ($insert) {
				$lastInsertId = $this->db->insert_id();
		
				return $lastInsertId;
			} else {
				return false;
			}
		}
	}
}