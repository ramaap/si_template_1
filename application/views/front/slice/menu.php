	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>
	<header>
		<div class="page-header-container">
			<div class="logo">
				<a href="<?php echo site_url('front/home') ?>"><img src="<?php echo base_url(); ?>include/front/images/header/logo.png"></a>
			</div>
			<div class="menu-nav">
				<ul>
					<li><a href="<?php echo site_url('front/we_are') ?>">Who we are</a></li>
					<li><a href="<?php echo site_url('front/what_we') ?>">What we make</a></li>
					<li><a href="<?php echo site_url('front/contact') ?>">Contact</a></li>
					<li><a href="<?php echo site_url('front/question') ?>">Question?</a></li>
					<li><a href="<?php echo site_url('front/custom_order') ?>">Custom</a></li>
				</ul>
			</div>
			<div class="menu-action">
				<?php
				if($this->session->userdata('user_customer_id') != "")
				{
					$counter = $this->db->query("select count(u.nama) as jml_cart from data_cart u
								  where u.is_delete=0 
								  and u.user_id = ".$this->session->userdata('user_customer_id')."
								  ")->row();
				?>
					<div class="login">
						<em class="user-logo"></em>
					</div>
					<div class="user-menu" style="display:none;">
						<ul>
							<li>
								<!-- Welcome, <?php echo $this->session->userdata('user_name')?><br/> -->
								<a href="<?php echo site_url('front/login_customer/logout')?>">Log out</a>
							</li>
							<li>
								<a href="<?php echo site_url('front/user_profile')?>">Member Area</a>
							</li>
						</ul>
					</div>
					<div class="separator"></div>
					<div class="cart">
						<a href="<?php echo site_url('front/checkout/checkout_pembayaran')?>">
							<img src="<?php echo base_url(); ?>include/front/images/header/cart.png">
							<div class="counter"><?php echo $counter->jml_cart ?></div>
						</a>
					</div>
				<?php
				}else{
				?>
					<div class="login"><a href="<?php echo site_url('front/login_customer')?>">Login</a></div>
				<?php }?>
			</div>


			<div class="menu-mobile-container">
				<div class="tab-menu"></div>
				<ul id="menu-mobile">
					<li><a href="<?php echo site_url('front/we_are') ?>">Who we are</a></li>
					<li><a href="<?php echo site_url('front/what_we') ?>">What we make</a></li>
					<li><a href="<?php echo site_url('front/contact') ?>">Contact</a></li>
					<li><a href="<?php echo site_url('front/question') ?>">Question?</a></li>
				</ul>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				    $(".tab-menu").click(function(event) {
				        event.preventDefault();
				        $("#menu-mobile").slideToggle();
				    });
				    $(".user-logo").click(function(event) {
				        event.preventDefault();
				        $(".user-menu").slideToggle();
				    });
				});
			</script>
			<div class="clear"></div>
		</div>
	</header>