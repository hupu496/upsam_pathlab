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
    if($this->session->userdata('role')=='admin'){
        $data['product_master'] = $this->db
        ->select('product_master.*,test_master.id as test_id,test_master.name,test_master.quantity')
        ->from('product_master')
        ->join('test_master','product_master.product_id = test_master.id')
        ->where('product_master.status', 1)
        ->group_by('product_id')
        ->get()
        ->result_array();
       
    $data['patient_list'] = $this->db->get('patient_master')->result_array();

    // Pathology Report List
    $data['reports'] = $this->db
        ->select('
           pathology_report.id,
            pathology_report.report_date,
            pathology_report.test_id,
            pathology_report.status,
            patient_master.id as patientid,
            patient_master.name,
            patient_master.age,
            patient_master.gender,
            patient_master.mobile,
            test_master.id as testid,test_master.name as test_name,test_master.quantity,')
        ->from('patient_master')
        ->join('pathology_report','pathology_report.patient_id = patient_master.id','left')
        ->join('test_master','pathology_report.test_id = test_master.id')
        ->order_by('pathology_report.report_date','DESC')
        ->order_by('pathology_report.id','DESC')
        ->get()
        ->result_array();
    }else{
         $data['product_master'] = $this->db
        ->select('product_master.*,test_master.id as test_id,test_master.name,test_master.quantity')
        ->from('product_master')
        ->join('test_master','product_master.product_id = test_master.id')
        ->where('product_master.status', 1)
        ->group_by('product_id')
        ->get()
        ->result_array();
        $userid=$this->session->userdata('userid');   
        $data['patient_list'] = $this->db->get_where('patient_master',array('userid'=>$userid))->result_array();

    // Pathology Report List
    $data['reports'] = $this->db
        ->select('
           pathology_report.id,
            pathology_report.report_date,
            pathology_report.test_id,
            pathology_report.status,
            patient_master.id as patientid,
            patient_master.name,
            patient_master.age,
            patient_master.gender,
            patient_master.mobile,
            test_master.id as testid,test_master.name as test_name,test_master.quantity,')
        ->from('patient_master')
        ->join('pathology_report','pathology_report.patient_id = patient_master.id','left')
        ->join('test_master','pathology_report.test_id = test_master.id')
        ->order_by('pathology_report.report_date','DESC')
        ->order_by('pathology_report.id','DESC')
        ->where('patient_master.userid',$userid)
        ->where('pathology_report.userid',$userid)
        ->get()
        ->result_array();
    }
        $this->load->view('admin/service/top-section', $data);
        $this->load->view('admin/service/patient_registration', $data);
        $this->load->view('admin/service/footer', $data);
}
    
public function get_sub_test()
{
    $product_id = $this->input->post('product_id');
   

    $data = $this->db
        ->where('product_id',$product_id)
        ->where('status',1)
        ->get('product_master')
        ->result_array();

    echo json_encode($data);
}
public function search_by_mobile()
{
    $mobile = trim($this->input->post('mobile'));

    if ($mobile === '') {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a mobile number.']);
        return;
    }

    $patients = $this->db
        ->where('mobile', $mobile)
        ->get('patient_master')
        ->result_array();

    if (empty($patients)) {
        echo json_encode(['status' => 'error', 'message' => 'No patient found with this mobile number.']);
        return;
    }

    echo json_encode(['status' => 'success', 'data' => $patients]);
}
public function save()
{   
    $patient_id = $this->input->post('patient_id');
    $this->db->trans_start();
    $report = array(
        'patient_id'  => $patient_id,
        'test_id'   => $this->input->post('test_id'),
        'report_date' => date('Y-m-d'),
        'status'      => 0,   # 0 = values not entered yet (Generate Report shown)
        'userid'     => $this->session->userdata('userid'),
        'labid'      =>$this->session->userdata('labid'),
        'centerid'   =>$this->session->userdata('centerid')
    );
    $this->db->insert('pathology_report', $report);
    $report_id = $this->db->insert_id();

    // Save Report Details
    # sub_product_id[] is a checkbox - only checked rows are posted
    # result_value is keyed by sub product id: result_value[<id>]
    $product_ids = $this->input->post('sub_product_id');
    $results     = $this->input->post('result_value');

    #only the ticked sub tests are saved, with the value entered (default 00)
if (!empty($product_ids)) {

    foreach ($product_ids as $id) {

        $result = isset($results[$id]) ? trim($results[$id]) : '';

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

    $this->session->set_flashdata('success', 'Test created successfully. Click "Generate Report" to view it.');
    redirect('admin/patient');
}
public function report($id)
{
    $data['patient']=$this->db
    ->select('pathology_report.id as report_id,patient_master.*,test_master.id as testid, test_master.name as test_name,test_master.quantity,pathology_report.test_id,pathology_report.patient_id,pathology_report.report_date,pathology_report.letter_head,doctor_master.id,doctor_master.doctor_name,doctor_master.doctor_code')
    ->from('pathology_report')
    ->join('patient_master','patient_master.id=pathology_report.patient_id')
    ->join('doctor_master','doctor_master.id = patient_master.doctor','left')
    ->join('test_master','pathology_report.test_id=test_master.id')
    ->where('pathology_report.id',$id)
    ->get()
    ->row_array();
   
    $data['details']=$this->db
    ->where('report_id',$id)
    ->get('pathology_report_details')
    ->result_array();
    $this->load->view('admin/service/report',$data);
}

# Step 1: Open the entry form for the selected (checked) sub tests
public function generate_report($id)
{
    $data['report'] = $this->db
    ->select('pathology_report.id as report_id,patient_master.*,test_master.id as testid, test_master.name as test_name,test_master.quantity,pathology_report.test_id,pathology_report.patient_id,pathology_report.report_date,pathology_report.letter_head,doctor_master.id,doctor_master.doctor_name,doctor_master.doctor_code')
    ->from('pathology_report')
    ->join('patient_master','patient_master.id=pathology_report.patient_id')
    ->join('doctor_master','doctor_master.id = patient_master.doctor','left')
    ->join('test_master','pathology_report.test_id=test_master.id')
    ->where('pathology_report.id',$id)
    ->get()
    ->row_array();

    $data['details'] = $this->db
    ->where('report_id',$id)
    ->get('pathology_report_details')
    ->result_array();

    if (empty($data['report'])) {
        $this->session->set_flashdata('error', 'Report not found.');
        redirect('admin/patient');
    }

    $data['title'] = 'Save Report';
    $this->load->view('admin/service/top-section', $data);
    $this->load->view('admin/service/generate_report_form', $data);
    $this->load->view('admin/service/footer', $data);
}

# Step 2: Save the entered values, then generate (open) the report
public function save_report_values($id)
{
    $values = $this->input->post('result_value');   # result_value[<detail_id>] => entered value

    if (!empty($values)) {
        foreach ($values as $detail_id => $val) {

            $val = trim($val);

            # Only update rows belonging to this report
            $this->db
                ->where('id', (int)$detail_id)
                ->where('report_id', (int)$id)
                ->update('pathology_report_details', array('result_value' => $val));
        }
    }

    # Letter head choice made on the generate-report page (0 = Without, 1 = With)
    $letter_head = $this->input->post('letter_head') == 1 ? 1 : 0;

    # Report generated -> update report date to now and mark status as generated (1)
    $this->db
        ->where('id', (int)$id)
        ->update('pathology_report', array(
            'report_date' => date('Y-m-d H:i:s'),
            'status'      => 1,
            'letter_head' => $letter_head
        ));

    $this->session->set_flashdata('success', 'Report generated successfully.');
    redirect('admin/patient/report/'.$id);
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
$data['patient']=$this->db
    ->select('pathology_report.id as report_id,patient_master.*,test_master.id as testid, test_master.name as test_name,test_master.quantity,pathology_report.test_id,pathology_report.patient_id,pathology_report.report_date,pathology_report.letter_head,doctor_master.id,doctor_master.doctor_name,doctor_master.doctor_code')
    ->from('pathology_report')
    ->join('patient_master','patient_master.id=pathology_report.patient_id')
    ->join('doctor_master','doctor_master.id = patient_master.doctor','left')
    ->join('test_master','pathology_report.test_id=test_master.id')
    ->where('pathology_report.id',$id)
    ->get()
    ->row_array();
        $data['details'] = $this->db
        ->select('
            pathology_report_details.*,
            product_master.product_id,
            product_master.sub_product,test_master.id as testid, test_master.name,test_master.quantity
        ')
        ->from('pathology_report_details')
        ->join('product_master','product_master.id=pathology_report_details.product_id')
        ->join('test_master','product_master.product_id = test_master.id')
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
        if($this->session->userdata('role')=='user'){
          $userid = $this->session->userdata('userid');
                    $data['doctor'] = $this->db->get_where('doctor_master',array('status'=>1))->result_array();
        $data['patient'] = $this->db->select('patient_master.*,doctor_master.id as doctorid, doctor_master.doctor_name')
        ->from('patient_master')
        ->join('doctor_master','patient_master.doctor=doctor_master.id')
        ->where('patient_master.status',1)
        ->where('patient_master.userid',$userid)
        ->get()
        ->result_array();
        }else{
        $data['doctor'] = $this->db->get_where('doctor_master',array('status'=>1))->result_array();
        $data['patient'] = $this->db->select('patient_master.*,doctor_master.id as doctorid, doctor_master.doctor_name')
        ->from('patient_master')
        ->join('doctor_master','patient_master.doctor=doctor_master.id')
        ->where('patient_master.status',1)
     
        ->get()
        ->result_array();
        }
       
        $this->load->view('admin/service/top-section', $data);
        $this->load->view('admin/service/patient_form', $data);
        $this->load->view('admin/service/footer', $data);
    }
   public function patient_save()
{
    $patient_id = $this->input->post('patient_id');
    $userid = $this->session->userdata('userid');
    $labid =  $this->session->userdata('labid');
    $centerid = $this->session->userdata('centerid');
    $patient = array(
        'name'              => $this->input->post('name'),
        'age'               => $this->input->post('age'),
        'gender'            => $this->input->post('gender'),
        'mobile'            => $this->input->post('mobile'),
        'doctor'            => $this->input->post('doctor'),
        'registration_date' => $this->input->post('registration_date'),
        'address'           => $this->input->post('address'),
        'labid'             => $labid,
        'userid'            => $userid,
        'centerid'          => $centerid,

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
public function all_test_generate(){
    $id= $this->uri->segment('4');
    $this->db->where('id',$id);
    $result = $this->db->update('patient_master',array('report_status'=>'1'));
    
    if($result){
             $this->session->set_flashdata('success', 'Patient test report complete.');
        } else {
            $this->session->set_flashdata('error', 'patient test report not complete');
        }
        redirect('admin/patient/patient_registration');

}
}
?>