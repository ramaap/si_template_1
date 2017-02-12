<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="catalog pixa-design">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
	<?php $this->load->view('front/slice/carousel_pixa_design'); ?>
		<div id="ourproduct">
			<h2>OUR WORK</h2>
			<div class="ourproduct-container">
				<div class="row">
				  <div class="col-md-6">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_business_card/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/fitbox.png">
						</a>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/wijaya.png">
						</a>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/mindo.png">
						</a>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/grace.png">
						</a>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/kurnia.png">
						</a>
					</div>
				  </div>
				</div>
			</div>
		</div> 
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>