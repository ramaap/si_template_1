<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>

 <script type="text/javascript">
			window.onload = function() 
			{
				$('#provinsi2').val("<?php echo $penagihan->customer_provinsi_id ?>");
				get_lokasi4("<?php echo $penagihan->customer_kota_id ?>");
            }
			function get_lokasi3(id)//untuk alamat penagihan
			{
				$.post("<?php echo site_url('rajaongkir/getCity_id') ?>/"+id,function(obj){
					$('#kota2').html(obj);
				});
			}
			function get_lokasi4()//untuk alamat penagihan
			{
				$.post("<?php echo site_url('rajaongkir/getCity') ?>/"+$('#provinsi2').val(),function(obj){
					$('#kota2').html(obj);
				});
			}
			function tampil_data(act){
				var w = 501;
				var x = $('#kota2').val();
				var y = $('#berat').val();
				var z = $('#courier').val();

				$.ajax({
				 url: "<?php echo site_url('rajaongkir/getCost') ?>",
				type: "GET",
				data : {origin: w, destination: x, berat: y, courier: z},
				success: function (ajaxData){
					$("#ongkir").html(ajaxData);
						// alert(ajaxData);
					}
				});
			 };
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
					<h2>Informasi Penagihan</h2>
					 <?php echo form_open('front/checkout/checkout_pembayaran_edit2/edit', 'id="form_add"'); ?> 
						<ul>
							<li>
								<label>Nama Lengkap</label>
								<input name="datamodel" required id="datamodel" hidden readonly value="<?php echo $penagihan->penagihan_id; ?>">
								<input name="nama2" required id="nama2" placeholder="Nama Lengkap" value="<?php echo $penagihan->customer_nama; ?>">
							</li>
							<li>
								<label>Email</label>
								<input name="email2" required id="email2" placeholder="Email" value="<?php echo $penagihan->customer_email; ?>">
							</li>
							<li>
								<label>No Telp</label>
								<input name="telp2" required id="telp2" placeholder="No Telpon" value="<?php echo $penagihan->customer_telp; ?>">
							</li>
							<li>
								<label>Alamat</label>
								<textarea name="alamat2" required id="alamat2" placeholder="Alamat"><?php echo $penagihan->customer_alamat; ?></textarea>
							</li>
							<li>
								<label>Provinsi</label>
								<select name="provinsi2" required id="provinsi2" onchange="get_lokasi4()" >
								<option>--Pilih Provinsi--</option>
									<?php $this->load->view('rajaongkir/getProvince'); ?>
								</select>
							</li>
							<li>
								<label>Kota</label>
								<select name="kota2" required id="kota2">
								<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
							</li>
							<li>
								<label>Kecamatan</label>
								<input name="kecamatan2" required id="kecamatan2" placeholder="Kecamatan" value="<?php echo $penagihan->customer_kecamatan; ?>">
							</li>
							<li>
								<label>Kodepos</label>
								<input name="kode_pos2" required id="kode_pos2" placeholder="Kode pos" value="<?php echo $penagihan->customer_kode_pos; ?>">
							</li>
							<li>
								<label><i>*Berat</i></label>
								<input type="number" required name="berat" id="berat" placeholder="gram" >
							</li>
							<li>
								<label><i>*Kurir</i></label>
								<select name="courier" required onchange="tampil_data('data')" id="courier">
									<option value="">Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="pos">POS</option>
									<option value="tiki">TIKI</option>
								</select>
							</li>
							<li>
								<label><i>*Ongkos Kirim</i></label>
								<select name="ongkir" id="ongkir">
								<option value="0" selected="" disabled="">Ongkir Belum Tersedia</option>
								</select>
							</li>
							<span><b><i>*) Silahkan isi kembali data Ongkos Kirim</i></b></span>
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