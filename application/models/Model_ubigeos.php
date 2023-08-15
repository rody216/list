<?php 

class Model_ubigeos extends CI_Model
{
	private $table = 'ubigeos';

	public function __construct()
	{
		parent::__construct();
	}

	public function getUbigeoById($id)
	{
		$sql = "SELECT * FROM $this->table
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	public function getUbigeoDetail($id)
	{
		$sql = "SELECT tab.id, cou.name as country_name, dep.name as department_name,
				pro.name as province_name
				FROM $this->table tab
				INNER JOIN countries cou ON cou.id = tab.country_id
				INNER JOIN departments dep ON dep.id = tab.department_id
				INNER JOIN provinces pro ON pro.id = tab.province_id
				WHERE tab.id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	public function getUbigeo($country_id, $department_id, $provincie_id)
	{
		$sql = "SELECT * FROM $this->table
				WHERE country_id = ? AND department_id = ? AND province_id = ?";
		$query = $this->db->query($sql, array($country_id, $department_id, $provincie_id));
		return $query->row_array();
	}
}