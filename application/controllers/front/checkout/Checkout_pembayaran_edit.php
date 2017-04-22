<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_pembayaran_edit extends CI_Controller {

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
		$data['pengiriman'] = $this->db->query("select * from alamat_pengiriman u
								  join provinsi x on x.id_prov = u.customer_provinsi_id
								  join kota z on z.id_kota = u.customer_kota_id
								  where u.is_delete=0 
								  and u.order_id = ".$this->session->userdata('order_id')."
								  ")->row();
								  
        $this->load->view('front/pages/checkout/checkout_pembayaran_edit',$data);
    }
	public function edit() {
        $this->lib->check_session_customer();
			$kirimKirim = $this->get_array_pengiriman();
			$temp = $this->data_checkout->update_pengiriman($_POST['datamodel'],$kirimKirim);
			 
			if ($temp == '1') {
				redirect('front/checkout/checkout_confirm/');
			} 
			else{
				echo "Terjadi Kesalahan,Data tidak dapat disimpan";
			}

	}
	 public function get_array_pengiriman() {
        $dataData = array(
            'customer_nama' => urldecode($_POST['nama']),
            'customer_email' => urldecode($_POST['email']),
            'customer_telp' => urldecode($_POST['telp']),
            'customer_alamat' => urldecode($_POST['alamat']),
            'customer_provinsi_id' => urldecode($_POST['provinsi']),
            'customer_kota_id' => urldecode($_POST['kota']),
            'customer_kecamatan' => urldecode($_POST['kecamatan']),
            'customer_kode_pos' => urldecode($_POST['kode_pos']),
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
}



















