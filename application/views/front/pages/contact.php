<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="contact">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="title">
			<img src="<?php echo base_url(); ?>include/front/images/page/contact/title-contact.png">
		</div>
		<p>
			Hallo! Terima kasih sudah menjadi pelanggan setia kami. Apabila ada pertanyaan, silahkan cek halaman FAQ (Frequently Asked Question) terlebih dahulu. Bila pertanyaanmu belum terjawab di halaman tersebut, silakan kirim email kepada kami dengan mengisi form dibawah ini.
		</p>
		<p>
			Mohon diingat, jam kerja kami adalah pukul 07.30 -17.00 WIB dari senin sampai sabtu, dan Pertanyaanmu akan kami respon dalam waktu paling lambat 2x24 jam. Kami mohon maaf sebelumnya apabila ada keterlambatan dalam membalas pesan lebih dari waktu yang ditentukan. 
		</p>
		<p>
			Jadi, silahkan isi form dibawah, dengan senang hati kami akan menjawabnya! 
		</p>
		
		<div class="content form">
			<?php echo form_open('front/contact/Post', 'id="form_add"'); ?> 
			<ul>
				<li>
					<label>Subject</label>
					<input type="text" id="subject" name="subject" required>
				</li>
				<li>
					<label>Nama Lengkap</label>
					<input type="text" id="nama" name="nama" required>
				</li>
				<li>
					<label>Alamat Email</label>
					<input type="email" id="email" name="email" required>
				</li>
				<li>
					<label>Nomor Telepon</label>
					<input type="text" id="telp" name="telp" required>
				</li>
				<li>
					<label>Pesan</label>
					<textarea rows="4" cols="50" id="pesan" name="pesan" required style="vertical-align: top;"></textarea>
				</li>
			</ul>
			<input type="submit" id="button" name="kirim" value="Kirim"  class="btn btn-success" />
			<?php echo form_close(); ?>  
		</div>
        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>