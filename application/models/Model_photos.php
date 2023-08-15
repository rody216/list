<?php 

class Model_photos extends CI_Model
{
	private $table = 'photos';

	public function __construct()
	{
		parent::__construct();
	}

	public function getPhotoByPersonId($person_id)
	{
		$sql = "SELECT * FROM $this->table
				WHERE person_id = ? ORDER BY photo_date DESC LIMIT 1";
		$query = $this->db->query($sql, array($person_id));
		
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