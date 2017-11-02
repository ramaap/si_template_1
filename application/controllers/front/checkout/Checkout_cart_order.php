<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_cart_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_cart');
        $this->load->model('data_checkout');

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
		$data['total'] = $this->db->query("select sum(harga_total) as total from data_cart u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();
		
		$data['customer'] = $this->db->query("select * from customer u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();
								  
        $this->load->view('front/pages/checkout/checkout_cart_order',$data);
    }
    public function delete_permanent() {
        $this->lib->check_session_customer();
        $temp=$this->data_cart->delete_permanent_transaksi($_POST["datamodel"]);
		
		$total = $this->db->query("select sum(harga_total) as total from transaksi_detail u
									  where u.is_delete=0 
									  and u.order_id = ".$this->session->userdata('order_id')."
									  ")->row();
		$dataData = array(
            'order_total' => $total->total
        );
		$this->data_cart->update_transaksi($this->session->userdata('order_id'), $dataData);
		
        echo $temp;
    }
	
}



















