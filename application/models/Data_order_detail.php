<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_order_detail extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	
	
	public function get_all($order_id)
	{
		 $this->db->select();
        $this->db->from('transaksi_detail u');
        $this->db->join('transaksi b', 'b.order_id=u.order_id and b.is_delete=0');
        $this->db->join('jenis_kertas c', 'c.id_kertas=u.jenis_kertas and c.is_delete=0');
       $this->db->where('u.is_delete', '0');
        $this->db->where('u.order_id', $order_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_row_by_id($order_id)
	{
		$this->db->select();
        $this->db->from('transaksi_detail u');
        $this->db->join('transaksi b', 'b.order_id=u.order_id and b.is_delete=0');
        $this->db->join('jenis_kertas c', 'c.id_kertas=u.jenis_kertas and c.is_delete=0');
		$this->db->where('u.is_delete', '0');
        $this->db->where('u.order_detail_id', $order_detail_id);
		$query = $this->db->get();
		return $query->row() ;
	}
	
}