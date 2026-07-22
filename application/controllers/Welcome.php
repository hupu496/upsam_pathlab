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
        'email' => $email
    ])->row_array();

    if ($result && $result['password'] == $password) {

        // Set session if needed
        $this->session->set_userdata([
            'userid'   => $result['id'],
            'username' => $result['username']
        ]);

        redirect('welcome/dashboard');

    } else {

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
}
