<?php
class Patient extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index() {
        // $data['patients'] = $this->Patient_model->get_all();
        // $data['total_patients'] = $this->Patient_model->count_all();
        $data=[];
         $this->load->view('admin/service/top-section',$data);
        $this->load->view('admin/service/patient_registration', $data);
        $this->load->view('admin/service/footer',$data);
        
    }
    
    public function save() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/patient');
        }
        
        $data = array(
            'name' => $this->input->post('name'),
            'age' => $this->input->post('age'),
            'gender' => $this->input->post('gender'),
            'mobile' => $this->input->post('mobile'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status'),
            'registration_date' => $this->input->post('registration_date')
        );
        
        $id = $this->input->post('patient_id');
        if (!empty($id)) {
            $this->Patient_model->update($id, $data);
            $this->session->set_flashdata('success', 'Patient updated successfully!');
        } else {
            $data['patient_id'] = 'PAT' . str_pad($this->Patient_model->get_next_id(), 4, '0', STR_PAD_LEFT);
            $this->Patient_model->insert($data);
            $this->session->set_flashdata('success', 'Patient registered successfully!');
        }
        
        redirect('admin/patient');
    }
    
    public function get($id) {
        $patient = $this->Patient_model->get($id);
        if ($patient) {
            echo json_encode(['status' => 'success', 'data' => $patient]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function delete($id) {
        if ($this->Patient_model->delete($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function view($id) {
        $data['patient'] = $this->Patient_model->get($id);
        $this->load->view('admin/patient_view', $data);
    }
    
    public function print($id) {
        $data['patient'] = $this->Patient_model->get($id);
        $this->load->view('admin/patient_print', $data);
    }
    
    public function export() {
        $patients = $this->Patient_model->get_all();
        // Export logic here
    }
}
?>