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
        $data=[];
           $this->load->view('admin/service/top-section',$data);
           $this->load->view('admin/service/lab', $data);
           $this->load->view('admin/service/footer',$data);
    }


}