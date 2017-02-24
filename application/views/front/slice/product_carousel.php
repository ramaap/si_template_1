	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>
		<div class="pixaprint container">
				<div class="title">
					<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/logo.png">
				</div>
				<ul class="bxslider">
					<li>
						<a href="<?php echo site_url("front/checkout/product_detail_business_card/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/2.png" />
							<h2>Kartu Nama</h2>
							<span>
								<p>Mulai dari IDR 16.000/box</p>
							</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/checkout/product_detail_flyer/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/1.png" />
							<h2>Flyer</h2>
							<span>
								<p>Mulai dari IDR 325/box</p>
							</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/checkout/product_detail_brochure/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/4.png" />
							<h2>Brochure</h2>
							<span>
								<p>Mulai dari IDR 2500/box</p>
							</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/checkout/product_detail_kop/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/3.png" />
							<h2>Kop Surat</h2>
							<span>
								<p>Mulai dari IDR 650/box</p>
							</span>	
						</a>
					</li>
				</ul>
			</div>
			<div class="pixadesign container">
				<div class="title">
					<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/logo.png">
				</div>
				<ul class="bxslider">
					<li>
						<a href="<?php echo site_url("front/design/catalog_design_fitbox/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/1.png" />
							<h2>Branding</h2>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/design/catalog_design_kurnia/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/2.png" />
							<h2>Rebranding</h2>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/design/catalog_design_mindo/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/3.png" />
							<h2>Corporate Identity</h2>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url("front/design/catalog_design_wijaya/"); ?>">
							<img src="<?php echo base_url(); ?>include/front/images/index/pixadesign/4.png" />
							<h2>Deluxe Bussiness Card</h2>
						</a>
					</li>
				</ul>
			</div>



	<script type="text/javascript">
		$(document).ready(function(){
		});
		$(document).ready(function(){
			var $window = $(window);
			var windowsize = $window.width();
			if (windowsize>480) {
				$('.pixadesign .bxslider').bxSlider({
					slideWidth: 1000,
				    minSlides: 4,
				    maxSlides: 4,
				    slideMargin: 10,
					pager:false
				});

				$('.pixaprint .bxslider').bxSlider({
					slideWidth: 1000,
				    minSlides: 4,
				    maxSlides: 4,
				    slideMargin: 10,
					pager:false
				});
			}else{
				$('.pixadesign .bxslider').bxSlider({
					slideWidth: 1000,
				    minSlides: 2,
				    maxSlides: 2,
				    slideMargin: 10,
					pager:false
				});
				$('.pixaprint .bxslider').bxSlider({
					slideWidth: 1000,
				    minSlides: 2,
				    maxSlides: 2,
				    slideMargin: 10,
					pager:false
				});
			};

		});
	</script>