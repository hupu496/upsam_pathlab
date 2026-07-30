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
    
    if ($result && $result['password'] == $password) {

        // Set session if needed
        $this->session->set_userdata([
            'userid'   => $result['id'],
            'username' => $result['username'],
            'role'     => $result['role']
        ]);
         $this->session->set_flashdata('success', 'activate successfully.');
        redirect('welcome/dashboard');

    } else {
        $this->session->set_flashdata('error', 'Not active by admin');
        redirect('welcome/index');
    }
}
    public function dashboard(){
         if(empty($this->session->userdata('userid'))) {
            redirect('welcome/index');
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
