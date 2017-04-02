<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_cart');
		$this->load->library('upload');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Checkout");   
		
        $this->load->view('front/pages/checkout/checkout_upload_image');
    }
	public function add() {
        $this->lib->check_session_customer();
        $temp = '0';
        $this->form_validation->set_rules('jenis_kertas', 'Jenis Kertas', 'check_selected');
        $error = '';
			if (isset($_POST['simpan'])) {
            if ($this->form_validation->run() == FALSE) {
                $data['tambah'] = 'tambah';
                $data['error'] = 'error';
                $this->load->view('front/pages/checkout/checkout_upload', $data);
            } else {
				$config['upload_path']    = dirname(BASEPATH).'/include/order/';
				$config['allowed_types']  = 'gif|jpg|png|jpeg';
						 
				$this->load->library('upload');
				$this->upload->initialize($config);
				//______________________upload front
				if (!$this->upload->do_upload("front")) {
					 echo "Error";
				}else{
					$datafoto=$this->upload->data();
					$nm_file_front = trim(str_replace(" ","",date('dmYHis'))).$datafoto['orig_name'];
					copy('include/order/'.$datafoto['orig_name'], 'include/order/'.$nm_file_front);	
				}
				//______________________upload back
				if (!$this->upload->do_upload("back")) {
					 echo "Error";
				}else{
					$datafoto=$this->upload->data();
					$nm_file_back = trim(str_replace(" ","",date('dmYHis'))).$datafoto['orig_name'];
					copy('include/order/'.$datafoto['orig_name'], 'include/order/'.$nm_file_back);	
				}
				if ($nm_file_back == null)
					$nm_file_back = "-";
				//______________________insert
				$dataData = array(
					'user_id' => $this->session->userdata('user_customer_id'),
					'foto_front' => $nm_file_front,
					'foto_back' => $nm_file_back,
					'nama' => $this->session->userdata("nama"),
					'ukuran' => $this->session->userdata("ukuran"),
					'jenis_kertas' => $this->session->userdata("jenis_kertas"),
					'jumlah' => $this->session->userdata("jumlah"),
					'sisi_cetak' => $this->session->userdata("sisi_cetak"),
					'harga' => $this->session->userdata("harga"),
					'tambahan_ket' => $this->session->userdata("tambahan_ket"),
					'harga_tambahan' => $this->session->userdata("harga_tambahan"),
					'harga_total' => $this->session->userdata("harga_total"),
					'last_update' => date("y-m-d h:i:s"),
				);
				$this->data_cart->insert($dataData); 
				redirect('front/checkout/checkout_pembayaran/');
			}
		}
	}
}
