<?php 

class Model_ponal extends CI_Model
{
	private $table = 'ponal';

	public function __construct()
	{
		parent::__construct();
	}

	public function getPonalByEmployeeId($employee_id)
	{
		$sql = "SELECT *
				FROM $this->table tab
				WHERE tab.employee_id = ?";
		$query = $this->db->query($sql, array($employee_id));
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

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update($this->table, $data);
		return ($update == true) ? true : false;
	}
}