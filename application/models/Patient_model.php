<?php
class Patient_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('string');
	}
	
	public function get_all($table) {
        return $this->db->get($table)->result_array();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }
}?>