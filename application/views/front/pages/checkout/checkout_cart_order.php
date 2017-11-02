<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>

 <script type="text/javascript">
			
			function deleted(index)
			{
				var x;
				if (confirm("Menghapus data cart ini?") == true) {
					 $.ajax({
                    type: "POST",
                            url: "<?php echo site_url('front/checkout/checkout_cart_order/delete_permanent') ?>",
                            timeout: 20000,
                            data:
                            'datamodel=' + index

                            , success: function(result) {
								// alert(result);
                            if (result == "1")
                            {
								alert('Hapus sukses');
                                    location.reload();
                                    window.location.replace("<?php echo site_url('front/checkout/checkout_cart_order/'); ?>");
                            }
                            else
                                alert("Kode Eror [100] : Terjadi kesalahan saat eksekusi permintaan<br/><br/>Status: gagal menerima data dari server");
                            },
                            error: function(html) {
								alert("Kode Eror [" + html.status + "]<br/><br/>Status:" + html.statusText);
                            }

                    });
				} else {
					alert("Batal Menghapus data");
				}
            }
			
 </script>

	<div class="main container">
		<div class="stages">
			<div class="stage one">
				<div class="round-container">
					<a>
						<span class="round">1</span>
					</a>
				</div>
				<span>Pilih Produk</span>
			</div>
			<div class="stage two">
				<div class="round-container">
					<a href="#">
						<span class="round">2</span>
					</a>
				</div>
				<span>Upload Desain</span>
			</div>
			<div class="stage three">
				<div class="round-container">
					<a href="#">
						<span class="round">3</span>
					</a>
				</div>
				<span>Pembayaran</span>
			</div>
			<div class="stage four">
				<div class="round-container">
					<a>
						<span class="round">4</span>
					</a>
				</div>
				<span>Konfirmasi Pembayaran</span>
			</div>
			<div class="stage five">
				<div class="round-container">
					<a>
						<span class="round">5</span>
					</a>
				</div>
				<span>Selesai!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="cart-checkout">
			<div>
				<div class="head">
					<span>Your Cart</span>
				</div>
				<div class="cart-container">
				<?php
				foreach($cart as $val)
				{
				?>
					<div class="itemcontainer">
						<div class="image-preview">
							<img src="<?php echo base_url(); ?>include/order/<?php echo $val->foto_front; ?>">
							<br/>
							<span>Front</span>
							<br/>
							<br/>
							<img src="<?php echo base_url(); ?>include/order/<?php echo $val->foto_back; ?>">
							<br/>
							<span>Back</span>
						</div>
						
						<div class="items">
							<img src="<?php echo base_url(); ?>include/front/images/checkout/pembayaran.jpg">
							<h3 class="item-name"><?php echo $val->nama; ?></h3>
							<div class="detailed">
								<ul>
									<li>
										<label>Ukuran</label>
										<span>:<?php echo $val->ukuran; ?></span>
									</li>
									<li>
										<label>Tipe Kertas</label>
										<span>: <?php echo $val->kertas_nama; ?></span>
									</li>
									<li>
										<label>Laminasi</label>
										<span>: <?php echo $val->laminasi; ?></span>
									</li>
									<li>
										<label>Sisi Cetak</label>
										<span>: <?php echo $val->sisi_cetak; ?> Muka</span>
									</li>
									<li>
										<label>Finishing</label>
										<span>: <?php echo $val->tambahan_ket; ?></span>
									</li>
									<li>
										<label>Jumlah Order</label>
										<span>: <?php echo $val->jumlah; ?></span>
									</li>
									<!--span class="delete-item">
										 <a title="Hapus Data" href="#" id="datamodel_<?php //echo $val->order_detail_id; ?>" value="<?php //echo $val->order_detail_id; ?>"  onclick="deleted(<?php //echo $val->order_detail_id; ?>)">
										 	<span>
												X
										 	</span>
										 </a>
									</span-->
								</ul>
							</div>
							<div class="separator"></div>
							<div class="total">
								<label>Total</label>
								<strong>IDR <?php echo number_format($val->harga_total,0,",","."); ?>,-</strong>
							</div>
						</div>
						<br/>
					</div>
				<?php } ?>
					<div class="total" align="right">
						<label>TOTAL ORDER : </label>
						<strong>IDR <?php echo number_format($total->total,0,",","."); ?>,-</strong>
					</div>
					<a href="<?php echo site_url("front/checkout/checkout_confirm/"); ?>">
						<div class="lanjutkan">
							<span>Lanjutkan</span>
						</div>
					</a>
				</div>
				</div>
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

    <script type="text/javascript">
		$(".cart-checkout .cart-container .lanjutkan").click(function(){
			$('.cart-checkout .shipping').show();
			$('html,body').animate({scrollTop: $('.cart-checkout .shipping').offset().top},'slow');
		});
		$(".cart-checkout .shipping .lanjutkan").click(function(){
			$('.cart-checkout .billing').show();
			$('html,body').animate({scrollTop: $('.cart-checkout .billing').offset().top},'slow');
		});
    </script>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>