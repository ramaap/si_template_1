<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="stages">
			<div class="stage one">
				<div class="round-container">
					<a href="#">
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
				<span>Pembayaran</span>
			</div>
			<div class="stage three">
				<div class="round-container">
					<a href="#">
						<span class="round">3</span>
					</a>
				</div>
				<span>Konfirmasi Pembayaran</span>
			</div>
			<div class="stage four">
				<div class="round-container">
					<a href="#">
						<span class="round">4</span>
					</a>
				</div>
				<span>Selesai!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="cart-checkout">
				<div class="head">
					<span>Your Cart</span>
				</div>

				<div class="cart-container">
					<div class="container">
						<div class="left">
							<h2>Review</h2>
						</div>
						<div class="right">
							<ul>
								<li>
									<label>Total Item</label>
									<span>: <?php echo $jml_item->item; ?></span>
								</li>
								<li>
									<label>Total Price</label>
									<span>: IDR <?php echo number_format($total->order_total,0,",",".").",-"; ?></span>
								</li>
								<li>
									<label>Total Ongkir</label>
									<span>: IDR <?php echo number_format($total->order_ongkir,0,",",".").",-"; ?></span>
								</li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="pembayaran">
					<div class="left">
						<h2>Pembayaran</h2>
						<p>
							Mohon maaf untuk saat ini Kami hanya dapat melayani melayani pembayaran melalui transfer Bank.
						</p>
						<p>
							Mohon pembayaran jumlah sesuai yang tertera pada informasi Total pembayaran.<br/>
							Pembayaran dan konfirmasi transfer haru dilakukan dalam waktu 2 jam<br/>
							atau pesanan akan otomatis dibatalkan.
						</p>
						<p>
							Transfer dapat dilakukan melalui 
						</p>
						<div class="bank">
							<div class="bca">
								<img src="<?php echo base_url(); ?>include/front/images/checkout/bca.png">
								<strong>
									<p>Bank Central Asia</p>
									<p>037 233 5333</p>
									<p>Ronny Kurniawan</p>
								</strong>
							</div>
						</div>
						<div class="shipping-billing">
							<div class="left">
								<div class="title">
									<h3>Informasi Pengiriman</h3><a href="<?php echo site_url("front/checkout/checkout_pembayaran_edit/"); ?>">(edit)</a>
									<div class="clear"></div>
								</div>
								<div>
									<p><?php echo $pengiriman->customer_nama; ?></p>
									<p><?php echo $pengiriman->customer_email; ?></p>
									<p><?php echo $pengiriman->customer_telp; ?></p>
									<p><?php echo $pengiriman->customer_alamat; ?></p>
									<p><?php echo $pengiriman->customer_kecamatan; ?>,<?php echo $pengiriman->kota; ?></p>
									<p><?php echo $pengiriman->nama_prov; ?></p>
									<p><?php echo $pengiriman->customer_kode_pos; ?></p>
								</div>
							</div>
							<div class="right">
								<div class="title">
									<h3>Informasi Penagihan</h3><a href="<?php echo site_url("front/checkout/checkout_pembayaran_edit2/"); ?>">(edit)</a>
									<div class="clear"></div>
								</div>
								<div>
									<p><?php echo $penagihan->customer_nama; ?></p>
									<p><?php echo $penagihan->customer_email; ?></p>
									<p><?php echo $penagihan->customer_telp; ?></p>
									<p><?php echo $penagihan->customer_alamat; ?></p>
									<p><?php echo $penagihan->customer_kecamatan; ?>,<?php echo $pengiriman->kota; ?></p>
									<p><?php echo $penagihan->nama_prov; ?></p>
									<p><?php echo $penagihan->customer_kode_pos; ?></p>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="right">
				<div class="cart-container">
				<?php
				foreach($cart as $val)
				{
				?>
					<center><img style="width:400px;height:200px;" src="<?php echo base_url(); ?>include/order/<?php echo $val->foto_front; ?>"></center>
					<div class="items">
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
							</ul>
						</div>
					</div>
					<div class="separator"></div>
					<div class="total">
						<label>Total</label>
						<strong>IDR <?php echo number_format($val->harga_total,0,",","."); ?>,-</strong>
					</div>
					<br/>
				<?php } ?>
					<div class="total" align="right">
						<label>TOTAL ORDER : </label>
						<strong>IDR <?php echo number_format($total->total,0,",","."); ?>,-</strong>
					</div>
				</div>
					</div>
					<p>
						Mohon periksa kembali semua informasi sebelum melanjutkan pesanan Anda. 
					</p>
					<a href="<?php echo site_url("front/checkout/checkout_success/"); ?>">
						<div class="lanjutkan">
							<span>Lanjutkan Pemesanan</span>
						</div>
					</a>
					<div class="clear"></div>
				</div>
		</div>
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>