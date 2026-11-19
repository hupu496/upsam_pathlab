<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	   function __construct(){
        parent::__construct();
        $this->load->database();
        
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
public function registration_form(){
    $this->load->view('registration_form');

}
	public function validatelogin()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $result = $this->db->get_where('users', [
        'email' => $email,'status'=>1
    ])->row_array();
    

    if($result){

    if ($result['password'] == $password) {

        // Set session if needed
        $this->session->set_userdata([
            'userid'   => $result['id'],
            'username' => $result['username'],
            'role'     => $result['role'],
            'labid'   => $result['labid'],
            'centerid' => $result['centerid']
        ]);
        $this->session->set_flashdata('success', 'Login successfully.');
        redirect('welcome/dashboard');

    } else {
        $this->session->set_flashdata('error', 'Wrong Password');
        redirect('welcome/index');
    }
    }else{
         $this->session->set_flashdata('error', 'User is not activate');
        redirect('welcome/index');
    }
}
    public function dashboard(){
         if(empty($this->session->userdata('userid'))) {
            redirect('welcome/index');
        }
        if($this->session->userdata('role')=='user'){
            $id = $this->session->userdata('userid');
            $data['center_lab']=$this->db->select('users.*,lab_master.id,lab_master.name as labname,lab_master.lab_code,lab_master.address,lab_master.email,lab_master.phone,center_master.center_name,center_master.phone as centerphone')
            ->from('users')
            ->join('lab_master','lab_master.id = users.labid','left')
            ->join('center_master','center_master.id=users.centerid')
            ->where('users.id',$id)
            ->get()
            ->result_array();
            $data['patient'] = $this->db->get_where('patient_master',array('status'=>1,'userid'=>$id))->num_rows();
            $data['total_test'] = $this->db->get_where('pathology_report',array('userid'=>$id))->num_rows();
            $data['labcenter']=$this->db->select('users.*,lab_master.id,lab_master.name,lab_master.address,lab_master.lab_code,lab_master.contact')
            ->from('users')
            ->join('lab_master','lab_master.id=users.labid')
            ->where('users.id',$id)
            ->get()
            ->result_array();
        }
       $data['lab']=$this->db->get_where('lab_master',array('status'=>1))->result_array();
       $data['product']=$this->db->get_where('product_master',array('status'=>1))->result_array();
       $data['center']=$this->db->get_where('center_master',array('status'=>1))->result_array();
       $data['doctor']=$this->db->get_where('doctor_master',array('status'=>1))->result_array();
       $data['total_doctors']=count($data['doctor']);
       $data['total_centers']=count($data['center']);
       $data['total_labs']=count($data['lab']);
       $data['total_products']=count($data['product']);
       $this->load->view('admin/service/top-section',$data);
       $this->load->view('admin/service/dashboard',$data);
       $this->load->view('admin/service/footer',$data);
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('welcome/index');
    }
    public function get($id)
{
    $user = $this->db->where('id',$id)
                     ->get('users')
                     ->row_array();
    if($user)
    {
        echo json_encode([
            'status'=>'success',
            'data'=>$user
        ]);
    }
    else
    {
        echo json_encode([
            'status'=>'error',
            'message'=>'User not found'
        ]);
    }
}
public function update_user()
{
    $id = $this->input->post('user_id');
    
    $data = array(
        'username' => $this->input->post('username'),
        'phone'    => $this->input->post('phone'),
        'email'    => $this->input->post('email'),
        'role'     => $this->input->post('role')
    );

    if($this->input->post('password') != '')
    {
        $data['password'] = $this->input->post('password');
    }
        $this->db->where('id',$id);
        $this->db->update('users',$data);

        echo json_encode([
            'status'=>'success',
            'message'=>'User updated successfully'
        ]);
    
}
public function delete($id)
{
    $this->db->where('id',$id);
    $this->db->delete('users');

    echo json_encode([
        'status'=>'success',
        'message'=>'User deleted successfully'
    ]);
}
public function activate($id)
{
    $result = $this->db->get_where('users',array('id'=>$id))->row_array();
    if($result['status'] == 1){
      $this->db->where('id',$id);
      $this->db->update('users',array('status'=>0));
       echo json_encode([
        'status'=>'unsuccess',
        'message'=>'User Deactivate successfully'
    ]);
    }else{
        $this->db->where('id',$id);
        $this->db->update('users',array('status'=>1));
        echo json_encode([
        'status'=>'success',
        'message'=>'User Activate successfully'
    ]);
    }
}
}
