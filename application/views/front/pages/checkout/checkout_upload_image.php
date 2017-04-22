<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-3">
<?php $this->load->view('front/slice/menu'); ?>
<script type="text/javascript">
	function check_form(){
		 lnv.confirm({
			title: 'Konfirmasi',
			content: 'Apakah Anda Yakin dengan Desain yang Anda Upload? <br/> Kami tidak bertanggung jawab terhadap pelanggaran hak cipta dari konten desain yang Anda upload',
			confirmBtnText: 'Confirm',
			confirmHandler: function(){
				$('#button').trigger('click');
			},
			cancelBtnText: 'Cancel',
			cancelHandler: function(){

			}
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
		
		<div class="detail-product">
			<?php echo form_open_multipart('front/checkout/checkout_upload/add', 'id="form_checkouts"'); ?>	
			<div class="upload">
					<div class="front-design">
						<label>Front Design</label>
				        <input type="file" name="front" required />
						<div class="clear"></div>
					</div>
					<div class="back-design">
						<label>Back Design</label>
				        <input type="file" name="back" required />
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
			</div>
				<div class="button" hidden>
					<button type="submit" id="button" name="simpan" value="Simpan">
						<span>
							<span>
								Lanjutkan >
							</span>
						</span>
					</button>
				</div>
			 <?php echo form_close(); ?>  
				<div class="button">
					<button type="submit" id="button_check" name="button_check" onclick="check_form()">
						<span>
							<span>
								Lanjutkan >
							</span>
						</span>
					</button>
				</div>
		</div>
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>