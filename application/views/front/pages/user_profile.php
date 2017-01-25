<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="dashboard">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="sidemenu">
			<ul>
				<li class="current"><a href="#tab1">My History Order</a></li>
				<li><a href="#tab2">My Shipping Address</a></li>
				<li><a href="#tab3">Cek Resi Pengiriman</a></li>
			</ul>
		</div>
		<div class="main-content">
			<div class="tab-content history current" id="tab1"> aye</div>
			<div class="tab-content shipping-address" id="tab2">aye2</div>
			<div class="tab-content check-shipping" id="tab3">aye3</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
			    $(".sidemenu a").click(function(event) {
			        event.preventDefault();
			        $(this).parent().addClass("current");
			        $(this).parent().siblings().removeClass("current");
			        var tab = $(this).attr("href");
			        $(".tab-content").not(tab).css("display", "none");
			        $(tab).fadeIn();
			    });
			});
		</script>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>