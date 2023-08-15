<?php 

class Model_document_types extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*get the active document_types information*/
	public function getAllDocumentTypes()
	{
		$sql = "SELECT * FROM `document_types`";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getDocumentTypeData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM `document_types` WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM `document_types`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('document_types', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('document_types', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('document_types');
			return ($delete == true) ? true : false;
		}
	}

}