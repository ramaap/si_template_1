	<div class="newsletter">
			<div class="news-left">
				<span>Dapatkan penawaran menarik dengan langganan Newsletter kami</span>
				<br>
				<?php echo form_open('front/contact/add_newsletter', 'id="form_add"'); ?>
					<input type="text" name="email" id="email" placeholder="Masukkan alamat email kamu disini">
					<input type="submit" id="button" name="kirim" value="Kirim"  class="btn btn-success" />
				<?php echo form_close(); ?>  
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