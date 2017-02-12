<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_pembayaran_edit2 extends CI_Controller {

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
		$data['penagihan'] = $this->db->query("select * from alamat_penagihan u
								  join provinsi x on x.id_prov = u.customer_provinsi_id
								  join kota z on z.id_kota = u.customer_kota_id
								  where u.is_delete=0 
								  and u.order_id = ".$this->session->userdata('order_id')."
								  ")->row();
								  
        $this->load->view('front/pages/checkout/checkout_pembayaran_edit2',$data);
    }
	public function edit() {
        $this->lib->check_session_customer();
			$dataData = $this->get_array_order();
			$temp = $this->data_checkout->update_order($this->session->userdata('order_id'),$dataData);
			
			$tagihTagih = $this->get_array_penagihan();
			$temp = $this->data_checkout->update_penagihan($_POST['datamodel'],$tagihTagih);
			
			if ($temp == '1') {
				redirect('front/checkout/checkout_confirm/');
			} else{
				
				echo "Terjadi Kesalahan,Data tidak dapat disimpan";
			}
			 

	}
	 public function get_array_order() {
        $dataData = array(
            'customer_id' => $this->session->userdata("user_customer_id"),
            'order_ongkir' => urldecode($_POST['ongkir']),
            'order_kurir' => urldecode($_POST['courier']),
            'order_berat' => urldecode($_POST['berat']),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	 public function get_array_penagihan() {
        $dataData = array(
            'customer_nama' => urldecode($_POST['nama2']),
            'customer_email' => urldecode($_POST['email2']),
            'customer_telp' => urldecode($_POST['telp2']),
            'customer_alamat' => urldecode($_POST['alamat2']),
            'customer_provinsi_id' => urldecode($_POST['provinsi2']),
            'customer_kota_id' => urldecode($_POST['kota2']),
            'customer_kecamatan' => urldecode($_POST['kecamatan2']),
            'customer_kode_pos' => urldecode($_POST['kode_pos2']),
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	
}



















