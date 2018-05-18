<?php 

/*
	==================
		Admin page
	==================
*/

function faben_hc_admin_page(){

	//Generate Faben Haute couture Admin page
	add_menu_page( 'Faben Haute Couture Theme Options', 'Faben Haute Couture', 'manage_options', 'faben_haute_couture', 'faben_hc_create_page', 'dashicons-heart', 110 );

	//Generate faben Haute Couture Sub-pages
	add_submenu_page( 'faben_haute_couture', 'Faben Haute Couture Theme Options', 'Header Settings', 'manage_options', 'faben_haute_couture', 'faben_hc_create_page' );

	add_submenu_page( 'faben_haute_couture', 'Faben Haute Couture Produit Options', 'Produit Options', 'manage_options', 'faben_haute_couture_produit_options', 'faben_haute_produit_options' );

	add_submenu_page( 'faben_haute_couture', 'Faben Haute Couture about Options', 'About Options', 'manage_options', 'faben_haute_couture_about_options', 'faben_haute_about_options' );

	add_submenu_page( 'faben_haute_couture', 'Faben Haute Couture Css Options', 'Custom Css', 'manage_options', 'faben_haute_couture_css', 'faben_theme_settings_page' );

	

	//Activate Custom settings
	add_action( 'admin_init', 'faben_custom_setings' );

}

add_action( 'admin_menu', 'faben_hc_admin_page' );

function faben_custom_setings(){
	register_setting( 'faben-settings-group', 'faben_video' );
	register_setting( 'faben-settings-group', 'header_img' );
	register_setting( 'faben-settings-group', 'header_titre' );
	register_setting( 'faben-settings-group', 'header_logo' );
	register_setting( 'faben-settings-group', 'header_favicon' );

	add_settings_section( 'faben-header-options', 'Header Options', 'faben_header_options', 'faben_haute_couture' );
	add_settings_field( 'header-video', 'Video Url', 'faben_header_video',  'faben_haute_couture', 'faben-header-options' );
	add_settings_field( 'header_img', 'Header Image', 'faben_header_img',  'faben_haute_couture', 'faben-header-options' );
	add_settings_field( 'header_titre', 'Home Page Titre', 'faben_header_text', 'faben_haute_couture', 'faben-header-options' );
	add_settings_field( 'header_logo', 'Home Page Logo', 'faben_header_logo', 'faben_haute_couture', 'faben-header-options' );
	add_settings_field( 'header_favicon', 'Favicon', 'faben_header_favicon', 'faben_haute_couture', 'faben-header-options' );

	add_settings_section('faben-about-options', 'About Us', 'faben_about_options', 'faben_haute_couture_about');

// produit options

	register_setting( 'faben-produit-group', 'produit_img' );
	register_setting( 'faben-produit-group', 'produit_devise' );
	register_setting( 'faben-produit-group', 'produit_prix' );
	register_setting( 'faben-produit-group', 'produit_page' );
	register_setting( 'faben-produit-group', 'produit_detail_show' );

	add_settings_section( 'faben-produit-options', 'Produit Options', 'faben_produit_options', 'faben_haute_couture_produit' );

	add_settings_field( 'produit_img', 'Default Produit Image', 'faben_produit_img', 'faben_haute_couture_produit', 'faben-produit-options' );
	add_settings_field( 'produit_devise', 'Produit Devise', 'faben_produit_devise', 'faben_haute_couture_produit', 'faben-produit-options' );
	add_settings_field( 'produit_prix', 'Montrer le Prix', 'faben_produit_prix', 'faben_haute_couture_produit', 'faben-produit-options' );
	add_settings_field( 'produit_page', 'Produit Par Page', 'faben_produit_page', 'faben_haute_couture_produit', 'faben-produit-options' );
	add_settings_field( 'produit-detail-show', 'Produit detail show', 'faben_produit_detail',  'faben_haute_couture_produit', 'faben-produit-options' );

//custom css
	register_setting( 'faben-custom-css-options', 'faben_css', 'faben_santize_css' );

	add_settings_section( 'faben-custom-css-section', 'Custom CSS', 'faben_custom_css_section_callback', 'faben_haute_couture_css' );

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'faben_custom_css_callback', 'faben_haute_couture_css', 'faben-custom-css-section' );


}


function faben_custom_css_section_callback(){
	echo 'Customize your CSS';
}

