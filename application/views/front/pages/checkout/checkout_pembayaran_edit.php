<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>

 <script type="text/javascript">
			window.onload = function() 
			{
				$('#provinsi').val("<?php echo $pengiriman->customer_provinsi_id ?>");
				get_lokasi2("<?php echo $pengiriman->customer_kota_id ?>");
            }
			function get_lokasi()
			{
				$.post("<?php echo site_url('rajaongkir/getCity') ?>/"+$('#provinsi').val(),function(obj){
					$('#kota').html(obj);
				});
			}
			function get_lokasi2(id)
			{
				$.post("<?php echo site_url('rajaongkir/getCity_id') ?>/"+id,function(obj){
					$('#kota').html(obj);
				});
			}
 </script>

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
					<a href="#">
						<span class="round">4</span>
					</a>
				</div>
				<span>Konfirmasi Pembayaran</span>
			</div>
			<div class="stage five">
				<div class="round-container">
					<a href="#">
						<span class="round">5</span>
					</a>
				</div>
				<span>Selesai!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="cart-checkout">
			<div>
				<div class="billing">
					<h2>Informasi Pengiriman</h2>
					 <?php echo form_open('front/checkout/checkout_pembayaran_edit/edit', 'id="form_add"'); ?>
						<ul>
							<li>
								<label>Nama Lengkap</label>
								<input name="datamodel" required id="datamodel" hidden readonly value="<?php echo $pengiriman->pengiriman_id; ?>">
								<input name="nama" required id="nama" placeholder="Nama Lengkap" value="<?php echo $pengiriman->customer_nama; ?>">
							</li>
							<li>
								<label>Email</label>
								<input name="email" required id="email" placeholder="Email" value="<?php echo $pengiriman->customer_email; ?>">
							</li>
							<li>
								<label>No Telp</label>
								<input name="telp" required id="telp" placeholder="No Telpon" value="<?php echo $pengiriman->customer_telp; ?>">
							</li>
							<li>
								<label>Alamat</label>
								<textarea name="alamat" required id="alamat" placeholder="Alamat"><?php echo $pengiriman->customer_alamat; ?></textarea>
							</li>
							<li>
								<label>Provinsi</label>
								<select name="provinsi" required id="provinsi" onchange="get_lokasi()" >
								<option>--Pilih Provinsi--</option>
									<?php $this->load->view('rajaongkir/getProvince'); ?>
								</select>
							</li>
							<li>
								<label>Kota</label>
								<select name="kota" required id="kota">
								<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
							</li>
							<li>
								<label>Kecamatan</label>
								<input name="kecamatan" required id="kecamatan" placeholder="Kecamatan" value="<?php echo $pengiriman->customer_kecamatan; ?>">
							</li>
							<li>
								<label>Kodepos</label>
								<input name="kode_pos" required id="kode_pos" placeholder="Kode pos" value="<?php echo $pengiriman->customer_kode_pos; ?>">
							</li>
						</ul>
						<input type="submit" id="button" name="simpan" value="Lanjutkan Pemesanan"  class="btn btn-success" />
				  </div>
						
					<?php echo form_close(); ?>  
				</div>
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