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
	
	public function update_pengiriman($pengiriman_id, $data)
	{
		$data_lama=$this->db->query('select * from alamat_pengiriman where pengiriman_id="'.$pengiriman_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"customer","customer_id",$customer_id); */
	   
        $this->db->where('pengiriman_id', $pengiriman_id);
        $temp=$this->db->update('alamat_pengiriman', $data); 
		$this->session->set_userdata("last_id",$pengiriman_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
	public function update_penagihan($penagihan_id, $data)
	{
		$data_lama=$this->db->query('select * from alamat_penagihan where penagihan_id="'.$penagihan_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"customer","customer_id",$customer_id); */
	   
        $this->db->where('penagihan_id', $penagihan_id);
        $temp=$this->db->update('alamat_penagihan', $data); 
		$this->session->set_userdata("last_id",$penagihan_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
	public function update_order($order_id, $data)
	{
		$data_lama=$this->db->query('select * from transaksi where order_id="'.$order_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"customer","customer_id",$customer_id); */
	   
        $this->db->where('order_id', $order_id);
        $temp=$this->db->update('transaksi', $data); 
		$this->session->set_userdata("last_id",$order_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
}