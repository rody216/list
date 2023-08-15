<?php 

class Model_employees extends CI_Model
{
	private $table = 'employees';

	public function __construct()
	{
		parent::__construct();
	}

	public function getEmployees()
	{
		$sql = "SELECT tab.*, per.document_number, per.first_name, per.last_name, dot.name as document_type_name
				FROM $this->table tab
				INNER JOIN persons per ON per.id = tab.person_id
				INNER JOIN document_types dot ON dot.id = per.document_type_id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getEmployeeById($employee_id)
	{
		$sql = "SELECT per.*, tab.id, dot.name as document_type_name
				FROM $this->table tab
				INNER JOIN persons per ON per.id = tab.person_id
				INNER JOIN document_types dot ON dot.id = per.document_type_id
				WHERE tab.id = ?";
		$query = $this->db->query($sql, array($employee_id));
		
		return $query->row_array();
	}

	public function getEmployeeByDocumentNumber($document_type_id, $document_number)
	{
		$sql = "SELECT per.*, tab.id
				FROM $this->table tab
				INNER JOIN persons per ON per.id = tab.person_id
				WHERE per.document_type_id = ? AND per.document_number = ?";
		$query = $this->db->query($sql, array($document_type_id, $document_number));
		
		return $query->row_array();
	}

	public function searchEmployees($document_type_id, $document_number, $first_name, $last_name)
	{
		$sql = "SELECT per.*, tab.id
				FROM $this->table tab
				INNER JOIN persons per ON per.id = tab.person_id
				WHERE 1=1";

		$params = array();

		if (!empty($document_type_id)) {
			$sql .= " AND per.document_type_id = ?";
			$params[] = $document_type_id;
		}

		if (!empty($document_number)) {
			$sql .= " AND per.document_number LIKE CONCAT('%', ?, '%')";
			$params[] = $document_number;
		}

		if (!empty($first_name)) {
			$sql .= " AND per.first_name LIKE CONCAT('%', ?, '%')";
			$params[] = $first_name;
		}

		if (!empty($last_name)) {
			$sql .= " AND per.last_name LIKE CONCAT('%', ?, '%')";
			$params[] = $last_name;
		}

		$query = $this->db->query($sql, $params);

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

	public function countTotalEmployees()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}