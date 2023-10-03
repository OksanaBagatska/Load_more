<?php

$args     = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 2,
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$wp_query = new WP_Query( $args );
$posts    = $wp_query->posts;

$post_count = wp_count_posts();
$total_posts = $post_count->publish;


if ( empty( $posts ) ) {
	return;
}
?>

<section class="related-posts">
    <div class="container">
        <div class="related-posts__wrap">
            <div class="related-posts__list related-posts__list-js">
				<?php
				while ( $wp_query->have_posts() ): $wp_query->the_post();
					get_template_part( 'template-parts/posts/post' );
				endwhile;
				?>
            </div>
			<?php wp_reset_postdata(); ?>
			<?php
			if ( $wp_query->max_num_pages > 1 ): ?>
                <button class="btn related-posts__show-more related-posts__show-more-js"
                        data-page="1" data-total="<?php echo $total_posts; ?>">
					<?php _e( 'Завантажити ще', 'theme' ) ?></button>
			<?php endif; ?>
            <div class="preloader preloader--hidden">
                <div class="preloader__icon"></div>
            </div>
        </div>
    </div>
</section>
