<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class order_detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_order_detail');
        $this->load->model('data_profile');
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("Order Detail");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
		$this->load->view('data/order_detail_view', $data);
    }
   
    public function show() {
        $this->lib->check_session();
        redirect('data/order_detail/');
    }

    public function utama() {
        $this->lib->check_session();
        redirect('data/order/');
    }


    public function produk_detail_show() {

        $this->lib->check_session();
        $index = 0;
        $produk_detail = $this->data_order_detail->get_all($this->session->userdata("order_id"));
        $array = array();
        foreach ($produk_detail as $tmp) {

            $temp['index'] = $index;
            $temp['foto_front'] = $tmp->order_detail_id;
            $temp['foto_back'] = $tmp->barang_nama;
            $temp['nama'] = $tmp->nama;
            $temp['ukuran'] = $tmp->ukuran;
            $temp['jenis_kertas'] = $tmp->jenis_kertas;
            $temp['kertas_nama'] = $tmp->kertas_nama;
            $temp['jumlah'] = $tmp->jumlah;
            $temp['sisi_cetak'] = $tmp->sisi_cetak;
            $temp['harga'] = $tmp->harga;
            $temp['tambahan_ket'] = $tmp->tambahan_ket;
            $temp['harga_tambahan'] = $tmp->harga_tambahan;
            $temp['harga_total'] = $tmp->harga_total;
            $temp['is_delete'] = $tmp->is_delete;
            $temp['is_permanent'] = $tmp->is_permanent;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    }
	 
}
