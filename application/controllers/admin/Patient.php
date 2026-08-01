<?php
class Patient extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
   public function index()
{
    // Product dropdown
    $data['doctor'] = $this->db->get_where('doctor_master',array('status'=>1))->result_array();
    $data['product_master'] = $this->db
        ->select('product_master.*,test_master.id as test_id,test_master.name,test_master.quantity')
        ->from('product_master')
        ->join('test_master','product_master.product_id = test_master.id')
        ->where('product_master.status', 1)
        ->group_by('product_id')
        ->get()
        ->result_array();

    // Pathology Report List
    $data['reports'] = $this->db
        ->select('
           pathology_report.id,
            pathology_report.report_date,
            pathology_report.test_id,
            patient_master.id,
            patient_master.name,
            patient_master.age,
            patient_master.gender,
            patient_master.mobile,
            test_master.id,test_master.name,test_master.quantity,')
        ->from('patient_master')
        ->join('pathology_report','pathology_report.patient_id = patient_master.id','left')
        ->join('test_master','pathology_report.test_id = test_master.id')
        ->order_by('pathology_report.id','DESC')
        ->get()
        ->result_array();
        $this->load->view('admin/service/top-section', $data);
        $this->load->view('admin/service/patient_registration', $data);
        $this->load->view('admin/service/footer', $data);
}
    
public function get_sub_test()
{
    $product_name = $this->input->post('product_name');
   

    $data = $this->db
        ->where('product_name',$product_name)
        ->where('status',1)
        ->get('product_master')
        ->result_array();

    echo json_encode($data);
}
public function save()
{
    $this->db->trans_start();
    // Save Report Header
    $report = array(
        'patient_id'  => $patient_id,
        'test_name'   => $this->input->post('test_name'),
        'report_date' => date('Y-m-d')
    );

    $this->db->insert('pathology_report', $report);
    $report_id = $this->db->insert_id();

    // Save Report Details
    $product_ids = $this->input->post('sub_product_id');
    $results     = $this->input->post('result_value');
    
    #which columns having values then save that particular column which column is not values not save on database
    #means which product_ids having result values that product show on and save on database
if (!empty($product_ids)) {

    foreach ($product_ids as $k => $id) {

        $result = isset($results[$k]) ? trim($results[$k]) : '';

        // Skip if result is empty
        if ($result == '') {
            continue;
        }

        $product = $this->db
            ->where('id', $id)
            ->get('product_master')
            ->row_array();

        if ($product) {

            $detail = array(
                'report_id'     => $report_id,
                'product_id'    => $product['id'],
                'sub_product'   => $product['sub_product'],
                'result_value'  => $result,
                'normal_values' => $product['normal_values'],
                'unit'          => $product['unit'],
            );

            $this->db->insert('pathology_report_details', $detail);
        }
    }
}

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        show_error('Unable to save report.');
    }

    redirect('admin/patient/report/'.$report_id);
}
public function report($id)
{
    $data['patient']=$this->db
    ->select('patient_master.*,pathology_report.test_name,pathology_report.report_date,doctor_master.id,doctor_master.doctor_name,doctor_master.doctor_code')
    ->from('pathology_report')
    ->join('patient_master','patient_master.id=pathology_report.patient_id')
    ->join('doctor_master','doctor_master.id = patient_master.doctor')
    ->where('pathology_report.id',$id)
    ->get()
    ->row_array();

    $data['details']=$this->db
    ->where('report_id',$id)
    ->get('pathology_report_details')
    ->result_array();
    $this->load->view('admin/service/report',$data);
}
    public function get($id) {
        $patient = $this->Patient_model->get($id);
        if ($patient) {
            echo json_encode(['status' => 'success', 'data' => $patient]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
    public function delete($id)
    {
        $this->db->trans_start();

        $report = $this->db
            ->where('id',$id)
            ->get('pathology_report')
            ->row();

        if($report){

            $this->db->where('report_id',$id);
            $this->db->delete('pathology_report_details');

            $this->db->where('id',$id);
            $this->db->delete('pathology_report');

            $this->db->where('id',$report->patient_id);
            $this->db->delete('patient_master');
        }

        $this->db->trans_complete();

        if($this->db->trans_status()){
            echo json_encode([
                'status'=>'success',
                'message'=>'Report deleted successfully.'
            ]);
        }else{
            echo json_encode([
                'status'=>'error',
                'message'=>'Unable to delete report.'
            ]);
        }
    }
    
   public function print($id)
{
    $data['patient'] = $this->db
        ->select('
            patient_master.*,patient_master.id as patientid,
            pathology_report.id as report_id,
            pathology_report.test_name,
            pathology_report.report_date,doctor_master.id as doctorid,doctor_master.doctor_name
        ')
        ->from('pathology_report')
        ->join('patient_master','patient_master.id=pathology_report.patient_id')
        ->join('doctor_master','patient_master.doctor=doctor_master.id')
        ->where('pathology_report.id',$id)
        ->get()
        ->row_array();
        $data['details'] = $this->db
        ->select('
            pathology_report_details.*,
            product_master.product_name,
            product_master.sub_product
        ')
        ->from('pathology_report_details')
        ->join('product_master','product_master.id=pathology_report_details.product_id')
        ->where('pathology_report_details.report_id',$id)
        ->order_by('pathology_report_details.id','ASC')
        ->get()
        ->result_array();

    $this->load->view('admin/service/patient_print',$data);
}
    
    public function export() {
        $patients = $this->Patient_model->get_all();
        // Export logic here
    }
    public function patient_registration(){
        $data['doctor'] = $this->db->get_where('doctor_master',array('status'=>1))->result_array();
        $data['patient'] = $this->db->get_where('patient_master',array('status'=>1))->result_array();
        $this->load->view('admin/service/top-section', $data);
        $this->load->view('admin/service/patient_form', $data);
        $this->load->view('admin/service/footer', $data);
    }
   public function patient_save()
{
    $patient_id = $this->input->post('patient_id');

    $patient = array(
        'name'              => $this->input->post('name'),
        'age'               => $this->input->post('age'),
        'gender'            => $this->input->post('gender'),
        'mobile'            => $this->input->post('mobile'),
        'doctor'            => $this->input->post('doctor'),
        'registration_date' => $this->input->post('registration_date'),
        'address'           => $this->input->post('address')
    );

    if (!empty($patient_id)) {

        // Update existing patient
        $this->db->where('id', $patient_id);
        $result = $this->db->update('patient_master', $patient);
        if ($result) {
            $this->session->set_flashdata('success', 'Patient updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update patient.');
        }

    } else {

        // Insert new patient
        $result = $this->db->insert('patient_master', $patient);

        if ($result) {
            $this->session->set_flashdata('success', 'Patient registered successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to register patient.');
        }
    }

    redirect('admin/patient/patient_registration');
}
public function patient_delete($id){
         
           $this->db->where('id',$id);
           $result =  $this->db->delete('patient_master');
           
           if($result){
            echo json_encode([
                'status'=>'success',
                'message'=>'deleted successfully.'
            ]);
            }else{
                echo json_encode([
                    'status'=>'error',
                    'message'=>'deleted successfully.'
                ]);
            }  
           
        }
public function get_patient($id)
{
    // $patient = $this->db->get_where('patient_master', ['id' => $id])->row_array();
    $patient = $this->db->select('patient_master.*, doctor_master.id as doctorid,doctor_master.doctor_name,doctor_master.doctor_code')
            ->from('patient_master')
            ->join('doctor_master','patient_master.doctor=doctor_master.id')
            ->where('patient_master.id',$id)
            ->get()
            ->row_array();

    if($patient){

        echo json_encode([
            'status' => 'success',
            'data' => $patient
        ]);

    }else{

        echo json_encode([
            'status' => 'error',
            'message' => 'Patient not found'
        ]);
    }
}
}
?>