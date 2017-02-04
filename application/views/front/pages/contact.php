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
			<ul>
				<li>
					<label>Subject</label>
					<input type="text">
				</li>
				<li>
					<label>Nama Lengkap</label>
					<input type="text">
				</li>
				<li>
					<label>Alamat Email</label>
					<input type="text">
				</li>
				<li>
					<label>Nomor Telepon</label>
					<input type="text">
				</li>
				<li>
					<label>Pesan</label>
					<textarea rows="4" cols="50" style="vertical-align: top;"></textarea>
				</li>
			</ul>
			<input type="submit" id="button" name="kirim" value="Kirim"  class="btn btn-success" />
		</div>
		
		<div class="newsletter">
			<div class="news-left">
				<span>Dapatkan penawaran menarik dengan langganan Newsletter kami</span>
				<br>
				<input type="text" name="email" placeholder="Masukkan alamat email kamu disini">
			</div>
			<div class="news-left social">
				<span>Jangan lupa Follow kami juga</span>
				<div class="social">
					<a href="#"><em class="instagram"></em></a>
					<a href="#"><em class="facebook"></em></a>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>