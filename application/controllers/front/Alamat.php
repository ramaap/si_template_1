<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alamat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_customer');
        $this->load->model('data_history_order');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("User");   		
        $this->load->view('front/pages/alamat');
    }
	public function alamat_show() {
        $this->lib->check_session_customer();
        $index = 0;
        $customer = $this->data_customer->get_all_alamat();
        $array = array();
        foreach ($customer as $tmp) {

            $temp['index'] = $index;
            $temp['datamodel'] = $tmp->alamat_id;
            $temp['customer_nama'] = $tmp->customer_nama;
            $temp['customer_telp'] = $tmp->customer_telp;
            $temp['customer_alamat'] = $tmp->customer_alamat;
            $temp['nama_prov'] = $tmp->nama_prov;
            $temp['kota'] = $tmp->kota;
            $temp['customer_kecamatan'] = $tmp->customer_kecamatan;
            $temp['customer_kode_pos'] = $tmp->customer_kode_pos;
            $temp['is_delete'] = $tmp->is_delete;
            $temp['is_permanent'] = $tmp->is_permanent;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    }
    public function delete_permanent() {
        $this->lib->check_session_customer();
        $temp=$this->data_customer->delete_permanent_alamat($_POST["datamodel"]);
        echo $temp;
    }
}
