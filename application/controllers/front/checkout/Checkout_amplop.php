<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_amplop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Checkout_amplop");     
        $this->load->view('front/pages/checkout/checkout_amplop');
    }
	public function add() {
        $this->lib->check_session_customer();
				$this->session->set_userdata("nama", "Original Flyer");
				if($_POST["laminasi"] == "")
					$_POST["laminasi"] = "Tidak";
				$this->session->set_userdata("laminasi", urldecode($_POST["laminasi"]));
				$this->session->set_userdata("ukuran", urldecode($_POST["ukuran"]));
				$this->session->set_userdata("jenis_kertas", urldecode($_POST["jenis_kertas"]));
				$this->session->set_userdata("jumlah", urldecode($_POST["jumlah"]));
				$this->session->set_userdata("sisi_cetak", urldecode($_POST["sisi_cetak"]));
				$this->session->set_userdata("harga", urldecode($_POST["harga"]));
				$this->session->set_userdata("tambahan_ket", "-");
				$this->session->set_userdata("harga_tambahan", urldecode($_POST["harga_tambahan"]));
				$this->session->set_userdata("harga_total", urldecode($_POST["total_db"]));
				redirect('front/checkout/checkout_upload/');
			
	}
}
