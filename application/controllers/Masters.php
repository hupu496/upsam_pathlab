<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
        $data['title'] = "Master Management";
        $this->load->view('masters/index', $data);
    }

    public function lab() {
         if ($this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
        $data['lab_master']=$this->db->get_where('lab_master',array('status'=>1))->result_array();
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/lab', $data);
           $this->load->view('admin/service/footer',$data);
    }
    public function lab_add()
{
    $data = $this->input->post();
    $last_id = $this->db->select('id')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(1)
                    ->get('lab_master')
                    ->row()
                    ->id;
    $last_id+=1;
    $data['lab_code'] = 'LAB00'.$last_id;
    $result = $this->db->insert('lab_master', $data);

    if ($result) {
        $this->session->set_flashdata('success', 'Lab added successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to add lab.');
    }

    redirect('masters/lab');
}
// Get Lab Data for Edit
public function get_lab_data() {
    $id = $this->input->post('id');
    
    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID is required']);
        return;
    }
    
    $this->db->where('id', $id);
    $query = $this->db->get('lab_master'); // Adjust table name as needed
    
    if ($query->num_rows() > 0) {
        $data = $query->row_array();
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lab not found']);
    }
}

// Update Lab Data
public function lab_update()
{
    $id = $this->input->post('id');

    $data = [
        'name'    => $this->input->post('name', TRUE),
        'address' => $this->input->post('address', TRUE),
        'phone'   => $this->input->post('phone', TRUE),
        'email'   => $this->input->post('email', TRUE),
        'contact' => $this->input->post('contact', TRUE)
    ];

    if (empty($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid ID'
        ]);
        return;
    }

    $this->db->where('id', $id);

    if ($this->db->update('lab_master', $data)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Lab updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => $this->db->error()['message']
        ]);
    }
}
    public function lab_delete(){
        $id = $this->uri->segment('3');
       
         $this->db->where('id',$id);

    if($this->db->delete('lab_master')){
        $this->session->set_flashdata('success', 'Lab Delete successfully.');
        redirect('masters/lab');
    }else{
        $this->session->set_flashdata('error', 'Failed to delete lab.');
    redirect('masters/lab');
    }
    }
   public function center()
{
    $data = [];
    $data['center_master'] = $this->Master_model->center_master(array('t1.status'=>1));
    $data['lab'] = $this->db->get_where('lab_master',array('status'=>1))->result_array();
    
    $this->load->view('admin/service/top-section', $data);
    $this->load->view('admin/service/center_master', $data);
    $this->load->view('admin/service/footer', $data);
}
  public function add_center()
{
    $data = $this->input->post();
    $last_id = $this->db->select('id')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(1)
                    ->get('center_master')
                    ->row()
                    ->id;
    $last_id+=1;
    $data['center_code'] = 'CENT00'.$last_id;
    $result = $this->db->insert('center_master', $data);

    if ($result) {
        $this->session->set_flashdata('success', 'Center added successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to add Center.');
    }

    redirect('masters/center');
}
// Get Lab Data for Edit
public function get_center_data() {
    $id = $this->input->post('id');
    
    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID is required']);
        return;
    }
    
    $this->db->where('id', $id);
    $query = $this->db->get('center_master'); // Adjust table name as needed
    
    if ($query->num_rows() > 0) {
        $data = $query->row_array();
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lab not found']);
    }
}

// Update Lab Data
public function center_update()
{
    $id = $this->input->post('id');
    

    $data = [
        'center_name'    => $this->input->post('center_name', TRUE),
        'lab_id' => $this->input->post('lab_id', TRUE),
        'address' => $this->input->post('address', TRUE),
        'phone'   => $this->input->post('phone', TRUE),
        'email'   => $this->input->post('email', TRUE),
        'contact_person' => $this->input->post('contact_person', TRUE)
    ];
    if (empty($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid ID'
        ]);
        return;
    }

    $this->db->where('id', $id);

    if ($this->db->update('center_master', $data)) {
       
        echo json_encode([
            'status' => 'success',
            'message' => 'Lab updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => $this->db->error()['message']
        ]);
    }
}
    public function center_delete(){
        $id = $this->uri->segment('3');
       
         $this->db->where('id',$id);

    if($this->db->delete('center_master')){
        $this->session->set_flashdata('success', 'Center Delete successfully.');
        redirect('masters/center');
    }else{
        $this->session->set_flashdata('error', 'Failed to delete Center.');
    redirect('masters/center');
    }
    }
     public function doctor() {
          $data=[];
          $data['doctor']=$this->db->get_where('doctor_master',array('status'=>1))->result_array();
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/doctor_master', $data);
           $this->load->view('admin/service/footer',$data);
    }
    public function add_doctor()
{
    $data = $this->input->post();
    $last_id = $this->db->select('id')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(1)
                    ->get('doctor_master')
                    ->row()
                    ->id;
    $last_id+=1;
    $data['doctor_code'] = 'DR00'.$last_id;
    $result = $this->db->insert('doctor_master', $data);

    if ($result) {
        $this->session->set_flashdata('success', 'Doctor added successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to add Doctor.');
    }

    redirect('masters/doctor');
}
// Get Lab Data for Edit
public function get_doctor_data() {
    $id = $this->input->post('id');
    
    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID is required']);
        return;
    }
    
    $this->db->where('id', $id);
    $query = $this->db->get('doctor_master'); // Adjust table name as needed
    
    if ($query->num_rows() > 0) {
        $data = $query->row_array();
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lab not found']);
    }
}

