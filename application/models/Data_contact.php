<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_contact extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	public function insert($data)
	{  
		$temp=$this->db->insert('newsletter', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
}