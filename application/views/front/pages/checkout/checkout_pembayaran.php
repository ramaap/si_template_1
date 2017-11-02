<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>

 <script type="text/javascript">
			window.onload = function() 
			{
                document.getElementById("sama").checked = true;
				$('#provinsi').val("<?php echo $customer->customer_provinsi_id ?>");
				get_lokasi2("<?php echo $customer->customer_kota_id ?>");
            }
			function deleted(index)
			{
				var x;
				if (confirm("Menghapus data cart ini?") == true) {
					 $.ajax({
                    type: "POST",
                            url: "<?php echo site_url('front/checkout/checkout_pembayaran/delete_permanent') ?>",
                            timeout: 20000,
                            data:
                            'datamodel=' + index

                            , success: function(result) {
								// alert(result);
                            if (result == "1")
                            {
								alert('Hapus sukses');
                                    location.reload();
                                    window.location.replace("<?php echo site_url('front/checkout/checkout_pembayaran/'); ?>");
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
			
			function main_checkbox(thisit)
            {
				checked = $(thisit).prop("checked");
				if (checked)//jika dicek
				{
					nama = $('#nama').val();
					email = $('#email').val();
					telp = $('#telp').val();
					alamat = $('#alamat').val();
					kecamatan = $('#kecamatan').val();
					kode_pos = $('#kode_pos').val();
					propinsi = $('#provinsi').val();
					kota = $('#kota').val();
					
					$('#nama2').val(nama);
					$('#email2').val(email);
					$('#telp2').val(telp);
					$('#alamat2').val(alamat);
					$('#kecamatan2').val(kecamatan);
					$('#kode_pos2').val(kode_pos);
					
					$('#provinsi2').val(propinsi);
					get_lokasi3(kota);
				} 
				else
				{
					$('#nama2').val('');
					$('#email2').val('');
					$('#telp2').val('');
					$('#alamat2').val('');
					$('#kecamatan2').val('');
					$('#kode_pos2').val('');
					$('#provinsi2').val('');
					$('#kota2').val('');
				}
				
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
			
			function cek_alamat(){
				 if(document.getElementById("sama").checked)
				 {
					$('#buku_alamat').hide();
					$('#nama').val('<?php echo $customer->customer_nama; ?>');
					$('#email').val('<?php echo $customer->customer_email; ?>');
					$('#telp').val('<?php echo $customer->customer_telp; ?>');
					$('#alamat').val('<?php echo $customer->customer_alamat; ?>');
					$('#kecamatan').val('<?php echo $customer->customer_kecamatan; ?>');
					$('#kode_pos').val('<?php echo $customer->customer_kode_pos; ?>');
					$('#provinsi').val("<?php echo $customer->customer_provinsi_id; ?>");
					get_lokasi2("<?php echo $customer->customer_kota_id; ?>");

				 }
				 else if (document.getElementById("baru").checked)
				 {
					$('#buku_alamat').hide();
					$('#nama').val('');
					$('#email').val('');
					$('#telp').val('');
					$('#alamat').val('');
					$('#kecamatan').val('');
					$('#kode_pos').val('');
					$('#provinsi').val('');
					$('#kota').val('');
				 }
				 else
				 {
					 $('#buku_alamat').show();
					 get_alamat();
				 }
			}
			function get_alamat()
			{
					 $.ajax({
                    type: "POST",
                            url: "<?php echo site_url('front/checkout/checkout_pembayaran/get_alamat') ?>",
                            timeout: 20000,
                            data:
                            'datamodel=' + $('#buku').val()

                            , success: function(result) {
								// alert(result);
								arr=result.split("~");
								$('#nama').val(arr[0]);
								$('#email').val(arr[1]);
								$('#telp').val(arr[2]);
								$('#alamat').val(arr[3]);
								$('#kecamatan').val(arr[4]);
								$('#kode_pos').val(arr[5]);
								$('#provinsi').val(arr[6]);
								get_lokasi2(arr[7]);
                         
                            },
                            error: function(html) {
								alert("Kode Eror [" + html.status + "]<br/><br/>Status:" + html.statusText);
                            }

                    });
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
									<span class="delete-item">
										 <a title="Hapus Data" href="#" id="datamodel_<?php echo $val->cart_id; ?>" value="<?php echo $val->cart_id; ?>"  onclick="deleted(<?php echo $val->cart_id; ?>)">
										 	<span>
												X
										 	</span>
										 </a>
									</span>
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
					<div class="lanjutkan">
						<span>Lanjutkan</span>
					</div>
				</div>

				<div class="shipping">
					<h2>Informasi Pengiriman</h2>
					<p>
						Lorem ipsum dolor sit amet, mei sint concludaturque ea. An nam nostrum disputando, mea ei agam qualisque cotidieque, ne dolores intellegebat ius. Dicit nonumes vim cu, ad vix imperdiet assentior.
					</p>
					 <?php echo form_open('front/checkout/checkout_pembayaran/add', 'id="form_add"'); ?> 
						<ul>
							 <input type="radio" name="radio_alamat" onchange ="cek_alamat(this)" id="sama" value="sama" /> Alamat Utama
							 <input type="radio" name="radio_alamat" onchange ="cek_alamat(this)" id="data_alamat" value="data_alamat" /> Shipping Address
							 <input type="radio" name="radio_alamat" onchange ="cek_alamat(this)" id="baru" value="baru" /> Alamat Baru
							 <li>
								 <div id="buku_alamat" style="display:none;">
									<label>Shipping Address</label>
										<?php
										$query = "select * from buku_alamat u
												  join provinsi x on x.id_prov = u.customer_provinsi_id
												  join kota z on z.id_kota = u.customer_kota_id
												  where u.is_delete=0 
												  and u.customer_id = ".$this->session->userdata('customer_id')."";
										$result = mysql_query($query);
										?>
										<select id="buku" onchange="get_alamat(this)" name="buku"> 
											<?php
											echo "<option value='0'>Silahkan Pilih Alamat</option>";
											while ($row = mysql_fetch_array($result)) {
												echo "<option value=" . $row['alamat_id'] . " ".set_select('alamat_id',  $row['alamat_id']).">" 
												. $row['customer_alamat'] .", ". $row['customer_kecamatan'] .", ". $row['kota'] .", ". $row['nama_prov'] ." ". $row['customer_kode_pos'] ."</option>";
											}
											?>        
										</select>
								</div>
							</li>
							<li>
								<label>Nama Lengkap</label>
								<input name="nama" id="nama" required placeholder="Nama Lengkap" value="<?php echo $customer->customer_nama; ?>">
							</li>
							<li>
								<label>Email</label>
								<input name="email" id="email" required placeholder="Email" value="<?php echo $customer->customer_email; ?>">
							</li>
							<li>
								<label>No Telp</label>
								<input name="telp" id="telp" required placeholder="No Telpon" value="<?php echo $customer->customer_telp; ?>">
							</li>
							<li>
								<label>Alamat</label>
								<textarea name="alamat" required id="alamat" placeholder="Alamat"><?php echo $customer->customer_alamat; ?></textarea>
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
								<input name="kecamatan" required id="kecamatan" placeholder="Kecamatan" value="<?php echo $customer->customer_kecamatan; ?>" >
							</li>
							<li>
								<label>Kodepos</label>
								<input name="kode_pos" required id="kode_pos" placeholder="Kode pos" value="<?php echo $customer->customer_kode_pos; ?>" >
							</li>
						</ul>
					<div class="lanjutkan">
						<span>Lanjutkan</span>
					</div>
				</div>
				<div class="billing">
					<h2>Informasi Tagihan</h2>
					<input class="checkbox" type="checkbox" onclick="main_checkbox(this)" id="cekbox" >
					<label for="cekbox">Sama dengan Shipping Address</label>
						<ul>
							<li>
								<label>Nama Lengkap</label>
								<input name="nama2" required id="nama2" placeholder="Nama Lengkap">
							</li>
							<li>
								<label>Email</label>
								<input name="email2" required id="email2" placeholder="Email">
							</li>
							<li>
								<label>No Telp</label>
								<input name="telp2" required id="telp2" placeholder="No Telpon">
							</li>
							<li>
								<label>Alamat</label>
								<textarea name="alamat2" required id="alamat2" placeholder="Alamat"></textarea>
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
								<select name="kota2" required id="kota2" onchange="tampil_data('data')">
								<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
							</li>
							<li>
								<label>Kecamatan</label>
								<input name="kecamatan2" required id="kecamatan2" onchange="tampil_data('data')" placeholder="Kecamatan" >
							</li>
							<li>
								<label>Kodepos</label>
								<input name="kode_pos2" required id="kode_pos2" placeholder="Kode pos" >
							</li>
							<li>
								<label>Berat</label>
								<input type="number" required name="berat" onkeyup="tampil_data('data')" onchange="tampil_data('data')" id="berat" placeholder="gram" >
							</li>
							<li>
								<label>Kurir</label>
								<select name="courier" required onchange="tampil_data('data')" id="courier">
									<option value="">Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="pos">POS</option>
									<option value="tiki">TIKI</option>
								</select>
							</li>
							<li>
								<label>Ongkos Kirim</label>
								<select name="ongkir" id="ongkir">
								<option value="0" selected="" disabled="">Ongkir Belum Tersedia</option>
								</select>
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