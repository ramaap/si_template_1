<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail poster">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Poster</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_poster'); ?>
			
		</div>
		<div id="ourproduct">
			<h2>Ukuran poster mana yang anda butuhkan?</h2>
			<div class="ourproduct-container">
				<div class="side left">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/poster/poster-product1.png">
					</div>
					<div class="column info-action">
						<strong>A3 (297x420mm)</strong>
						<p>Merupakan ukuran yang paling umum </p>
						<p>untuk sebuah poster. Cocok diletakan</p>
						<p>di ruangan yang tidak terlalu besar </p>
						<p>dan mudah dilihat banyak orang.</p>
						<br/>
						<p>Opsi tersedia untuk brosur ukuran A4 dan A3</p>
						<br/>
						<p>Harga mulai IDR 6000 / Pcs</p>
						<a href="<?php echo site_url("front/checkout/checkout_poster/"); ?>">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
				</div>
				<div class="side right">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/poster/poster-product2.png">
					</div>
					<div class="column info-action">
						<strong>A2 (420x594mm)</strong>
						<p>Ukuran yang sangat cocok digunakan </p>
						<p>pada ruangan besar, dapat dengan</p>
						<p>mudah dilihat banyak orang.</p>
						<br/>
						<p>Harga mulai IDR 29.400 /Pcs</p>
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