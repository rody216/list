<?php 

class Model_persons extends CI_Model
{
	private $table = 'persons';

	public function __construct()
	{
		parent::__construct();
	}

	public function getPersons()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getPersonByDocumentNumber($document_type_id, $document_number)
	{
		$sql = "SELECT * FROM $this->table
				WHERE document_type_id = ? AND document_number = ?";
		$query = $this->db->query($sql, array($document_type_id, $document_number));
		
		return $query->row_array();
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