<?php
/* Template Name: Classic Homepage */ 

get_header();

// Data of this page
$id = $wp_query->queried_object->ID;
$content = $wp_query->queried_object->post_content;

// Welcome Text
$welcome_text = get_post_meta( $id, 'page_portfolio_welcome_text', true );
if ( $welcome_text ) { ?>
	<div class="welcome-text"><?php echo stripslashes( $welcome_text ); ?></div>
<?php }

// Slideshow
get_template_part('slideshow');

// Optional static page content
if ( have_posts() ) {
	while ( have_posts() ) { the_post(); ?>
		<div class="site-content clearfix"><?php the_content(); ?></div>
<?php }
}

$portfolio_recent = get_post_meta( $post->ID, 'classic_recent_portfolio', true ); // Values: empty string|enable|disable
if ( $portfolio_recent != 'disable' ) {
	echo '<div class="rbp-single">';
	echo do_shortcode( '[recent_projects]' );
	echo '</div>';
}

$blog_recent = get_post_meta($post->ID, 'classic_recent_posts', true); // Values: empty string/enable/disable
if ( $blog_recent != 'disable' ) {
	echo '<div class="rbp-single">';
	echo do_shortcode( '[recent_posts]' );
	echo '</div>';
}

get_footer();
