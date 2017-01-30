<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class custom_order_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_custom_order');
        $this->load->model('data_profile');
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("Custom Order");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/custom_order_admin_view', $data);
    }

    public function show() {
        $this->lib->check_session();
        redirect('data/custom_order_admin/');
    }

	public function order_pembelian_show_by_id() {
        $this->lib->check_session();
        $index = 0;
        $order = $this->data_custom_order->get_by_id($_POST["datamodel"]);
		$array = array();
        foreach ($order as $tmp) {

            $temp['index'] = $index;
            $temp['datamodel'] = $tmp->custom_id;
            $temp['custom_status'] = $tmp->custom_status;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    } 
    public function order_pembelian_show() {
		 $data = (json_decode(file_get_contents('php://input')));		
        $filter_tanggal = (isset($data->filter_tanggal)) ? $data->filter_tanggal : date("Y-m-");
		
        $this->lib->check_session();
        $index = 0;
        $order = $this->data_custom_order->get_all($filter_tanggal);
        $array = array();
        foreach ($order as $tmp) {

            $temp['index'] = $index;
            $temp['datamodel'] = $tmp->custom_id;
            $temp['custom_nama'] = $tmp->custom_nama;
            $temp['custom_status'] = $tmp->custom_status;
            $temp['custom_tgl'] = date('d M Y', strtotime($tmp->custom_tgl));
            $temp['custom_tgl_ymd'] = $tmp->custom_tgl;
            $temp['custom_email'] = $tmp->custom_email;
            $temp['custom_telp'] = $tmp->custom_telp;
            $temp['custom_keterangan'] = $tmp->custom_keterangan;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    }

	public function update_status(){
		$temp='0';
		$dataData = array(
				'custom_status' => urldecode($_POST['custom_status']),
			);
		$temp = $this->data_custom_order->update($_POST['datamodel'], $dataData);
		if ($temp == '1') {
            $this->session->set_userdata("error", "Update Berhasil");
            redirect('data/custom_order_admin/');
        } else {
			echo "<script>alert('Update Status Gagal'); </script>";
             $this->load->view('data/custom_order_admin_view');
        }
	}
    public function delete() {
        $this->lib->check_session();
        $konfirm_id = $_POST["datamodel"];
        $temp = "0";
            $this->lib->log("Hapus");
            $this->data_custom_order->delete_semu($konfirm_id);
            $temp = '1'; 
        echo $temp;
    }
}
