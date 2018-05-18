<?php 

/*

	@package Faben Haute Couture Template

	===============================
		Admin Enqueue Fonctions
	===============================
*/

function faben_load_admin_scripts( $hook ){

	//echo $hook;
	if( 'toplevel_page_faben_haute_couture' == $hook ){
		

		wp_register_style( 'faben_admin', get_template_directory_uri() . '/css/faben.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'faben_admin' );
		wp_enqueue_media();

		wp_register_script( 'faben-admin-script', get_template_directory_uri() . '/js/faben.admin.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'faben-admin-script' );

	}else if( 'faben-haute-couture_page_faben_haute_couture_css' == $hook ){

		wp_enqueue_style( 'ace', get_template_directory_uri().'/css/faben.ace.css', array(), '1.0.0', 'all' );

		wp_enqueue_script( 'ace', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js', array('jquery'), '1.2.1',true );
		wp_enqueue_script('faben-custon-css-script', get_template_directory_uri() . '/js/faben.custom-css.js', array('jquery'), '1.0.0', true );

	}else{
		return;
	}
}

add_action( 'admin_enqueue_scripts', 'faben_load_admin_scripts' );

function faben_load_produit_scripts( $hook ){
	//echo $hook;

	if( 'faben-haute-couture_page_faben_haute_couture_produit_options' != $hook ){
		return;
	}

	wp_register_style( 'faben_admin', get_template_directory_uri() . '/css/faben.produit.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'faben_admin' );

	wp_enqueue_media();

	wp_register_script( 'faben-admin-script', get_template_directory_uri() . '/js/faben.produit.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'faben-admin-script' );

}

add_action( 'admin_enqueue_scripts', 'faben_load_produit_scripts' );


/*

	===============================
		front-end Enqueue Fonctions
	===============================
*/

function faben_load_scripts(){

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );

	wp_enqueue_style( 'faben_frontend', get_template_directory_uri() . '/css/faben.css', array(), '1.0.0', 'all' );

	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'faben_load_scripts' );
