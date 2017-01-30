<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="sitemap">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<h2>Sitemap</h2>
		<div class="sitemap-container">
			<ul>
				<li class="level-0">
					<a href="<?php echo site_url('front/home') ?>">Home</a>
					<ul>
						<li class="level-1">
							<a href="<?php echo site_url('front/catalog') ?>">Pixaprint</a>
							<ul>
								<li class="level-2">
									<a href="<?php echo site_url('/front/checkout/product_detail_business_card') ?>">Business Card</a>
									<ul>
										<li class="level-3"><a href="<?php echo site_url('/front/checkout/checkout_business_card') ?>">Original Business Card</a></li>
										<li class="level-3"><a href="">Deluxe Business Card</a></li>
									</ul>
								</li>
								<li class="level-2">
									<a href="<?php echo site_url('/front/checkout/product_detail_flyer') ?>">Flyer</a>
									<ul>
										<li class="level-3"><a href="<?php echo site_url('/front/checkout/checkout_flyer') ?>">Original Flyer</a></li>
										<li class="level-3"><a href="">Deluxe Flyer</a></li>
									</ul>
								</li>
							</ul>

						</li>
						<li class="level-1"><a href="">Pixadesign</a></li>
					</ul>
				</li>
				<li class="level-0"><a href="<?php echo site_url('front/we_are') ?>">Who we are</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/what_we') ?>">What we make</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/contact') ?>">Contact</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/question') ?>">Question</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/custom_order') ?>">Custom</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/faq') ?>">FAQ</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/harga') ?>">Harga</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/guideline') ?>">Guidelines</a></li>
				<li class="level-0"><a href="<?php echo site_url('front/confirm') ?>">Konfirmasi Pembayaran</a></li>
			</ul>
		</div>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>