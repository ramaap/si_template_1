<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="catalog">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
	<?php $this->load->view('front/slice/carousel_pixaprint'); ?>
		<div id="ourproduct">
			<h2>OUR PRODUCT</h2>
		</div> 
	</div>
				<div class="ourproduct-container">
				<div class="row">
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_business_card/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/busines_card.png">
							<div><p>Business Card</p></div>
						</a>
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/flyer.png">
							<div><p>Flyer</p></div>
						</a>
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_brochure/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/brochure.png">
							<div><p>Brochure</p></div>
						</a>
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_poster/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/poster.png">
							<div><p>Poster</p></div>
						</a>
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_kop/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/kop_surat.png">
							<div><p>Kop Surat</p></div>
						</a>
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="image-container">
						<a href="<?php echo site_url("front/checkout/product_detail_amplop/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/amplop.png">
							<div><p>Amplop</p></div>
						</a>
					</div>
				  </div>
				</div>
			</div>
        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>