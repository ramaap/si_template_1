	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner1.png" alt="Chania">
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner2.png" alt="Chania">
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner3.png" alt="Chania">
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner4.png" alt="Chania">
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner5.png" alt="Chania">
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>include/front/images/product/kn/main-banner6.png" alt="Chania">
				</div>\
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>