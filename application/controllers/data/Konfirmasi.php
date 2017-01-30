<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class konfirmasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_order');
        $this->load->model('data_profile');
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("Konfirmasi Bayar");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/konfirmasi_view', $data);
    }

    public function show() {
        $this->lib->check_session();
        redirect('data/konfirmasi/');
    }
	public function order_pembelian_show_by_id() {
        $this->lib->check_session();
        $index = 0;
        $order = $this->data_order->get_all_konfirmasi_by_id($_POST["datamodel"]);
		$array = array();
        foreach ($order as $tmp) {

             $temp['index'] = $index;
            $temp['datamodel'] = $tmp->konfirm_id; 
            $temp['status'] = $tmp->status;
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
        $order = $this->data_order->get_all_konfirmasi($filter_tanggal);
        $array = array();
        foreach ($order as $tmp) {

            $temp['index'] = $index;
            $temp['datamodel'] = $tmp->konfirm_id;
            $temp['order_no'] = $tmp->order_no;
            $temp['customer_nama'] = $tmp->customer_nama;
            $temp['tgl'] = date('d M Y', strtotime($tmp->tgl));
            $temp['tgl_ymd'] = $tmp->tgl;
            $temp['jml'] = $tmp->jml_bayar;
            $temp['bank'] = $tmp->bank;
            $temp['no_rek'] = $tmp->no_rek;
            $temp['nama_rek'] = $tmp->nama_rek;
            $temp['keterangan'] = $tmp->keterangan; 
            $temp['status'] = $tmp->status;
            $temp['is_delete'] = $tmp->is_delete;
            $temp['is_permanent'] = $tmp->is_permanent;
            array_push($array, $temp);
            $index++;
        }
        echo json_encode($array);
    }

	public function update_status(){
		$temp='0';
		$dataData = array(
				'status' => urldecode($_POST['status']),
			);
		$temp = $this->data_order->update_konfirmasi($_POST['datamodel'], $dataData);
		if ($temp == '1') {
            $this->session->set_userdata("error", "Update Berhasil");
            redirect('data/konfirmasi/');
        } else {
			echo "<script>alert('Update Status Gagal'); </script>";
             $this->load->view('data/konfirmasi_view');
        }
	}
    public function delete() {
        $this->lib->check_session();
        $konfirm_id = $_POST["datamodel"];
        $temp = "0";
            $this->lib->log("Hapus");
            $this->data_order->delete_semu_konfirmasi($konfirm_id);
            $temp = '1'; 
        echo $temp;
    } 
}
