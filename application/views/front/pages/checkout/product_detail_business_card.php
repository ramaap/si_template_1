<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_catalog'); ?>
<body class="product-detail business-card">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="banner">
			<h2>
				<span>Kartu Nama</span>
			</h2>
			<?php $this->load->view('front/slice/carousel_kn'); ?>
		</div>
		<div id="ourproduct">
			<h2>Paket Mana yang Anda Butuhkan?</h2>
			<div class="ourproduct-container">
				<div class="side left">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/3.png">
						<div class="clear"></div>
					</div>
					<div class="column info-action">
						<strong>Original Bussines Card</strong>
						<p>Menggunakan kertas standar, pilihan, harga, dan kualitas terjangkau.</p>
						<p>Harga Mulai IDR18000 / box</p>
						<a href="<?php echo site_url("front/checkout/checkout_business_card/"); ?>">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="side right">
					<div class="column images">
						<img src="<?php echo base_url(); ?>include/front/images/index/pixaprint/2.png">
						<div class="clear"></div>
					</div>
					<div class="column info-action">
						<strong>Deluxe Bussines Card</strong>
						<p>Menggunakan kertas fancy import, dicetak dengan kualitas terbaik dan tampilan yang super deluxe. Dapat menggunakan tambahan finishing seperti hotprint atau emboss</p>
						<p>Harga Mulai IDR18000 / box</p>
						<a href="">
							<button>
								<span>
									<span>Order ></span>
								</span>
							</button>
						</a>
					</div>
					<div class="clear"></div>
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
						<td>Pilihan terbaik untuk Anda yang mencari kartu nama dengan harga yang terjangkau Kami rekomendasikan laminasi untuk hasil terbaik</td>
						<td>Berikan kesan pertama yang luar biasa dengan kartu nama mewah. Laminasi tidak kami rekomendasikan karena akan menutup keindahan jenis kertas</td>
					</tr>
					<tr>
						<td class="colored">Kertas</td>
						<td>Menggunakan kertas standar, Art Cartoon yang terdapat dalam 2 pilihan gramatur yaitu 230gr dan 260gr</td>
						<td>Menggunakan kertas fancy tebal dan terdapat 2 pilihan kertas yaitu Cougar Opaque 250gr dan Coronado 270gr (kertas bertekstur)</td>
					</tr>
					<tr>
						<td class="colored">Kualitas Cetak</td>
						<td>Dicetak dengan kualitas baik dengan menggunakan mesin digital printing</td>
						<td>Dicetak dengan mesin terbaik, mesin cetak Speedmaster 53 memberikan kualitas yang tinggi</td>
					</tr>
					<tr>
						<td class="colored">Harga</td>
						<td>Mulai dari 18.000/Box</td>
						<td>Mulai dari 32.000/Box</td>
					</tr>
				</table>
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