<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_history_order');
        $this->load->model('data_profile');
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("History Order");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/history_view', $data);
    }

    public function show() {
        $this->lib->check_session();
        redirect('data/history/');
    }

    public function go_to_detail() {
        $this->lib->check_session();
        $this->session->set_userdata("order_id", $_POST["datamodel"]);
    }
	
    public function order_pembelian_show() {
		 $data = (json_decode(file_get_contents('php://input')));		
        $filter_tanggal = (isset($data->filter_tanggal)) ? $data->filter_tanggal : date("Y-m-");
		
        $this->lib->check_session();
        $index = 0;
        $order = $this->data_history_order->get_all_history($filter_tanggal,$this->session->userdata('customer_id'));
        $array = array();
        foreach ($order as $tmp) {

            $temp['index'] = $index;
            $temp['datamodel'] = $tmp->order_id;
            $temp['order_no'] = $tmp->order_no;
            $temp['customer_nama'] = $tmp->customer_nama;
            $temp['order_tgl'] = date('d M Y', strtotime($tmp->order_tgl));
            $temp['order_tgl_ymd'] = $tmp->order_tgl;
            $temp['order_status'] = $tmp->order_status;
            $temp['status_bayar'] = $tmp->status_bayar;
            $temp['order_total'] = $tmp->order_total;
            $temp['order_ongkir'] = $tmp->order_ongkir;
            $temp['total'] = $tmp->order_total+$tmp->order_ongkir;
            $temp['order_kurir'] = $tmp->order_kurir; 
            $temp['order_berat'] = $tmp->order_berat;
            $temp['is_delete'] = $tmp->is_delete;
            $temp['is_permanent'] = $tmp->is_permanent;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    }

	protected function outputJSON($json) {
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header('Content-Type: application/json');
        print $json;
    }

    protected function getPartialFilename($parital_name) {
        $p = realpath(dirname(__FILE__)) . "/../../views/common/";
        return $p . $parital_name . ".php";
    }
    public function list_alamat() {

        $datamodel = $_POST["datamodel"];
        // $this->session->set_userdata('order_penjualan_id', $datamodel);
        $list = (object) $this->data_order->get_all_pengiriman($datamodel);
        $lists = (object) $this->data_order->get_all_penagihan($datamodel);


        if (empty($list)) {
            $arr_data = array('success' => false, 'content' => 'Tidak ditemukan.');
        } else {
            ob_start();
            $partial_view_filename = $this->getPartialFilename('list_alamat_view');
            include $partial_view_filename;
            $content = ob_get_clean();
            $arr_data = array('success' => true, 'content' => $content);
        }
        $this->outputJSON(json_encode($arr_data));
    }
}
