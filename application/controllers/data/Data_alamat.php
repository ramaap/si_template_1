<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class data_alamat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_customer');
        $this->load->model('data_profile');
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("Buku Alamat");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/data_alamat_view', $data);
    }

    public function show() {
        $this->lib->check_session();
        redirect('data/data_alamat/');
    }

    public function order_pembelian_show() {
        $this->lib->check_session();
        $index = 0;
        $order = $this->data_customer->get_all_alamat_2($this->session->userdata('customer_id'));
        $array = array();
        foreach ($order as $tmp) {

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
}
