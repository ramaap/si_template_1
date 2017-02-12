<!DOCTYPE html>
<html>

<?php $this->load->view('front/slice/head_home'); ?>
<body class="index">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
	<?php $this->load->view('front/slice/carousel_home'); ?>

		<div class="middle">
			<div class="row middle-container">
				<div class="col-sm-6 pixaprint">
					<div class="image-container">
						<a href="<?php echo site_url("front/catalog/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint.png">
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-sm-6 pixadesign">
					<div class="image-container">
						<a href="<?php echo site_url("front/catalog_design/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign.png">
						</a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div id="question">
				<h3>Apa yang anda butuhkan?</h3>
			</div>
		</div>

		<div class="below">
			<?php $this->load->view('front/slice/product_carousel'); ?>
			
		</div>
	</div>
        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>