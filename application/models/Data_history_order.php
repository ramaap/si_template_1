<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_history_order extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	
	public function get_all()
	{
		 $this->db->select();
        $this->db->from('transaksi u');
        $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.cust_id', $this->session->userdata('customer_id'));
        $this->db->order_by('u.order_tgl', 'DESC');
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_all_history($date,$order_id)
	{
		 $this->db->select();
        $this->db->from('transaksi u');
        $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.cust_id', $order_id);
        $this->db->like('u.order_tgl', $date);
		$query = $this->db->get();
		return $query->result() ;
	}
}