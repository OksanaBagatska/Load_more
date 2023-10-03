<?php

get_header(); ?>

    <h1 class="page-title"><?php the_title(); ?></h1>

<?php
if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();
		the_content();
	}

}

get_footer();
