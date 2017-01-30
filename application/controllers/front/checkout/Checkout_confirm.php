<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_confirm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Checkout");   
		$data['cart'] = $this->db->query("select * from transaksi_detail u
								  join jenis_kertas x on x.id_kertas = u.jenis_kertas
								  where u.is_delete=0 
								  and u.order_id = ".$this->session->userdata('order_id')."
								  ")->result();   
		$data['jml_item'] = $this->db->query("select count(order_detail_id) as item from transaksi_detail 
								  where is_delete=0 
								  and order_id = ".$this->session->userdata('order_id')."
								  ")->row();
								  
		$data['total'] = $this->db->query("select *,order_total+order_ongkir as total from transaksi
								  where is_delete=0 
								  and order_id = ".$this->session->userdata('order_id')."
								  ")->row();
		$data['pengiriman'] = $this->db->query("select * from alamat_pengiriman u
								  join provinsi x on x.id_prov = u.customer_provinsi_id
								  join kota z on z.id_kota = u.customer_kota_id
								  where u.is_delete=0 
								  and u.order_id = ".$this->session->userdata('order_id')."
								  ")->row();
		$data['penagihan'] = $this->db->query("select * from alamat_penagihan u
								  join provinsi x on x.id_prov = u.customer_provinsi_id
								  join kota z on z.id_kota = u.customer_kota_id
								  where u.is_delete=0 
								  and u.order_id = ".$this->session->userdata('order_id')."
								  ")->row();
								  
        $this->load->view('front/pages/checkout/checkout_confirm',$data);
    }
}
