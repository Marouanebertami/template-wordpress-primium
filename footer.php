<?php
	/*
		this is the template for the footer

		@package fabentheme
	*/
?>

<?php $logo = esc_html(get_option( 'header_img' ) ); ?>

<div class="container-fluid">

	<div class="row footer" style="background-color: #46340d;padding-bottom: 25px;">

		<div class="col-md-4">
			<?php dynamic_sidebar( 'footer-widget-left' ); ?>
		</div>
		<div class="col-md-4">
			<?php dynamic_sidebar( 'footer-widget-center' ); ?>
		</div>
		<div class="col-md-4">
			<?php dynamic_sidebar( 'footer-widget-right' ); ?>
		</div>
		
	</div>
	<div class="row text-center footer-copy">Designed by: Marouane BERTAMI, Faben-hc.com, Copyright © 2018 All rights reserved. </div>
	
</div>


<?php wp_footer(); ?>
</body>
</html>