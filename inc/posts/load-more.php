<?php
function load_more_posts() {
	check_ajax_referer( 'load_more_posts', 'security' );

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'paged'          => $_POST['page'],
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			get_template_part( 'template-parts/posts/post' );
		endwhile;
	endif;

	die();
}

add_action( 'wp_ajax_loadmore', 'load_more_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'load_more_posts' );
