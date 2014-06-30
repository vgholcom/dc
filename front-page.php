<?php
/**
 * Front Page Template
 * @package Wordpress
 * @subpackage DC
 */
get_header(); ?>
<div id="content" class="container" data-spy="scroll" data-target="#navbar"><?php
	$panels = new WP_query( array( 
	   'post_type' => 'panel',
	   'post_status' => 'publish',
	   'orderby' => 'menu_order',
	   'order' => 'ASC'
	) );
	while( $panels->have_posts() ) : $panels->the_post(); ?>
		<section id="<?php the_title(); ?>" class="panel">
			<div class="row">
				<?php the_content(); ?>
			</div>
		</section><?php
	endwhile; ?>
</div><?php
get_footer();