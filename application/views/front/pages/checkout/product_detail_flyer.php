<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail flyer">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Flyer</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_flyer'); ?>
		</div>
		<div id="ourproduct">
			<h2>Pilih ukuran yang anda butuhkan</h2>
			<div class="ourproduct-container row">
				<div class=".col-xs-6 col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/flyer/flyer-product1.png">
					</div>
					<div class="column info-action">

						<strong>A4 (210x297mm)</strong>
						<p>Promosikan Produk anda dengan</p>
						<p>ukuran A4 yang lebih besar dan elegant</p>
						<br/>
						<p>Harga mulai IDR1.330 / Pcs</p>
						<a href="<?php echo site_url("front/checkout/checkout_flyer/"); ?>">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
				</div>
				<div class=".col-xs-6 col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/flyer/flyer-product2.png">
					</div>
					<div class="column info-action">
						<strong>A5 (148x210mm)</strong>
						<p>Ukuran terbaik untuk mempromosikan</p>
						<p>produk anda, dengan space yang cukup.</p>
						<p>Tidak kurang atau lebih</p>
						<br/>
						<p>Harga mulai IDR 830 / Pcs</p>
						<a href="">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
				</div>
				<div class=".col-xs-6 col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/flyer/flyer-product3.png">
					</div>
					<div class="column info-action">
						<strong>DL (100x210mm)</strong>
						<p>Ekonomis dan pas untuk menyebarkan</p>
						<p>info mengenai produk anda.</p>
						<br/>
						<p>Harga mulai IDR 590 / Pcs</p>
						<a href="">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
				</div>
				<div class="clear"></div>
			</div> 
		</div>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>