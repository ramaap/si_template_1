<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_home'); ?>
<body class="checkout-2">
<?php $this->load->view('front/slice/menu'); ?>

	<div class="main container">
		<div class="custom-order">
			<form>
				<div>
					<ul>
						<li>
							<label>Name</label><input type="text"/>
						</li>
						<li>
							<label>Email</label><input type="text"/>
						</li>
						<li>
							<label>Design</label><input type="text"/>
						</li>
						<button>Send</button>
					</ul>
				</div>	
			</form>
		</div>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>