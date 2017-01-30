<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_custom_order extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('script_sql');
	}
	
	
	public function get_all($date)
	{
		 $this->db->select();
        $this->db->from('custom_order u');
        // $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->like('u.custom_tgl', $date);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function get_by_id($custom_id)
	{
		 $this->db->select();
        $this->db->from('custom_order u');
        // $this->db->join('customer a', 'a.customer_id=u.cust_id and a.is_delete=0');
        $this->db->where('u.is_delete', '0');
        $this->db->where('u.custom_id', $custom_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	public function insert($data)
	{  
		$temp=$this->db->insert('custom_order', $data); 
		$this->session->set_userdata("last_id",$this->db->insert_id()); 
		return $temp;	
	}
	public function update($custom_id, $data)
	{
		$data_lama=$this->db->query('select * from custom_order where custom_id="'.$custom_id.'"')->num_rows();
		
        /* $this->script_sql->update($data,"data_order_pembelian","order_pembelian_id",$order_pembelian_id); */
	   
        $this->db->where('custom_id', $custom_id);
        $temp=$this->db->update('custom_order', $data); 
		$this->session->set_userdata("last_id",$custom_id);
	   
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1;
		
	   return $temp;
	} 
	public function delete_semu($custom_id)
	{
		$data_lama=$this->db->query('select * from custom_order where custom_id="'.$custom_id.'"')->num_rows();
		
	   $data = array(
			'is_delete' => '1',
		); 
        $this->db->where('custom_id', $custom_id);
       $temp= $this->db->update('custom_order', $data); 
		
		if($temp==0&&$data_lama>0) //kalau tidak ada perubahan cek data dengan id itu ada g. kalau ada dianggap ada perubahan data
		$temp=1; 
		
		$this->session->set_userdata("last_id",$custom_id);
		
	   return $temp;
	} 
}