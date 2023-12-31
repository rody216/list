<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Employees';
        $this->load->model('model_document_types');
        $this->load->model('model_countries');
        $this->load->model('model_departments');
        $this->load->model('model_provinces');
        $this->load->model('model_ubigeos');
        $this->load->model('model_blood_types');
        $this->load->model('model_civil_status');
        $this->load->model('model_relationship');
        $this->load->model('model_persons');
        $this->load->model('model_employees');
        $this->load->model('model_families');
        $this->load->model('model_photos');
        $this->load->model('model_users');
        $this->load->model('model_simit');
    }

    public function index()
    {
        if (!in_array('viewEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $user_id = $this->session->userdata('id');
        $user_data = $this->model_users->getUserData($user_id);
        $this->data['user_data'] = $user_data;
        $this->render_template('employees/index', $this->data);
    }

    public function fetchEmployeeData()
    {
        $result = array('data' => array());
        $data = $this->model_employees->getEmployees();

        foreach ($data as $key => $value) {
            $buttons = '';
            if (in_array('updateEmployee', $this->permission)) {
                 $buttons .= '<a href="'.base_url('employees/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
                $buttons .= '<a href="' . base_url('employees/family/' . $value['id']) . '" class="btn btn-succcess"><i class="fa fa-users"> Agregar Familiar</i></a>';
                $buttons .= '<a href="' . base_url('documents/employee/' . $value['id']) . '" class="btn btn-success"><i class="fa fa-file"></i> PDF</a>';
               // $buttons .= '<a href="' . base_url('documents/report/' . $value['id']) . '" target="_blank" class="btn btn-primary"><i class="fa fa-print"> Imprimir</i></a>';
            }

            // if(in_array('deleteEmployee', $this->permission)) {
            // 	$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            // }

            $photo = $this->model_photos->getPhotoByPersonId($value['person_id']);

            if (is_null($photo)) {
                $img = '';
            } else {
                $img = '<img src="' . base_url($photo['photo']) . '" alt="' . $photo['photo'] . '" class="img-circle" width="50" height="50" />';
            }

            $document_info = $value['document_type_name'] . ' ' . $value['document_number'];
            $full_name = $value['first_name'] . ' ' . $value['last_name'];

            $result['data'][$key] = array(
                $img,
                $document_info,
                $full_name,
                $buttons
            );
        }

        echo json_encode($result);
    }

    public function fetchDepartmentByCountry($country_id)
    {
        $data = $this->model_departments->getDepartmentsByCountry($country_id);

        echo json_encode($data);
    }

    public function fetchPersonByDocumentNumber($document_type_id, $document_number)
    {
        $data = $this->model_persons->getPersonByDocumentNumber($document_type_id, $document_number);

        if (isset($data['ubigeous_birth'])) {
            $data['ubigeos_birthdate'] = $this->model_ubigeos->getUbigeoDetail($data['ubigeous_birth']);
        }

        if (isset($data['ubigeous_residence'])) {
            $data['ubigeos_residence'] = $this->model_ubigeos->getUbigeoDetail($data['ubigeous_residence']);
        }


        echo json_encode($data);
    }

    public function fetchProvincesByDepartmentId($province_id)
    {
        $data = $this->model_provinces->getProvincesByDepartmentId($province_id);

        echo json_encode($data);
    }

    public function fetchFamiliesByEmployeeId($employee_id)
    {
        $result = array('data' => array());

        $data = $this->model_families->getFamiliesByEmployeeId($employee_id);

        foreach ($data as $key => $value) {
            $buttons = '';
            if (in_array('updateEmployee', $this->permission)) {
                $buttons .= '<a href="' . base_url('employees/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
                $buttons .= '<a href="' . base_url('employees/family/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-users"></i></a>';
            }

            if (in_array('deleteEmployee', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

            // $photo = $this->model_photos->getPhotoByPersonId($value['person_id']);

            // $img = '<img src="'.base_url($photo['photo']).'" alt="'.$photo['photo'].'" class="img-circle" width="50" height="50" />';

            $document_info = $value['document_type_name'] . ' ' . $value['document_number'];
            $full_name = $value['first_name'] . ' ' . $value['last_name'];


            $result['data'][$key] = array(
                '',
                $document_info,
                $full_name,
                $value['relationship_name'],
            );
        }

        echo json_encode($result);
    }

    public function create()
    {
        if (!in_array('createEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->form_validation->set_rules('document_type_id', 'Tipo de documento', 'trim|required');
		$this->form_validation->set_rules('document_number', 'Número de documento', 'trim|required');
		$this->form_validation->set_rules('first_name', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Apellido', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color: red;">El campo {field} es obligatorio.</span>');

		
        if ($this->form_validation->run() == TRUE) {
            $country_id = $this->input->post('country_id');
            $department_id = $this->input->post('department_id');
            $province_id = $this->input->post('province_id');
            $country_id2 = $this->input->post('country_id2');
            $department_id2 = $this->input->post('department_id2');
            $province_id2 = $this->input->post('province_id2');

            $ubigeous_birth = $this->model_ubigeos->getUbigeo($country_id, $department_id, $province_id);
            $ubigeous_residence = $this->model_ubigeos->getUbigeo($country_id2, $department_id2, $province_id2);

            $person_data = array(
        		'document_type_id' => $this->input->post('document_type_id'),
        		'document_number' => $this->input->post('document_number'),
        		'first_name' => $this->input->post('first_name'),
        		'last_name' => $this->input->post('last_name'),
        		
        	);

              // Agregar los otros campos si se proporcionan
        if ($this->input->post('civil_status_id')) {
            $person_data['civil_status_id'] = $this->input->post('civil_status_id');
        }
        if ($this->input->post('birthdate')) {
            $person_data['birthdate'] = $this->input->post('birthdate');
        }
        if ($this->input->post('ubigeous_birth')) {
            $person_data['ubigeous_birth'] = $this->input->post('id');
        }
         if ($this->input->post('ubigeous_residence')) {
            $person_data['ubigeous_residence'] = $this->input->post('id');
        }
        if ($this->input->post('address')) {
            $person_data['address'] = $this->input->post('address');
        }
        if ($this->input->post('blood_type_id')) {
            $person_data['blood_type_id'] = $this->input->post('blood_type_id');
        }
        if ($this->input->post('telephone')) {
            $person_data['telephone'] = $this->input->post('telephone');
        }
        if ($this->input->post('mobile_phone')) {
            $person_data['mobile_phone'] = $this->input->post('mobile_phone');
        }
        if ($this->input->post('email')) {
            $person_data['email'] = $this->input->post('email');
        }
        // Agregar más campos aquí

            $this->db->trans_start();

            try {
                $person_create_id = $this->model_persons->create($person_data);

                if($person_create_id) {
                    $employee_data = array(
                        'person_id' => $person_create_id,
                    );

                    $this->model_employees->create($employee_data);
                }

                if($_FILES['image']['size'] > 0) {
                    $upload_image = $this->upload_image();

                    $photo_date = $this->input->post('photo_date');

                    $upload_data = array(
                        'person_id' => $person_create_id,
                        'photo' => $upload_image,
                        'photo_date' => $photo_date,
                    );

                    
                    $this->model_photos->create($upload_data);
                }

                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Empleado Creado con Exito');
        		redirect('employees/', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('employees/create', 'refresh');
            }
        }
        else {
            // false case
			$this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
			$this->data['blood_types'] = $this->model_blood_types->getBloodTypes();
			$this->data['civil_status'] = $this->model_civil_status->getCivilStatus();
			$this->data['countries'] = $this->model_countries->getAllCountries();
			$this->data['departments'] = $this->model_departments->getDepartments();
			$this->data['provinces'] = $this->model_provinces->getProvinces();

            $this->render_template('employees/create', $this->data);
        }
	}



    public function family()
    {
        if (!in_array('createEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('employee_id', 'Agregue el empleado', 'trim|required');
        $this->form_validation->set_rules('document_type_id', 'Tipo de documento', 'trim|required');
        $this->form_validation->set_rules('document_number', 'Número de documento', 'trim|required');
        $this->form_validation->set_rules('first_name', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Apellido', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $employee_id = $this->input->post('employee_id');
            $country_id = $this->input->post('country_id');
            $department_id = $this->input->post('department_id');
            $province_id = $this->input->post('province_id');
            $country_id2 = $this->input->post('country_id2');
            $department_id2 = $this->input->post('department_id2');
            $province_id2 = $this->input->post('province_id2');
            $is_employee = $this->input->post('is_employee');
            $relationship_id = $this->input->post('relationship_id');

            $ubigeous_birth = $this->model_ubigeos->getUbigeo($country_id, $department_id, $province_id);
            $ubigeous_residence = $this->model_ubigeos->getUbigeo($country_id2, $department_id2, $province_id2);

            $person_data = array(
                'document_type_id' => $this->input->post('document_type_id'),
                'document_number' => $this->input->post('document_number'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'civil_status_id' => $this->input->post('civil_status_id'),
                'birthdate' => json_encode($this->input->post('birthdate')),
                'ubigeous_birth' => $ubigeous_birth['id'],
                'ubigeous_residence' => $ubigeous_residence['id'],
                'address' => json_encode($this->input->post('address')),
                'blood_type_id' => $this->input->post('blood_type_id'),
                'telephone' => $this->input->post('telephone'),
                'mobile_phone' => $this->input->post('mobile_phone'),
                'email' => $this->input->post('email'),
            );

            $this->db->trans_start();

            try {
                $person_create_id = $this->model_persons->create($person_data);

                if (isset($is_employee) && $is_employee == '1') {
                    if ($person_create_id) {
                        $employee_data = array(
                            'person_id' => $person_create_id,
                        );

                        $this->model_employees->create($employee_data);
                    }
                }

                $family_data = array(
                    'employee_id' => $employee_id,
                    'person_id' => $person_create_id,
                    'relationship_id' => $relationship_id,
                );

                $this->model_families->create($family_data);

                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Creado con éxito');
                redirect('employees/family/', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', '¡¡Se produjo un error!!');
                redirect('employees/family/', 'refresh');
            }
        } else {
            // false case
            $this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
            $this->data['countries'] = $this->model_countries->getAllCountries();
            $this->data['blood_types'] = $this->model_blood_types->getBloodTypes();
            $this->data['civil_status'] = $this->model_civil_status->getCivilStatus();
            $this->data['relationship'] = $this->model_relationship->getRelationship();

            $this->render_template('employees/family', $this->data);
        }
    }

    public function upload_image()
    {
        // assets/images/product_image
        $config['upload_path'] = 'assets/images/person_image';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['image']['name']);
            $type = $type[count($type) - 1];

            $path = $config['upload_path'] . '/' . $config['file_name'] . '.' . $type;
            return ($data == true) ? $path : false;
        }
    }


    public function update($employee_id)
    {
        // Check permissions and redirect if necessary
        if (!in_array('updateEmployee', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('document_type_id', 'Tipo de documento', 'trim|required');
        $this->form_validation->set_rules('document_number', 'Número de documento', 'trim|required');
        $this->form_validation->set_rules('first_name', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Apellido', 'trim|required');
        $this->form_validation->set_rules('blood_type_id', 'Apellido', 'trim|required');



        if ($this->form_validation->run() == TRUE) {
            $country_id = $this->input->post('country_id');
            $department_id = $this->input->post('department_id');
            $province_id = $this->input->post('province_id');
            $country_id2 = $this->input->post('country_id2');
            $department_id2 = $this->input->post('department_id2');
            $province_id2 = $this->input->post('province_id2');

            $ubigeous_birth = $this->model_ubigeos->getUbigeo($country_id, $department_id, $province_id);
            $ubigeous_residence = $this->model_ubigeos->getUbigeo($country_id2, $department_id2, $province_id2);



            // Get ubigeous_residence...

            $person_data = array(
                'document_type_id' => $this->input->post('document_type_id'),
                'document_number' => $this->input->post('document_number'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'civil_status_id' => $this->input->post('civil_status_id'),
                'birthdate' => $this->input->post('birthdate'),
                'ubigeous_birth' => $ubigeous_birth['id'],
                'ubigeous_residence' => $ubigeous_residence['id'],
                'address' => $this->input->post('address'),
                'blood_type_id' => $this->input->post('blood_type_id'),
                'telephone' => $this->input->post('telephone'),
                'mobile_phone' => $this->input->post('mobile_phone'),
                'email' => $this->input->post('email'),
            );

            $this->db->trans_start();

            try {
                // Update person and employee data
                $this->model_persons->update($employee_id, $person_data);
                // Update other related tables...

                if ($_FILES['image']['size'] > 0) {
                    $upload_image = $this->upload_image();
                    $photo_date = $this->input->post('photo_date');

                    $upload_data = array(
                        'person_id' => $employee_id,
                        'photo' => $upload_image,
                        'photo_date' => $photo_date,
                    );

                    $this->model_photos->update($employee_id, $upload_data);
                }

                $this->db->trans_commit();

                $this->session->set_flashdata('success', 'Actualizado exitosamente');
                redirect('employees/', 'refresh');
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('errors', 'Se produjo un error al actualizar');
                redirect('employees/update/' . $employee_id, 'refresh');
            }
        } else {
            // Load existing employee data and related info
            $employee_data = $this->model_employees->getEmployeeById($employee_id);
            $photo_data = $this->model_photos->getPhotoByPersonId($employee_id);
            // Load other related data...

            $this->data['employee_data'] = $employee_data;
            $this->data['photo_data'] = $photo_data;
            // Set other related data...

            $this->data['document_types'] = $this->model_document_types->getAllDocumentTypes();
            $this->data['blood_types'] = $this->model_blood_types->getBloodTypes();
            $this->data['civil_status'] = $this->model_civil_status->getCivilStatus();
            $this->data['countries'] = $this->model_countries->getAllCountries();
            $this->data['departments'] = $this->model_departments->getDepartments();
            $this->data['provinces'] = $this->model_provinces->getProvinces();
            $this->render_template('employees/update', $this->data);
        }
    }
}
        
        
        
        