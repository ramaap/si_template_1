<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-2">
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
		
		<div class="detail-product">
			<?php echo form_open_multipart('front/checkout/checkout_upload/add', 'id="form_checkouts"'); ?>	
			<div id="slider">
				<a class="controlitem control_next">
					<img src="/include/front/images/page/right.png" id="nextimage">
				</a>
				<a class="controlitem control_prev">
					<img src="/include/front/images/page/left.png" id="previmage">
				</a>

				<ul>
					<li>
						<div class="back-design item">
					        <input type="file"  id="imgInpback" name="back" required />
					        <img src="/include/front/images/checkout/upload-image2.PNG" id="imageback">
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<div class="front-design item active">
							<input type="file"  id="imgInpfront"  name="front" required />
							<img src="/include/front/images/checkout/upload-image.PNG" id="imagefront">
							<div class="clear"></div>
						</div>
					</li>
				</ul>
			</div>
			<script type="text/javascript">
				
				jQuery(document).ready(function ($) {

					var slideCount = $('#slider ul li').length;
					var slideWidth = '100%';
					var slideHeight = $('#slider ul li').height();
					var sliderUlWidth = slideCount * slideWidth;
					
					$('#slider').css({ width: slideWidth, height: 511 });
					
					
				    $('#slider ul li:last-child').prependTo('#slider ul');

				    function moveLeft() {
				        $('#slider ul').animate({
				            left: + slideWidth
				        }, 500, function () {
				            $('#slider ul li:last-child').prependTo('#slider ul');
				            $('#slider ul').css('left', '');
				        });
				    };

				    function moveRight() {
				        $('#slider ul').animate({
				            left: - slideWidth
				        }, 500, function () {
				            $('#slider ul li:first-child').appendTo('#slider ul');
				            $('#slider ul').css('left', '');
				        });
				    };

				    $('a.control_prev').click(function () {
				        moveLeft();
				    });

				    $('a.control_next').click(function () {
				        moveRight();
				    });

				});    

			</script>

			<!-- <div class="upload">
				<div class="front-design item active">
					<input type="file"  id="imgInpfront"  name="front" required />
					<img src="/include/front/images/checkout/upload-image.PNG" id="imagefront">
					<div class="clear"></div>
				</div>
				<div class="back-design item">
			        <input type="file"  id="imgInpback" name="back" required />
			        <img src="/include/front/images/checkout/upload-image.PNG" id="imageback">
					<div class="clear"></div>
				</div>
			</div> -->

			<div class="preview">
				<div class="images sides">
					<div class="front">
						<img id="front" src="#" alt="your image" />
						<br/>
						<span>Front</span>
					</div>
					<div class="back">
						<img id="back" src="#" alt="your image" />
						<br/>
						<span>Back</span>
					</div>
				</div>
				<div class="text sides">
					<ul>
						<p>Pastikan Filemu sesuai dengan kriteria kami:</p>
						<li>
							* Garis Putus-putus didalam kotak adalah area potong, jadi pastikan desainmu sudah diberi area lebihan agar tidak terpotong 
						</li>
						<li>
							* Pastikan kalau filemu adalah CMYK
						</li>
						<li>
							* Minimal resolusi 300 dpi
						</li>
						<li>
							* File harus dalam bentuk JPEG atau PNG
						</li>
						<li>
							* Besar File maksimal 3 MB
						</li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				function readURLfront(input) {
				    if (input.files && input.files[0]) {
				        var reader = new FileReader();
				        
				        reader.onload = function (e) {
				            $('#front').attr('src', e.target.result);
				        }
				        
				        reader.readAsDataURL(input.files[0]);
				    }
				}
				function readURLback(input) {
				    if (input.files && input.files[0]) {
				        var reader = new FileReader();
				        
				        reader.onload = function (e) {
				            $('#back').attr('src', e.target.result);
				        }
				        
				        reader.readAsDataURL(input.files[0]);
				    }
				}

				$("#imgInpfront").change(function(){
				    readURLfront(this);
				});
				$("#imgInpback").change(function(){
				    readURLback(this);
				});
			</script>


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

	<script type="text/javascript">
		$( "#imagefront" ).click(function() {
		  $( "#imgInpfront" ).click();
		});
		$( "#imageback" ).click(function() {
		  $( "#imgInpback" ).click();
		});
	</script>
        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>