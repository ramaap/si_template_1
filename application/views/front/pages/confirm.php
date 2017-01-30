<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-2">
<?php $this->load->view('front/slice/menu');

 if ($this->session->userdata('alert') != '')
        echo "<script>alert('" . $this->session->userdata('alert') . "')</script>";

    $this->session->set_userdata('alert', '');
 ?>

	<div class="main container">
		<div class="cart-checkout">
			<div>

				<div class="shipping">
					<h2>Konfirmasi Pembayaran</h2>
					 <?php echo form_open('front/confirm/add', 'id="form_add"'); ?> 
						<ul>
							<li>
								<label>Tanggal Pembayaran</label>
								<input type="date" name="tgl" id="tgl" required>
							</li>
							<li>
								<label>Nomor Pemesanan</label>
								<input name="order_no" id="order_no" required placeholder="No Pemesanan">
							</li>
							<li>
								<label>Jumlah Pembayaran</label>
								<input type="number" name="jml" id="jml" required placeholder="Jml Bayar">
							</li>
							<li>
								<label>Bank</label>
								<select name="bank" required id="bank" >
								<option>--Pilih Bank--</option>
									<?php $this->load->view('common/list_bank'); ?>
								</select>
							</li>
							<li>
								<label>No Rekening</label>
								<input name="no_rek" required id="no_rek" placeholder="No Rekening" >
							</li>
							<li>
								<label>Nama Pemilik Rekening</label>
								<input name="nama_rek" required id="nama_rek" placeholder="Nama Pemilik Rekening">
							</li>
							<li>
								<label></label>
								<textarea name="ket" required id="ket" placeholder="Keterangan"></textarea>
							</li>
						</ul>
				</div>
						<input type="submit" id="button" name="simpan" value="Submit"  class="btn btn-success" />
					<?php echo form_close(); ?>  
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