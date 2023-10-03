<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'main-js', get_theme_file_uri( '/dist/js/' . 'scripts.js' ), array(), null, true );

	wp_localize_script(
		'main-js',
		'objectajax',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'load_more_posts' ),
		)
	);

	wp_enqueue_style( 'main-style', get_theme_file_uri( '/dist/css/' . 'styles.css' ), array(), null );

} );
