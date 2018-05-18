<?php 

/*
	Template Name: Qui Somme Nous?
*/
get_header(); ?>
<?php $logo = esc_html(get_option( 'header_img' ) ); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12" style="padding: 0 !important;">
			<div class="header-container" style="position: static;background-image: url(<?php echo $logo; ?>); height: 300px;">			
				<div class="header-content table">
					<div class="table-cell text-center" style="    background: #6d6c6c94;">
						<h1>
						<?php 
							echo wp_title('');
						?>
						</h1>
					</div>
										
				</div>
				<div class="nav-container">
	<?php
	require get_template_directory().'/inc/nav.php';
	?>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="col-xs-12 quis" style="margin: 50px 0;">
			<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
		
			<!--<h3><?php the_title(); ?></h3>-->
			
			<p><?php the_content(); ?></p>
			
		
		<?php endwhile;
		
	endif;
			
	?>

		</div>
	</div>
	</div>
</div>




<?php get_footer(); ?>