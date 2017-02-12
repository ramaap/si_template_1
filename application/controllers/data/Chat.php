<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template 
        $this->load->model('data_profile');
        // Place your model here...
    }

    public function index() {
		// $data['akses']='dm_customer';
        // $this->session->set_userdata("akses_id", $data['akses']);
        $this->lib->check_session();
        $this->lib->check_lokasi("Online Chat");        
        $data['error'] = '';
        $data['status'] = '';
        $this->lib->log("Lihat");
        $this->load->view('data/chat_view', $data);
    }

    public function show() {
        $this->lib->check_session();
        redirect('data/chat');
    }
   
	
}
