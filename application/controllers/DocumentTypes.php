<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentTypes extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Tipos de documentos';

		$this->load->model('model_document_types');
	}

	public function index()
	{
		if(!in_array('viewDocumentType', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_document_types->getDocumentTypeData();
		$this->data['results'] = $result;
		$this->render_template('documenttypes/index', $this->data);
	}

	public function fetchDocumentTypeData()
	{
		$result = array('data' => array());

		$data = $this->model_document_types->getDocumentTypeData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('viewDocumentType', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-success" onclick="editDocumentType('.$value['id'].')" data-toggle="modal" data-target="#editDocumentTypeModal"><i class="fa fa-pencil"></i> Editar</button>';	
			}
			
			if(in_array('deleteDocumentType', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger" onclick="removeDocumentType('.$value['id'].')" data-toggle="modal" data-target="#removeDocumentTypeModal"><i class="fa fa-trash"></i> Eliminar</button>
				';
			}				

			$result['data'][$key] = array(
				$value['name'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchDocumentTypeDataById($id)
	{
		if($id) {
			$data = $this->model_document_types->getDocumentTypeData($id);
			echo json_encode($data);
		}

		return false;
	}

	public function create()
	{
		if(!in_array('createDocumentType', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name' => $this->input->post('name'),
        	);

        	$create = $this->model_document_types->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Creado con éxito';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error en la base de datos al crear la información de Documento';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);

	}

	public function update($id)
	{
		if(!in_array('updateDocumentType', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_name', 'DocumentType name', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_name'),	
	        	);

	        	$update = $this->model_document_types->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Registro Actualizado correctamente.';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error en la base de datos al editar la información de Documento';
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Actualizar la página de nuevo!!';
		}

		echo json_encode($response);
	}

	public function remove()
	{
		if(!in_array('deleteDocumentType', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$document_type_id = $this->input->post('document_type_id');
		$response = array();
		if($document_type_id) {
			$delete = $this->model_document_types->remove($document_type_id);

			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Documento Eliminado exitosamente";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error en la base de datos al eliminar la información de Documento";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Actualizar la página de nuevo!!";
		}

		echo json_encode($response);
	}

}