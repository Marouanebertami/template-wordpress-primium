<h1>Faben Haute Couture Product Settings</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php settings_fields( 'faben-produit-group' ); ?>
	<?php do_settings_sections( 'faben_haute_couture_produit' ); ?>
	<?php submit_button(); ?>
</form>