<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template  
        $this->load->model('data_profile');
        // Place your model here...
    }

    public function index() {
        $this->lib->check_session();
        $this->lib->check_lokasi("Laporan");
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/laporan_view', $data);
    }
 
    public function show() {
        $this->lib->check_session();
        redirect('data/laporan');
    }
 
    public function shows() {
        $this->lib->check_session();
        $index = 0; 
		$data = (json_decode(file_get_contents('php://input')));		
       
        $awal = (isset($data->awal)) ? $data->awal : date("Y-m-d");
        $akhir = (isset($data->akhir)) ? $data->akhir : date("Y-m-d");
		$where="";
		
		if($awal==date("Y-m-d"))
		$awal = date('Y-m-d',strtotime($awal . ' -30 days')); 
		   
		$akhir = date('Y-m-d', strtotime($akhir));
		$awal = date('Y-m-d', strtotime($awal));
			
		$where.=" and date(u.order_tgl)>=date('".$awal."') and  date(u.order_tgl)<=date('".$akhir."')";
		 
		
		
        $this->lib->check_session();
        $index = 0; 
        $laporan = $this->db->query("select *,
		DATE_FORMAT(u.order_tgl,'%d %b %Y') as order_tgl,order_tgl as order_tgl_ymd
		from transaksi u
		join customer x on x.customer_id = u.cust_id
		where u.is_delete=0 ".$where." 
		order by u.order_id asc 
		")->result_array(); 
        
		echo json_encode($laporan);
    }
     
	
	
	

}
