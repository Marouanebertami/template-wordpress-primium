
<nav class="navbar navbar-default navbar-faben navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php
			$header_logo = esc_html(get_option('header_logo'));
			$header_logo = (empty($header_logo) ? ' ': $header_logo);
		?>
		<a class="navbar-brand" href="#"><img src="<?php echo $header_logo; ?>" style="width: 250px;"></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php 
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'nav navbar-nav navbar-right'
			) );
		?>
	</div>
</nav>