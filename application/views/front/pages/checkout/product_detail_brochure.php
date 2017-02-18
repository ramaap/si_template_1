<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail brochure">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Brochure</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_brochure'); ?>
		</div>
		<div id="ourproduct">
			<h2>Sebelum melanjutkan, mari kita cari tahu dahulu bentuk brosur apa yang anda butuhkan?</h2>
			<div class="ourproduct-container row">
				<div class="col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/brochure/brochure-product1.png">
					</div>
					<div class="column info-action">
						<strong>BIFOLD</strong>
						<p>Brosur dilipat persis ditengah </p>
						<p>menjadi 2 bagian.</p>
						<br/>
						<p>Opsi tersedia untuk brosur ukuran A4 dan A3</p>
						<br/>
						<p>Harga mulai IDR1.330 / Pcs</p>
						<a href="<?php echo site_url("front/checkout/checkout_brochure/"); ?>">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/brochure/brochure-product2.png">
					</div>
					<div class="column info-action">
						<strong>TRIFOLD - U FOLD</strong>
						<p>Brosur dilipat menjadi 3 bagian, </p>
						<p>dengan halaman terakhir dilipat kedalam.</p>
						<br/>
						<p>Opsi hanya tersedia untuk brosur ukuran A4</p>
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
				<div class="col-md-4">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/brochure/brochure-product3.png">
					</div>
					<div class="column info-action">
						<strong>TRIFOLD - Z FOLD</strong>
						<p>Brosur dilipat menjadi 3 bagian, </p>
						<p>dengan halaman terakhir brosur dilipat keluar </p>
						<p>membentuk huruf Z.</p>
						<br/>
						<p>Opsi hanya tersedia untuk brosur ukuran A4</p>
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