// Update Lab Data
public function doctor_update()
{
    $id = $this->input->post('id');
    $data = [
       
        'doctor_name' => $this->input->post('doctor_name', TRUE),
        'qualification' => $this->input->post('qualification', TRUE),
        'phone'   => $this->input->post('phone', TRUE),
        'email'   => $this->input->post('email', TRUE),
    ];
    if (empty($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid ID'
        ]);
        return;
    }

    $this->db->where('id', $id);

    if ($this->db->update('doctor_master', $data)) {
       
        echo json_encode([
            'status' => 'success',
            'message' => 'Lab updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => $this->db->error()['message']
        ]);
    }
}
    public function doctor_delete(){
        $id = $this->uri->segment('3');
       
         $this->db->where('id',$id);

    if($this->db->delete('doctor_master')){
        $this->session->set_flashdata('success', 'doctor Delete successfully.');
        redirect('masters/doctor');
    }else{
        $this->session->set_flashdata('error', 'Failed to delete doctor.');
    redirect('masters/doctor');
    }
    }
    public function test() {
           $data=[];
           $data['product_master']= $this->db->get_where('product_master',array('status'=>1))->result_array();

           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/product_master', $data);
           $this->load->view('admin/service/footer',$data);
    }
     public function add_product()
{
    $data = $this->input->post();
    $last_id = $this->db->select('id')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(1)
                    ->get('product_master')
                    ->row()
                    ->id;
    // $last_id+=1;
    // $data['doctor_code'] = 'DR00'.$last_id;
    $result = $this->db->insert('product_master', $data);

    if ($result) {
        $this->session->set_flashdata('success', 'Product added successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to add Product.');
    }

    redirect('masters/test');
}
// Get Lab Data for Edit
public function get_product_master() {
    $id = $this->input->post('id');
    
    if (empty($id)) {
        echo json_encode(['status' => 'error', 'message' => 'ID is required']);
        return;
    }
    
    $this->db->where('id', $id);
    $query = $this->db->get('product_master'); // Adjust table name as needed
    
    if ($query->num_rows() > 0) {
        $data = $query->row_array();
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Product not found']);
    }
}

// Update Lab Data
public function product_update()
{
    $id = $this->input->post('id');
    $data = [
       
        'product_name' => $this->input->post('product_name', TRUE),
        'sub_product' => $this->input->post('sub_product', TRUE),
        'rate'   => $this->input->post('rate', TRUE),
        'unit'   => $this->input->post('unit', TRUE),
    ];
    if (empty($id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid ID'
        ]);
        return;
    }

    $this->db->where('id', $id);

    if ($this->db->update('product_master', $data)) {
       
        echo json_encode([
            'status' => 'success',
            'message' => 'product updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => $this->db->error()['message']
        ]);
    }
}
    public function product_delete(){
        $id = $this->uri->segment('3');
       
         $this->db->where('id',$id);

    if($this->db->delete('product_master')){
        $this->session->set_flashdata('success', 'product Delete successfully.');
        redirect('masters/test');
    }else{
        $this->session->set_flashdata('error', 'Failed to delete product.');
    redirect('masters/test');
    }
    }
    public function new_registration(){
        $data=[];
        //    $data['product_master']= $this->db->get_where('product_master',array('status'=>1))->result_array();

           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/new_registration', $data);
           $this->load->view('admin/service/footer',$data);
    }


}