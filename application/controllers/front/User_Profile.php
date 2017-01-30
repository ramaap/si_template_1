<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_customer');
        $this->load->model('data_history_order');
        $this->load->model('data_order_detail');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("User");   
		$data['customer'] = $this->db->query("select * from customer u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();		
        $this->load->view('front/pages/user_profile',$data);
    }
	public function tooltip($id="") {
		$tmp = $this->data_order_detail->get_all($id); 
		if(count($tmp)>0)
		{
			foreach ($tmp as $val)
			{
				echo "<span><b><u>Detil Order</u></b></span><br/>";
				echo "<span><b>Nama : </b>".$val->nama."</span><br/>";
				echo "<span><b>Ukuran : </b>".$val->ukuran."</span><br/>";
				echo "<span><b>Jenis Kertas : </b>".$val->kertas_nama."</span><br/>";
				echo "<span><b>Jumlah : </b>".$val->jumlah."</span><br/>";
				echo "<span><b>Sisi Cetak : </b>" .$val->sisi_cetak." muka</span><br/>";
				echo "<span><b>Tambahan : </b>".$val->tambahan_ket."</span><br/>";
				echo "<br/><br/>";
			}
		}
		else
		echo "<span><b>Tidak ada data</b></span><br/>"; 
	}	
	public function history_show() {
        $this->lib->check_session_customer();
        $index = 0;
        $customer = $this->data_history_order->get_all();
        $array = array();
        foreach ($customer as $tmp) {

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
	public function edit(){
        $this->lib->check_session_customer();
		$temp='0';
		$dataData = array(
            'customer_nama' => urldecode($_POST['nama']),
            'customer_email' => urldecode($_POST['email']),
            'customer_telp' => urldecode($_POST['telp']),
            'customer_alamat' => urldecode($_POST['alamat']),
            'customer_provinsi_id' => urldecode($_POST['provinsi']),
            'customer_kota_id' => urldecode($_POST['kota']),
            'customer_kecamatan' => urldecode($_POST['kecamatan']),
            'customer_kode_pos' => urldecode($_POST['kode_pos']),
            'last_update' => date("y-m-d h:i:s")
        );
		$temp=$this->data_customer->update($this->session->userdata('customer_id'),$dataData);
		if($temp='1')
			$this->session->set_userdata('alert',"Data Berhasil diperbaharui"); 
		else
			$this->session->set_userdata('alert',"Mohon Maaf terjadi kesalahan sistem");  		
		redirect('front/user_profile');
		
	}
}
