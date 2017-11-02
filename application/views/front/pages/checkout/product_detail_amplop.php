<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail amplop">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Amplop</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_amplop'); ?>
			
		</div>
		<div id="ourproduct">
			<h2>Berikan kesan terbaik dengan Amplop berkualitas</h2>
			<div class="ourproduct-container">
				<div class="side">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/product/amplop/amplop-product1.png">
					</div>
					<div class="column info-action">
						<strong>230x110mm</strong>
						<p>Berukuran 230x110mm, </p>
						<p>cocok digunakan untuk kertas A4 maupun F4.</p>
						<br/>
						<p>Harga mulai IDR 6000 / Pcs</p>
						<a href="<?php echo site_url("front/checkout/checkout_amplop/"); ?>">
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