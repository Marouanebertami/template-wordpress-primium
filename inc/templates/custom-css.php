<h1>Faben Custom Css</h1>
<?php settings_errors(); ?>
<form id="save-custom-css-form" method="post" action="options.php">
	<?php settings_fields( 'faben-custom-css-options' ); ?>
	<?php do_settings_sections( 'faben_haute_couture_css' ); ?>
	<?php submit_button(); ?>
</form>