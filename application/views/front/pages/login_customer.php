<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="login">
<?php $this->load->view('front/slice/menu'); 

if ($this->session->userdata('alert') != '')
        echo "<script>alert('" . $this->session->userdata('alert') . "')</script>";

    $this->session->set_userdata('alert', '');
?>

	<div class="main container">
		<div class="cart-checkout">
			<div>

				<div class="login">
					<div class="left column">
						<div class="login-container">
							<h2>Login</h2>
							<p>Masuk untuk mempercepat proses pemeriksaan</p>
							<?php
							$attributes = array('class' => 'form-signin');
							echo form_open('front/login_customer', $attributes);
							?>
							<div class="username">
								<input type="text" name="username" class="form-control" placeholder="E-mail" required="" autofocus="">
							</div>
							<div class="password">
								 <input type="password" name="password" class="form-control" placeholder="Password" required="">
							</div>
							<div class="button-login" >
								<button type="submit">
									<span>
										<span>
											Login
										</span>
									</span>
								</button>
							</div>
							<div class="button-signup">
								 <a onclick="sign_up()" class="btn btn-lg btn-danger">
								 <span>
										<span>
											Sign Up
										</span>
									</span>
								 </a>
							</div>
							<div class="clear"></div>
						</div>
						<!--div class="facebook">
							<p>atau</p>
							<div class="button-facebook">
								<button>
									<span>
										<span>
											Masuk Melalui Facebook
										</span>
									</span>
								</button>
							</div>
							
						</div-->
					</div>
					<div class="separator"></div>
					<div class="right column">
						<div class="button-quick">
							<div>
								<button>
									<span>
										<span>
											Quick Custom Order	
										</span>
									</span>
								</button>
							</div>
							<p>Click untuk Order sesuai keinginan</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function sign_up()
		{
			window.location.replace("<?php echo site_url('front/sign_up'); ?>");
		}
    </script>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>