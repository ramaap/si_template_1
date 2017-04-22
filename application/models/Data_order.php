<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_order extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	
	public function get_all($date)
	{
		 $this->db->select();
        $this->db->from('transaksi u');
        $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->like('u.order_tgl', $date);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_all_konfirmasi($date)
	{
		 $this->db->select();
        $this->db->from('konfirmasi_bayar u');
        $this->db->join('customer a', 'a.customer_id=u.customer_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->like('u.tgl', $date);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_all_konfirmasi_by_id($konfirm_id)
	{
		 $this->db->select();
        $this->db->from('konfirmasi_bayar u');
        $this->db->join('customer a', 'a.customer_id=u.customer_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.konfirm_id', $konfirm_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_all_pengiriman($order_id)
	{
		 $this->db->select();
        $this->db->from('alamat_pengiriman u');
        $this->db->join('transaksi a', 'a.order_id=u.order_id and a.is_delete=0');
        $this->db->join('provinsi b', 'b.id_prov=u.customer_provinsi_id');
        $this->db->join('kota c', 'c.id_kota=u.customer_kota_id');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.order_id', $order_id);
		$query = $this->db->get();
		return $query->row() ;
	}
	public function get_all_penagihan($order_id)
	{
		 $this->db->select();
        $this->db->from('alamat_penagihan u');
        $this->db->join('transaksi a', 'a.order_id=u.order_id and a.is_delete=0');
        $this->db->join('provinsi b', 'b.id_prov=u.customer_provinsi_id');
        $this->db->join('kota c', 'c.id_kota=u.customer_kota_id');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.order_id', $order_id);
		$query = $this->db->get();
		return $query->row() ;
	}
	
	public function get_by_id($order_id)
	{
		 $this->db->select('*,u.customer_id as customer_id');
        $this->db->from('transaksi u');
        $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.order_id', $order_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	
	public function get_row_by_id($order_id)
	{
		 $this->db->select();
        $this->db->from('transaksi u');
        $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.order_id', $order_id);
		$query = $this->db->get();
		return $query->row() ;
	}
	
	public function delete_permanent($order_id)
	{  
		$data = array('order_id' => $order_id);
		$this->db->delete('transaksi', $data);
		$temp=$this->session->set_userdata("last_id",$order_id); 
	    return $temp;
		
	}
	
	public function delete_semu($order_id)
	{
		$data_lama=$this->db->query('select * from transaksi where order_id="'.$order_id.'"')->num_rows();
		
	   $data = array(
			'is_delete' => '1',
		); 
        $this->db->where('order_id', $order_id);
       $temp= $this->db->update('transaksi', $data); 
		
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1; 
		
		$this->session->set_userdata("last_id",$order_id);
		
	   return $temp;
	} 
	public function delete_semu_konfirmasi($konfirm_id)
	{
		$data_lama=$this->db->query('select * from konfirmasi_bayar where konfirm_id="'.$konfirm_id.'"')->num_rows();
		
	   $data = array(
			'is_delete' => '1',
		); 
        $this->db->where('konfirm_id', $konfirm_id);
       $temp= $this->db->update('konfirmasi_bayar', $data); 
		
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1; 
		
		$this->session->set_userdata("last_id",$konfirm_id);
		
	   return $temp;
	} 
	
	public function update($order_id, $data)
	{
		$data_lama=$this->db->query('select * from transaksi where order_id="'.$order_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"data_order_pembelian","order_pembelian_id",$order_pembelian_id); */
	   
        $this->db->where('order_id', $order_id);
        $temp=$this->db->update('transaksi', $data); 
		$this->session->set_userdata("last_id",$order_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
	public function update_konfirmasi($konfirm_id, $data)
	{
		$data_lama=$this->db->query('select * from konfirmasi_bayar where konfirm_id="'.$konfirm_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"data_order_pembelian","order_pembelian_id",$order_pembelian_id); */
	   
        $this->db->where('konfirm_id', $konfirm_id);
        $temp=$this->db->update('konfirmasi_bayar', $data); 
		$this->session->set_userdata("last_id",$konfirm_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
	
}