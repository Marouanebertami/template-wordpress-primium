<?php

/*
	Template Name: Page Home
*/

	get_header();
?>
		<div class="container-fluid">
			<?php $logo = esc_html(get_option( 'header_img' ) ); ?>
			<?php 
				$faben_video = esc_html(get_option( 'faben_video' ));
				$faben_video2 = (empty($faben_video) ? ' ': $faben_video);
			?>
			<div class="row">
				<div class="col-xs-12" <?php 
				if($faben_video2 != ' ' || $logo != ''){
					echo 'style="padding:0 !important;position:fixed;"';
				}
				 ?>>
					
					<?php
						
						//echo $faben_video2;
						if($faben_video2 != ' '){
									?>
							<div class="header-container" style="">
								<video loop autoplay muted style="width: 100%;" class="video" >
						           <source src="<?php echo $faben_video2 ?>" type="video/mp4">
						        </video>
									
								<div class="header-content table">
									<div class="table-cell">
										<?php 
										$header_logo = esc_html(get_option('header_logo'));
										$header_logo = (empty($header_logo) ? ' ': $header_logo);
										if ($header_logo != ' ') {
											echo '<a href="'.get_bloginfo('url').'"><img src="'.$header_logo.'"/></a>';
										}else{
											echo '<h1>'.esc_html(get_option('header_titre')).'</h1>';
										}
									?>
									</div>
									
								</div><!-- .header-content -->

								<div class="nav-container">
									
									<nav class="navbar navbar-default navbar-faben navbar-fixed-top">
										<div class="navbar-header">
									      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									        <span class="sr-only">Toggle navigation</span>
									        <span class="icon-bar"></span>
									        <span class="icon-bar"></span>
									        <span class="icon-bar"></span>
									      </button>
									    </div>

									    <!-- Collect the nav links, forms, and other content for toggling -->
									    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<?php 
											wp_nav_menu( array(
												'theme_location' => 'primary',
												'container' => false,
												'menu_class' => 'nav navbar-nav'
											) );
										?>
									</div>
									</nav>

								</div><!-- .nav-container -->
								
							</div><!-- .header-container -->
						<?php
							}else{
								?>
									<div class="header-container text-center" style="background-image: url(<?php echo $logo; ?>); ">
							
										<div class="header-content table">
											<div class="table-cell">
												<?php 
												$header_logo = esc_html(get_option('header_logo'));
												$header_logo = (empty($header_logo) ? ' ': $header_logo);
												if ($header_logo != ' ') {
													echo '<a href="#"><img src="'.$header_logo.'"/></a>';
												}else{
													echo '<h1>'.esc_html(get_option('header_titre')).'</h1>';
												}
											?>
											</div>
										</div><!-- .header-content -->

										<div class="nav-container">
											<nav class="navbar navbar-default navbar-faben navbar-fixed-top">
												<div class="navbar-header">
											      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
											        <span class="sr-only">Toggle navigation</span>
											        <span class="icon-bar"></span>
											        <span class="icon-bar"></span>
											        <span class="icon-bar"></span>
											      </button>
											    </div>

											    <!-- Collect the nav links, forms, and other content for toggling -->
											    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
												<?php 
													wp_nav_menu( array(
														'theme_location' => 'primary',
														'container' => false,
														'menu_class' => 'nav navbar-nav'
													) );
												?>
											</div>
											</nav>
										</div><!-- .nav-container -->
										
									</div><!-- .header-container -->
								<?php
							}
						?>
					

				</div><!-- .col-xs-12 -->
			</div><!-- .row -->

		</div><!-- container-fluid -->