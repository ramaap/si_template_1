<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class catalog_design_wijaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');

        // Place your model here...
    }

	public function index() {
        // $this->lib->check_session_customer();
        $this->lib->check_lokasi("Design");     
        $this->load->view('front/pages/design/catalog_design_wijaya');
    }
}
