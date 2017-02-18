<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="catalog pixa-design-inside kurnia">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
			<div class="center">
				<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia/kurnia_rebranding.png">
				<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia/kurnia_logo.png">
			</div>
			<div class="side">
				<img id="left" src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia/kurnia_logo_2.png">
				<img id="right" src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia/kurnia_logo_3.png">
			</div>
			<div class="banner">
				<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia/kurnia_banner.png">
			</div>
		</div> 
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>