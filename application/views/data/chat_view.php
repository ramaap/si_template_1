<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
		
        <?php $this->load->view('common/head'); ?>
        <?php
        $ubah = (isset($ubah)) ? $ubah : '';
        $alert = $this->session->userdata("error");
        $this->session->unset_userdata("error");
        ?>
        <?php $this->load->view('common/menu'); ?>
		
    </head>
    <body>
		<div class="col-md-12">
            <iframe src="https://dashboard.tawk.to/login" width="100%" height="600px"></iframe>
        </div>
        <?php $this->load->view('common/footer'); ?>
		<script src="<?php echo base_url(); ?>include/js/remodal/remodal.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script>
		
    </body>
</html>