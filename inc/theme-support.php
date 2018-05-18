<?php
/*

	@package Faben Haute Couture Template

*/

// Activate Nav Menu Option

function faben_register_nav_menu(){

	register_nav_menu( 'primary', 'Primary Nav Menu' );

}

add_action( 'after_setup_theme', 'faben_register_nav_menu' );


// widget activation

function faben_widget_init(){

	register_sidebar(array(
		'name'        => 'footer widget left',
		'id'          => 'footer-widget-left',
		'class'       => 'faben-widget',
		'description' => 'Standard left widget',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><hr>',
	));

	register_sidebar(array(
		'name'        => 'footer widget center',
		'id'          => 'footer-widget-center',
		'class'       => 'faben-widget',
		'description' => 'Standard left widget',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><hr>',
	));

	register_sidebar(array(
		'name'        => 'footer widget right',
		'id'          => 'footer-widget-right',
		'class'       => 'faben-widget',
		'description' => 'Standard left widget',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><hr>',
	));

}

add_action( 'init', 'faben_widget_init' );
