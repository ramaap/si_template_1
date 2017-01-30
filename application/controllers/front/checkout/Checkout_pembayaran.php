<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_cart');
        $this->load->model('data_checkout');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Checkout");  
		$data['cart'] = $this->db->query("select * from data_cart u
								  join jenis_kertas x on x.id_kertas = u.jenis_kertas
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->result();
		$data['total'] = $this->db->query("select sum(harga_total) as total from data_cart u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();
		
		$data['customer'] = $this->db->query("select * from customer u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();
								  
        $this->load->view('front/pages/checkout/checkout_pembayaran',$data);
    }
    public function delete_permanent() {
        $this->lib->check_session_customer();
        $temp=$this->data_cart->delete_permanent($_POST["datamodel"]);
        echo $temp;
    }
	public function ambil_lokasi(){
		$propinsi = $_POST['propinsi'];
		$kota = $this->db->query("select id_kabkot,nama_kabkot from kabkot 
								  where id_prov= ".$propinsi." 
								  ")->result_array();
		foreach($kota as $k)
		{
			echo "<option value=\"".$k['id_kabkot']."\">".$k['nama_kabkot']."</option>\n";
		}
	}
	public function get_no_order() {
        $tgl = date('dmy');
        $data['last_id'] = $this->db->query('SELECT order_no FROM transaksi
					WHERE order_no like "%' . $tgl . '%"  order by substr(order_no,-3) desc limit 1');
        $no_order = '';
        if ($data['last_id']->num_rows() == 1) {
            $last = $data['last_id']->result();
            foreach ($last as $row) {
                $lastno = substr($row->order_no, -3);
                $nourut = str_pad($lastno + 1, 3, '0', STR_PAD_LEFT);
            }
        } else {
            $nourut = str_pad('001', 3, '0', STR_PAD_LEFT);
        }

        $no_order = 'PX-' . $tgl . $nourut;
        return $no_order;
    }
	public function adds() {
		echo "sukses";
	}
	public function add() {
        $this->lib->check_session_customer();
		
		 $cart = $this->db->query("select * from data_cart u
								  join jenis_kertas x on x.id_kertas = u.jenis_kertas
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->result();
		if(count($cart)>0)
		{
			$order_no = $this->get_no_order();
			$total = $this->db->query("select sum(harga_total) as total from data_cart u
									  where u.is_delete=0 
									  and u.user_id = ".$this->session->userdata('user_customer_id')."
									  ")->row();
									  
			$dataData = $this->get_array_order($order_no,$total->total);
			$temp = $this->data_checkout->insert_order($dataData);
			$order_id = $this->session->userdata('order_id');
			 
			foreach($cart as $val)
			{
				$foto_front = $val->foto_front;
				$foto_back = $val->foto_back;
				$nama = $val->nama;
				$ukuran = $val->ukuran;
				$jenis_kertas = $val->jenis_kertas;
				$jumlah = $val->jumlah;
				$sisi_cetak = $val->sisi_cetak;
				$harga = $val->harga;
				$tambahan_ket = $val->tambahan_ket;
				$harga_tambahan = $val->harga_tambahan;
				$harga_total = $val->harga_total;
				
				$detilDetil = $this->order_detail($order_id,$foto_front,$foto_back,$nama,$ukuran,$jenis_kertas,$jumlah,$sisi_cetak,$harga,$tambahan_ket,$harga_tambahan,$harga_total);
				
				$this->data_checkout->insert_detail_order($detilDetil);
				$this->data_checkout->delete_permanent_cart($val->cart_id);
			}
			
			$kirimKirim = $this->get_array_pengiriman($order_id);
			$temp = $this->data_checkout->insert_pengiriman($kirimKirim);
			 
			$tagihTagih = $this->get_array_penagihan($order_id);
			$temp = $this->data_checkout->insert_penagihan($tagihTagih);
			
			if($_POST['radio_alamat'] == 'baru')
			{
				$alamatAlamat = $this->get_array_alamat();
				$this->data_checkout->insert_alamat($alamatAlamat);
			}
			 
			if ($temp == '1') {
				redirect('front/checkout/checkout_confirm/');
			} else
				echo "insert Gagal";
		}
		else{
			echo "<script> alert('Troli Anda Kosong!!.. Silahkan masukkan data pesanan terlebih dahulu'); </script>";
			$data['cart'] = $this->db->query("select * from data_cart u
								  join jenis_kertas x on x.id_kertas = u.jenis_kertas
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->result();
			$data['total'] = $this->db->query("select sum(harga_total) as total from data_cart u
									  where u.is_delete=0 
									  and u.user_id = ".$this->session->userdata('user_customer_id')."
									  ")->row();
			
			$data['customer'] = $this->db->query("select * from customer u
									  where u.is_delete=0 
									  and u.user_id = ".$this->session->userdata('user_customer_id')."
									  ")->row();
									  
			$this->load->view('front/pages/checkout/checkout_pembayaran',$data);
		}

	}
	 public function get_array_order($order_no="",$order_total=0) {
        $dataData = array(
            'customer_id' => $this->session->userdata("user_customer_id"),
            'cust_id' => $this->session->userdata("customer_id"),
            'order_no' => urldecode($order_no),
            'order_tgl' => date("y-m-d"),
            'order_total' => urldecode($order_total),
            'order_ongkir' => urldecode($_POST['ongkir']),
            'order_kurir' => urldecode($_POST['courier']),
            'order_berat' => urldecode($_POST['berat']),
            'order_status' => "Open Order",
            'status_bayar' => "Belum Lunas",
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	 public function get_array_pengiriman($order_id=0) {
        $dataData = array(
            'customer_id' => $this->session->userdata("customer_id"),
            'order_id' => urldecode($order_id),
            'customer_nama' => urldecode($_POST['nama']),
            'customer_email' => urldecode($_POST['email']),
            'customer_telp' => urldecode($_POST['telp']),
            'customer_alamat' => urldecode($_POST['alamat']),
            'customer_provinsi_id' => urldecode($_POST['provinsi']),
            'customer_kota_id' => urldecode($_POST['kota']),
            'customer_kecamatan' => urldecode($_POST['kecamatan']),
            'customer_kode_pos' => urldecode($_POST['kode_pos']),
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	 public function get_array_penagihan($order_id=0) {
        $dataData = array(
            'customer_id' => $this->session->userdata("customer_id"),
            'order_id' => urldecode($order_id),
            'customer_nama' => urldecode($_POST['nama2']),
            'customer_email' => urldecode($_POST['email2']),
            'customer_telp' => urldecode($_POST['telp2']),
            'customer_alamat' => urldecode($_POST['alamat2']),
            'customer_provinsi_id' => urldecode($_POST['provinsi2']),
            'customer_kota_id' => urldecode($_POST['kota2']),
            'customer_kecamatan' => urldecode($_POST['kecamatan2']),
            'customer_kode_pos' => urldecode($_POST['kode_pos2']),
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	 public function get_array_alamat() {
        $dataData = array(
            'customer_id' => $this->session->userdata("customer_id"),
            'customer_nama' => urldecode($_POST['nama']),
            'customer_email' => urldecode($_POST['email']),
            'customer_telp' => urldecode($_POST['telp']),
            'customer_alamat' => urldecode($_POST['alamat']),
            'customer_provinsi_id' => urldecode($_POST['provinsi']),
            'customer_kota_id' => urldecode($_POST['kota']),
            'customer_kecamatan' => urldecode($_POST['kecamatan']),
            'customer_kode_pos' => urldecode($_POST['kode_pos']),
            'last_update' => date("y-m-d h:i:s"),
            'last_user_id' => $this->session->userdata("user_customer_id")
        );
        return $dataData;
    }
	public function order_detail($order_id=0,$foto_front="",$foto_back="",$nama="",$ukuran="",$jenis_kertas=0,$jumlah="",$sisi_cetak=0,$harga=0,$tambahan_ket="",$harga_tambahan=0,$harga_total=0) {
		$dataData = array(
			'order_id' =>  urldecode($order_id),
			'foto_front' => urldecode($foto_front),
			'foto_back' => urldecode($foto_back),
			'nama' => urldecode($nama),
			'ukuran' => urldecode($ukuran),
			'jenis_kertas' => urldecode($jenis_kertas),
			'jumlah' => urldecode($jumlah),
			'sisi_cetak' => urldecode($sisi_cetak),
			'harga' => urldecode($harga),
			'tambahan_ket' => urldecode($tambahan_ket),
			'harga_tambahan' => urldecode($harga_tambahan),
			'harga_total' => urldecode($harga_total),
			'last_update' => date("y-m-d h:i:s"),
		);
        return $dataData;
    }
	public function get_alamat(){
		$alamat_id = 0;
		$alamat_id = $_POST['datamodel'];
		$alamat = $this->db->query('select * from buku_alamat where alamat_id = '.$alamat_id.'')->row();
		if(count($alamat)>0)
		{
			echo $alamat->customer_nama ."~".$alamat->customer_email ."~".$alamat->customer_telp."~".$alamat->customer_alamat."~".$alamat->customer_kecamatan."~".$alamat->customer_kode_pos."~".$alamat->customer_provinsi_id."~".$alamat->customer_kota_id;		
		}
		else
			echo "";
	}
	
}



