function faben_custom_css_callback(){

	$css = get_option( 'faben_css' );
	$css = ( empty($css) ? '/* Custom Css */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="faben_css" name="faben_css" style="display: none;visible:hidden;">'.$css.'</textarea>';

}

/*function faben_detail_show_callback( $input ){
	var_dump($input);
}*/

function faben_produit_img(){
	$produit_img = esc_attr( get_option('produit_img') );
	if(empty($produit_img)){
		echo '<div id="produit-img" class="produit-img" style="background-image: url('.$produit_img.')"></div><input type="button" class="button button-secondary" value="Upload produit image" id="upload-img-button"><input type="hidden" name="produit_img" value="'.$produit_img.'" id="img-product" />';
	}else{
	echo '<div id="produit-img" class="produit-img" style="background-image: url('.$produit_img.')"></div><input type="button" class="button button-secondary" value="Upload produit image" id="upload-img-button"><input type="hidden" name="produit_img" value="'.$produit_img.'" id="img-product" /> <input type="button" class="button button-secondary" value="Remove" id="remove-product-img"';
	}
}

function faben_produit_detail(){
	$detail_att = get_option('produit_detail_show' );
	$details = array( 'Title', 'Description', 'Prix' );
	$output = '';
	foreach ($details as $detail) {
		$checked = ( @$detail_att[$detail] == 1 ? 'checked' : '' );
		$output .= '<input type="checkbox" id="'.$detail.'" name="produit_detail_show['.$detail.']" value="1" '.$checked.'/>'.$detail.'</br>';
	}
	echo $output;
}

function faben_header_options(){
	echo 'Customize your Header Options';
}

function faben_produit_options(){
	echo 'Produit devise';
}

function faben_about_options(){
	echo 'about options';
}


function faben_produit_devise(){
	$produit_devise = esc_attr( get_option('produit_devise') );
	echo '<input type="text" name="produit_devise" value="'.$produit_devise.'" placeholder="Devise" />';
}

function faben_produit_page(){
	$produit_page = esc_attr( get_option('produit_page') );
	echo '<input type="text" name="produit_page" value="'.$produit_page.'" placeholder="Produit par page" /><p>Default Value : 10</p>';
}

function faben_produit_prix(){
	$produit_prix = esc_attr( get_option('produit_prix') );
	echo '<input type="text" name="produit_prix" value="'.$produit_prix.'" placeholder="Prix" />';
}

function faben_header_video(){
	$faben_video = esc_attr( get_option('faben_video') );
	echo '<input type="text" name="faben_video" value="'.$faben_video.'" placeholder="video" /><p>Please use proper video URL with extension like .mp4. Avoid using any video page URL like youtube or vimeo</p>';
}

function faben_header_text(){
	$header_titre = esc_attr( get_option('header_titre') );
	echo '<input type="text" name="header_titre" value="'.$header_titre.'" placeholder="Header Titre" />';
}

function faben_header_logo(){
	$header_logo = esc_attr( get_option('header_logo') );
	echo '<div id="header-logo" class="header-logo" style="background-image: url('.$header_logo.')"></div><input type="button" class="button button-secondary" value="Upload Header Logo" id="upload-header-button"><input type="hidden" name="header_logo" value="'.$header_logo.'" id="header-picture" />';
}

function faben_header_img(){
	$header_img = esc_attr( get_option('header_img') );
	echo '<div id="header_img" class="header_img header-logo" style="background-image: url('.$header_img.')"></div><input type="button" class="button button-secondary" value="Upload Header img" id="upload-header-img-button"><input type="hidden" name="header_img" value="'.$header_img.'" id="header-img-picture" />';
}

function faben_header_favicon(){
	$header_favicon = esc_attr( get_option('header_favicon') );
	echo '<input type="text" name="header_favicon" value="'.$header_favicon.'" placeholder="Header favicon" />';
}

function faben_santize_css($input){
	$output = esc_textarea($input);
	return $output;
}

function faben_hc_create_page(){
	//generation of admin page
	require_once(get_template_directory().'/inc/templates/faben-admin.php');
}

function faben_haute_produit_options(){
	require_once(get_template_directory().'/inc/templates/faben-produit.php');
}

function faben_haute_about_options(){
	require_once(get_template_directory().'/inc/templates/faben-about.php');
}

function faben_theme_settings_page(){

	require_once(get_template_directory().'/inc/templates/custom-css.php');

}