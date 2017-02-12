<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
	<?php $this->load->view('front/slice/carousel_kn'); ?>
		<div id="ourproduct">
			<h2>Paket Mana yang Anda Butuhkan?</h2>
			<div class="ourproduct-container">
				<div class="side left">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/3.png">
					</div>
					<div class="column info-action">
						<strong>Original Bussines Card</strong>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</p>
						<p>Harga Mulai IDR18000 / box</p>
						<a href="<?php echo site_url("front/checkout/checkout_business_card/"); ?>">
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
						<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/2.png">
					</div>
					<div class="column info-action">
						<strong>Deluxe Bussines Card</strong>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</p>
						<p>Harga Mulai IDR18000 / box</p>
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
			<div class="different">
			<h2>Apa Perbedaanya?</h2>
				<table>
					<tr>
						<th></th>
						<th>Original Bussines Card</th>
						<th>Deluxe Bussines Card</th>
					</tr>
					<tr>
						<td class="colored"></td>
						<td>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
						<td>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
					</tr>
					<tr>
						<td class="colored">Kertas</td>
						<td>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
						<td>$Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
					</tr>
					<tr>
						<td class="colored">Kualitas Cetak</td>
						<td>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
						<td>$Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</td>
					</tr>
					<tr>
						<td class="colored">Harga</td>
						<td>Lorem ipsum dolor sit amet.</td>
						<td>$Lorem ipsum dolor sit amet.</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var $toEqualize = $('.column');
		$toEqualize.css('height', (function(){
		return Math.max.apply(null, $toEqualize.map(function(){
		return $(this).height();
		}).get());
		})());
    </script>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>