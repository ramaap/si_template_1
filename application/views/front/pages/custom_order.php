<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_home'); ?>
<body class="custom">
<?php $this->load->view('front/slice/menu');

 if ($this->session->userdata('alert') != '')
        echo "<script>alert('" . $this->session->userdata('alert') . "')</script>";

    $this->session->set_userdata('alert', '');
 ?>

	<div class="main container">
		<div class="custom-order">
					<h2>Custom Order</h2>
					<p>Silahkan mengisi form dibawah untuk melakukan custom order</p>
					 <?php echo form_open('front/custom_order/add', 'id="form_add"'); ?> 
						<ul>
							<li>
								<label>Nama</label>
								<input type="text" name="custom_nama" id="custom_nama" required placeholder="Nama">
							</li>
							<li>
								<label>email</label>
								<input type="email" name="custom_email" id="custom_email" required placeholder="email">
							</li>
							<li>
								<label>No Telp/HP</label>
								<input type="text" name="custom_telp" id="custom_telp" required placeholder="Telp/HP">
							</li>
							<li>
								<label>Ket Order</label>
								<textarea name="custom_keterangan" required id="custom_keterangan" placeholder="Keterangan"></textarea>
							</li>
						</ul>
				</div>
						<input type="submit" id="button" name="simpan" value="Submit"  class="btn btn-success" />
					<?php echo form_close(); ?>  
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>