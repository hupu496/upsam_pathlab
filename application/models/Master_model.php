<?php
date_default_timezone_set('Asia/Kolkata');
class Master_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
		$this->load->helper('string');
	}
	
	public function get_all($table) {
        return $this->db->get($table)->result_array();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }
	public function center_master($where){
		   $this->db->select('t1.*, t2.id as labid, t2.lab_code');
			$this->db->from('center_master t1');
			$this->db->join('lab_master t2', 't1.lab_id = t2.id', 'left');
			$this->db->where($where);

			$query = $this->db->get();
			return $query->result_array();
	}
}?>