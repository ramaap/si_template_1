<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail kop">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Kop Surat</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_kop'); ?>
			
		</div>
		<div id="ourproduct">
			<h2>Sudah memutuskan ukuran Kop surat?</h2>
			<div class="ourproduct-container">
				<div class="side left">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/kop/kop-product1.png">
					</div>
					<div class="column info-action">
						<strong>A4 (210x297mm)</strong>
						<p>Ukuran yang paling umum untuk</p>
						<p>digunakan sebagai kop surat.</p>
						<p>Tampilkan profesionalmu dengan kop surat.</p>
						<p>dan mudah dilihat banyak orang.</p>
						<br/>
						<p>Opsi tersedia untuk brosur ukuran A4 dan A3</p>
						<br/>
						<p>Harga mulai IDR 6000 / Pcs</p>
						<a href="<?php echo site_url("front/checkout/checkout_kop/"); ?>">
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
						<img src="<?php echo base_url(); ?>include/front/images/product/kop/kop-product2.png">
					</div>
					<div class="column info-action">
						<strong>F4 (215x330mm)</strong>
						<p>Ukuran  sedikit lebih besar dari A4,</p>
						<p>menyesuaikan kebutuhan profesional anda.</p>
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

	<script type="text/javascript">
		var interval = null
		$(document).ready(function(){
			interval = setInterval(columnHeight,10);
		});
		function columnHeight(){
			var checkload = $('.column.images');
			if (checkload.length == 0) {
				return;
			}
			if(checkload.length > 0){
				var $columnImageHeight= $('.column.images').outerHeight();
				var $columnActionHeight= $('.column.info-action').outerHeight();

				if ($columnImageHeight > $columnActionHeight ) {
					$('.column.info-action').outerHeight($columnImageHeight);
				}else{
					$('.column.images').outerHeight($columnActionHeight);
				}
				clearInterval(interval);
			}
		}
    </script>
        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>