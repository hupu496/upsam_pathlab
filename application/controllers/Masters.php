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
public function lab_update() {
    $id = $this->input->post('id');
    $data = [
        'name' => $this->input->post('name'),
        
        'address' => $this->input->post('address'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'contact' => $this->input->post('contact'),
        'updated_at' => date('Y-m-d H:i:s') // If you have an updated_at field
    ];
    
    // Validate data
    if (empty($data['name']) || empty($data['lab_code'])) {
        echo json_encode(['status' => 'error', 'message' => 'Name and Code are required']);
        return;
    }
    
    $this->db->where('id', $id);
    $update = $this->db->update('lab_master', $data);
    
    if ($update) {
        echo json_encode(['status' => 'success', 'message' => 'Lab updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update lab']);
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
     public function center() {
        $data=[];
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/center_master', $data);
           $this->load->view('admin/service/footer',$data);
    }
     public function doctor() {
        $data=[];
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/doctor_master', $data);
           $this->load->view('admin/service/footer',$data);
    }
    public function test() {
        $data=[];
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/product_master', $data);
           $this->load->view('admin/service/footer',$data);
    }


}