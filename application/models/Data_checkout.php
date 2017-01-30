<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_checkout extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	
	
	public function insert_order($data)
	{  
		$temp=$this->db->insert('transaksi', $data); 
		$this->session->set_userdata("order_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function insert_detail_order($data)
	{  
		$temp=$this->db->insert('transaksi_detail', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function insert_pengiriman($data)
	{  
		$temp=$this->db->insert('alamat_pengiriman', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	} 
	public function insert_penagihan($data)
	{  
		$temp=$this->db->insert('alamat_penagihan', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function insert_alamat($data)
	{  
		$temp=$this->db->insert('buku_alamat', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function insert_konfirmasi_bayar($data)
	{  
		$temp=$this->db->insert('konfirmasi_bayar', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function delete_permanent_cart($cart_id)
	{  
		$data = array('cart_id' => $cart_id);
		$this->db->delete('data_cart', $data);
		$temp=$this->session->set_userdata("last_id",$cart_id); 
	    return $temp;
		
	}
	
}