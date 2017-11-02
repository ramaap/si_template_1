<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="sign-up">
<?php $this->load->view('front/slice/menu'); ?>

 <script type="text/javascript">
			function get_lokasi()
			{
				$.post("<?php echo site_url('rajaongkir/getCity') ?>/"+$('#customer_provinsi_id').val(),function(obj){
					$('#customer_kota').html(obj);
				});
			}
 </script>
	<div class="main container">
		<div class="cart-checkout">
			<div>

				<div class="login">
					<div class="left column">
						<div class="login-container">
							<h2>Sign Up</h2>
							<p>Silahkan Daftar untuk dapat melakukan Order</p>
							<?php
							$attributes = array('class' => 'form-signin');
							echo form_open('front/sign_up/add', $attributes);
							?>
							<div class="email">
								<input type="text" name="customer_nama" class="form-control" placeholder="*Nama" required="">
							</div>
							<div class="email">
								<input type="text" name="customer_email" class="form-control" placeholder="*e-mail" required="" autofocus="">
							</div>
							<div class="password">
								 <input type="password" name="password1" class="form-control" placeholder="*Password" required="">
							</div>
							<div class="password">
								 <input type="password" name="password2" class="form-control" placeholder="*Ulang Password" required="">
							</div>
							<div class="email">
								<input type="text" name="customer_telp" class="form-control" placeholder="Telp/HP">
							</div>
							<div class="email">
								<textarea type="text" name="customer_alamat" class="form-control" placeholder="Alamat" ></textarea>
							</div>
							<div class="email">
								<select class="form-control" name="customer_provinsi_id" id="customer_provinsi_id" onchange="get_lokasi()" >
								<option>--Pilih Provinsi--</option>
									<?php $this->load->view('rajaongkir/getProvince'); ?>
								</select>
							</div>
							<div class="email">
								<select class="form-control" name="customer_kota" id="customer_kota">
								<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
							</div>
							<div class="email">
								<input type="text" name="customer_kecamatan" class="form-control" placeholder="Kecamatan">
							</div>
							<div class="email">
								<input type="number" name="customer_kode_pos" class="form-control" placeholder="Kode Pos">
							</div>
							<p><i>*) Wajib diisi</i></p>
							<div class="button-login" >
								<button type="submit">
									<span>
										<span>
											Sign Up
										</span>
									</span>
								</button>
							</div>
							<?php echo form_close(); ?>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>