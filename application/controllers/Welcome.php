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
	public function validatelogin(){
   
    $data = [
        'email'     => $this->input->post('email'),
        'password'  => $this->input->post('password'),
        'added_on'  => date('Y-m-d H:i:s'),
        'status'    => 1
    ];

    $result = $this->db->get_where('users', array(
        'email' => $data['email']
    ))->row_array();
   
    if ($result['password'] == $data['password']) {
        echo json_encode(['status' => 'success']);
        redirect('welcome/dashboard');
    } else {
        echo json_encode(['status' => 'error']);
        redirect('welcome/index');
    }
        $this->load->view('masters/index', $data);

	}
    public function dashboard(){
      
        $this->load->view('admin/service/top-section',$data);
        $this->load->view('admin/service/dashboard',$data);
        $this->load->view('admin/service/footer',$data);
    }
}
