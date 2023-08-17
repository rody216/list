<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/tcpdf/tcpdf.php';

class Documents extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Employees';

		$this->load->model('model_document_types');
        $this->load->model('model_persons');
        $this->load->model('model_employees');
        $this->load->model('model_families');
        $this->load->model('model_countries');
		$this->load->model('model_departments');
		$this->load->model('model_provinces');
        $this->load->model('model_spoa');
        $this->load->model('model_rnmc');
        $this->load->model('model_mmp');
        $this->load->model('model_ponal');
        $this->load->model('model_procuradoria');
        $this->load->model('model_judicial');
        $this->load->model('model_properties');
        $this->load->model('model_ubigeos');
        $this->load->model('model_vehicle_types');
        $this->load->model('model_vehicles');
        $this->load->model('model_banking');
        $this->load->model('model_users');
	}

    public function search()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('notice_number', 'Numero de noticia', 'trim|required');
		$this->form_validation->set_rules('quality', 'Calidad', 'trim|required');
		$this->form_validation->set_rules('crime', 'Delito', 'trim|required');
		$this->form_validation->set_rules('date_issue', 'Fecha de hechos', 'trim|required');
        $this->form_validation->set_rules('detail', 'Amplicación de hecjps', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $upload_document = $this->upload_document();
            
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'notice_number' => $this->input->post('notice_number'),
        		'quality' => $this->input->post('quality'),
        		'crime' => $this->input->post('crime'),
        		'date_issue' => $this->input->post('date_issue'),
        		'pdf' => $upload_document,
        		'detail' => $this->input->post('detail'),
        	);

            if(!$upload_document) {
                unset($data['pdf']);
            }

            $this->db->trans_start();

            try {
                $document_id = $this->input->post('document_id');

                if($document_id == '') {
                    $this->model_spoa->create($data);
                }
                else {
                    $this->model_spoa->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/search', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/search', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
           
            $user_id = $this->session->userdata('id');
		    $user_data = $this->model_users->getUserData($user_id);
		    $this->data['user_data'] = $user_data;

            $this->render_template('documents/search', $this->data);
        }
	}

    public function searchEmployees()
	{
        $document_type_id = $this->input->post('document_type_id');
        $document_number = $this->input->post('document_number');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');

		$employees = $this->model_employees->searchEmployees($document_type_id, $document_number, $first_name, $last_name);

        $data['employees'] = $employees;

        echo json_encode($data);
	}

    public function report($employee_id) {
        $pdf = new TCPDF();

        $pdf->SetCreator('Nombre del creador');
        $pdf->SetAuthor('Nombre del autor');
        $pdf->SetTitle('Título del documento');
        $pdf->SetSubject('Asunto del documento');
        $pdf->SetKeywords('palabra clave 1, palabra clave 2, palabra clave 3');

        $pdf->AddPage();
        
        $html = '';
        
        $this->data['employee'] = $this->model_employees->getEmployeeById($employee_id);
        $this->data['spoa'] = $this->model_spoa->getSpoaByEmployeeId($employee_id);
        $this->data['rnmc'] = $this->model_rnmc->getRnmcByEmployeeId($employee_id);
        $this->data['mmp'] = $this->model_mmp->getMmpByEmployeeId($employee_id);
        $this->data['ponal'] = $this->model_ponal->getPonalByEmployeeId($employee_id);
        $this->data['properties'] = $this->model_properties->getPropertiesByEmployeeId($employee_id);
        $this->data['vehicles'] = $this->model_vehicles->getVehiclesByEmployeeId($employee_id);
        
        $html = $this->load->view('documents/report', $this->data, true);

        $pdf->writeHTML($html, true, false, true, false, '');
       
        $pdf->Output('nombre-del-archivo.pdf', 'I');
    }

    public function employee($employee_id) {
        $this->data['spoa'] = $this->model_spoa->getSpoaByEmployeeId($employee_id);
        $this->data['rnmc'] = $this->model_rnmc->getRnmcByEmployeeId($employee_id);
        $this->data['mmp'] = $this->model_mmp->getMmpByEmployeeId($employee_id);
        $this->data['ponal'] = $this->model_ponal->getPonalByEmployeeId($employee_id);
        $this->data['properties'] = $this->model_properties->getPropertiesByEmployeeId($employee_id);
        $this->data['vehicles'] = $this->model_vehicles->getVehiclesByEmployeeId($employee_id);
        $this->data['banking'] = $this->model_banking->getBankingByEmployeeId($employee_id);
        $this->data['employee'] = $this->model_employees->getEmployeeById($employee_id);
        $this->data['families'] = $this->model_families->getFamiliesByEmployeeId($employee_id);

		foreach ($this->data['families'] as $key => $value) {
			$document_info = $value['document_type_name']. ' ' . $value['document_number'];
            $full_name = $value['first_name']. ' ' . $value['last_name'];


			$result['data'][$key] = array(
				'' ,
				$document_info,
				$full_name,
				$value['relationship_name'],
			);
		}

        $this->render_template('employees/record-private', $this->data);
    }
    
    public function spoa()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('notice_number', 'Numero de noticia', 'trim|required');
		$this->form_validation->set_rules('quality', 'Calidad', 'trim|required');
		$this->form_validation->set_rules('crime', 'Delito', 'trim|required');
		$this->form_validation->set_rules('date_issue', 'Fecha de hechos', 'trim|required');
        $this->form_validation->set_rules('detail', 'Amplicación de hecjps', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $upload_document = $this->upload_document();
            
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'notice_number' => $this->input->post('notice_number'),
        		'quality' => $this->input->post('quality'),
        		'crime' => $this->input->post('crime'),
        		'date_issue' => $this->input->post('date_issue'),
        		'pdf' => $upload_document,
        		'detail' => $this->input->post('detail'),
        	);

            if(!$upload_document) {
                unset($data['pdf']);
            }

            $this->db->trans_start();

            try {
                $document_id = $this->input->post('document_id');

                if($document_id == '') {
                    $this->model_spoa->create($data);
                }
                else {
                    $this->model_spoa->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/spoa', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/spoa', 'refresh');
            }
        }
        else {
            // false case
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/spoa', $this->data);
        }
	}

    public function rnmc()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('file_number', 'Numero de expediente', 'trim|required');
		$this->form_validation->set_rules('article', 'Articulo', 'trim|required');
		$this->form_validation->set_rules('numeral', 'Numeral', 'trim|required');
		$this->form_validation->set_rules('detail', 'Relato de hechos', 'trim|required');
        $this->form_validation->set_rules('arguments', 'Descargos', 'trim|required');
        $this->form_validation->set_rules('measures', 'Medidas correctivas', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $document_id = $this->input->post('document_id');
            $country_id = $this->input->post('country_id');
            $department_id = $this->input->post('department_id');
            $province_id = $this->input->post('province_id');
            
            $ubigeo = $this->model_ubigeos->getUbigeo($country_id, $department_id, $province_id);

            if(!is_null($ubigeo)) {
                $ubigeos_id = $ubigeo['id'];
            }
            else {
                $ubigeos_id = null;
            }

            $upload_document = $this->upload_document();

            // print_r($upload_document); exit;

            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'file_number' => $this->input->post('file_number'),
        		'ubigeo_id' => $ubigeos_id,
        		'article' => $this->input->post('article'),
        		'numeral' => $this->input->post('numeral'),
        		'detail' => $this->input->post('detail'),
        		'date_issue' => $this->input->post('date_issue'),
        		'arguments' => $this->input->post('arguments'),
                'pdf' => $upload_document,
        		'measures' => $this->input->post('measures'),
        	);

            if(!$upload_document) {
                unset($data['pdf']);
            }

            if(is_null($ubigeo)) {
                unset($data['ubigeo_id']);
            }

            $this->db->trans_start();

            try {
                if($document_id == '') {
                    $this->model_rnmc->create($data);
                }
                else {
                    $this->model_rnmc->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/rnmc', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/rnmc', 'refresh');
            }
        }
        else {
            $this->data['countries'] = $this->model_countries->getAllCountries();
			$this->data['departments'] = $this->model_departments->getDepartments();
			$this->data['provinces'] = $this->model_provinces->getProvinces();
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/rnmc', $this->data);
        }
	}

    public function mmp()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('article', 'Articulo', 'trim|required');
		$this->form_validation->set_rules('numeral', 'Delito', 'trim|required');
		$this->form_validation->set_rules('detail', 'Relato de hechos', 'trim|required');
        $this->form_validation->set_rules('arguments', 'Descargos', 'trim|required');
        $this->form_validation->set_rules('reconciliations', 'Conciliaciones', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {

            $country_id = $this->input->post('country_id');
            $department_id = $this->input->post('department_id');
            $province_id = $this->input->post('province_id');
            $document_id = $this->input->post('document_id');
            
            if(count($ubigeos_id)) {
                $ubigeos_id = $this->model_ubigeos->getUbigeo($country_id, $department_id, $province_id);
            }
            else {
                $ubigeos_id = null;
            }

            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'ubigeo_id' => $ubigeos_id,
        		'article' => $this->input->post('article'),
        		'numeral' => $this->input->post('numeral'),
        		'detail' => $this->input->post('detail'),
        		'date_issue' => $this->input->post('date_issue'),
        		'arguments' => $this->input->post('arguments'),
        		'reconciliations' => $this->input->post('reconciliations'),
        	);

            $this->db->trans_start();

            try {
                if($document_id == '') {
                    $this->model_mmp->create($data);
                }
                else {
                    $this->model_mmp->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/mmp', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/mmp', 'refresh');
            }
        }
        else {
            $this->data['countries'] = $this->model_countries->getAllCountries();
			$this->data['departments'] = $this->model_departments->getDepartments();
			$this->data['provinces'] = $this->model_provinces->getProvinces();
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/mmp', $this->data);
        }
	}

    public function ponal()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('date_issue', 'Fecha de hechos', 'trim|required');
		$this->form_validation->set_rules('time_issue', 'Hora de hechos', 'trim|required');
		$this->form_validation->set_rules('results', 'Resultados', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'date_issue' => $this->input->post('date_issue'),
        		'time_issue' => $this->input->post('time_issue'),
        		'results' => $this->input->post('results'),
        		'update_date' => date('Y-m-d H:i:s')
        	);

            $this->db->trans_start();

            try {
                $document_id = $this->input->post('document_id');

                if($document_id == '') {
                    $this->model_ponal->create($data);
                }
                else {
                    $this->model_ponal->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/ponal', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/ponal', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/ponal', $this->data);
        }
	}

    public function procuradoria()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('certificate_number', 'Numero de certificado', 'trim|required');
		$this->form_validation->set_rules('siri', 'Siri', 'trim|required');
		$this->form_validation->set_rules('date_issue', 'Fecha de hechos', 'trim|required');
		$this->form_validation->set_rules('time_issue', 'Hora de hechos', 'trim|required');
		$this->form_validation->set_rules('results', 'Delito', 'trim|required');
		$this->form_validation->set_rules('sanction', 'Sanción', 'trim|required');
		$this->form_validation->set_rules('providence', 'Providencia', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'certificate_number' => $this->input->post('certificate_number'),
        		'siri' => $this->input->post('siri'),
        		'date_issue' => $this->input->post('date_issue'),
        		'time_issue' => $this->input->post('time_issue'),
        		'results' => $this->input->post('results'),
        		'sanction' => $this->input->post('sanction'),
        		'providence' => $this->input->post('providence'),
        		'update_date' => date('Y-m-d H:i:s')
        	);

            $this->db->trans_start();

            try {
                $document_id = $this->input->post('document_id');

                if($document_id == '') {
                    $this->model_procuradoria->create($data);
                }
                else {
                    $this->model_procuradoria->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/procuradoria', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/procuradoria', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/procuradoria', $this->data);
        }
	}

    public function judicial()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('processes_number', 'Número de Procesos', 'trim|required');
		$this->form_validation->set_rules('date_issue', 'Fecha Radificación', 'trim|required');
		$this->form_validation->set_rules('class', 'Clase', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'processes_number' => $this->input->post('processes_number'),
        		'date_issue' => $this->input->post('date_issue'),
        		'class' => $this->input->post('class'),
        		'status' => $this->input->post('status')
        	);

            $this->db->trans_start();

            try {
                $document_id = $this->input->post('document_id');

                if($document_id == '') {
                    $this->model_judicial->create($data);
                }
                else {
                    $this->model_judicial->edit($data, $document_id);
                }
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/judicial', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/judicial', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();

            $this->render_template('documents/judicial', $this->data);
        }
	}

    public function property()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('city', 'Ciudad', 'trim|required');
		$this->form_validation->set_rules('office', 'Oficina', 'trim|required');
		$this->form_validation->set_rules('plate', 'Matrícula', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'city' => $this->input->post('city'),
        		'office' => $this->input->post('office'),
        		'plate' => $this->input->post('plate'),
        	);

            $this->db->trans_start();

            try {
                $this->model_properties->create($data);
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/property', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/property', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
            $this->render_template('documents/property', $this->data);
        }
	}

    public function vehicles()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('model', 'Modelo', 'trim|required');
		$this->form_validation->set_rules('mark', 'Marca', 'trim|required');
		$this->form_validation->set_rules('line', 'Linea', 'trim|required');
		$this->form_validation->set_rules('traffic_secretary', 'Secretaria de transito', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $upload_document = $this->upload_document();
            
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'plate' => $this->input->post('plate'),
        		'model' => $this->input->post('model'),
        		'mark' => $this->input->post('mark'),
        		'line' => $this->input->post('line'),
        		'traffic_secretary' => $this->input->post('traffic_secretary'),
                'pdf' => $upload_document,
        	);

            if(!$upload_document) {
                unset($data['pdf']);
            }

            $this->db->trans_start();

            try {
                $this->model_vehicles->create($data);
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/vehicles', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/vehicles', 'refresh');
            }
        }
        else {
            $this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
			$this->data['vehicle_types'] = $this->model_vehicle_types->getAllVehicleTypes();
            $this->render_template('documents/vehicles', $this->data);
        }
	}

    public function banking()
	{
		if(!in_array('createDocument', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('employee_id', 'Id de empleado', 'trim|required');
		$this->form_validation->set_rules('financial_entity', 'Entidad financiera', 'trim|required');
		$this->form_validation->set_rules('product_type', 'Tipo producto', 'trim|required');
		$this->form_validation->set_rules('product_number', 'Numero producto', 'trim|required');
		
        if ($this->form_validation->run() == TRUE) {
            $data = array(
        		'employee_id' => $this->input->post('employee_id'),
        		'financial_entity' => $this->input->post('financial_entity'),
        		'product_type' => $this->input->post('product_type'),
        		'product_number' => $this->input->post('product_number'),
        	);

            $this->db->trans_start();

            try {
                $this->model_banking->create($data);
                
                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Successfully created');
        		redirect('documents/banking', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('documents/banking', 'refresh');
            }
        }
        else {
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
            $this->render_template('documents/banking', $this->data);
        }
	}

    public function fetchPersonByDocumentNumber($page, $document_type_id, $document_number)
	{
		$employee = $this->model_employees->getEmployeeByDocumentNumber($document_type_id, $document_number);

        $data['employee'] = $employee;

        $document = null;

        if($page == 'spoa') {
            $document = $this->model_spoa->getSpoaByEmployeeId($employee['id']);
        }
        else if($page == 'rnmc') {
            $document = $this->model_rnmc->getRnmcByEmployeeId($employee['id']);
        }
        else if($page == 'mmp') {
            $document = $this->model_mmp->getMmpByEmployeeId($employee['id']);
        }
        else if($page == 'ponal') {
            $document = $this->model_ponal->getPonalByEmployeeId($employee['id']);
        }
        else if($page == 'procuradoria') {
            $document = $this->model_procuradoria->getProcuradoriaByEmployeeId($employee['id']);
        }
        else if($page == 'judicial') {
            $document = $this->model_judicial->getJudicialByEmployeeId($employee['id']);
        }

        $data['document'] = $document;

        echo json_encode($data);
	}

    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	public function upload_document()
    {
        if (!isset($_FILES['pdf'])) {
            return false;
        }
        else {
            
            $config['upload_path'] = 'assets/images/file_documents';
            $config['file_name'] =  uniqid();
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('pdf'))
            {
                $error = $this->upload->display_errors();
                return $error;
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $type = explode('.', $_FILES['pdf']['name']);
                $type = $type[count($type) - 1];
                
                $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
                return ($data == true) ? $path : false;
            }
        }
    	
    }

}