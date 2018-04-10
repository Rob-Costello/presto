<?php
/**
 * Template Name: Sections Page
 */

get_header(); ?>

<header class="row">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<h1><?php echo $post->post_title; ?></h1>

</header>

<?php

// check if the repeater field has rows of data
if( have_rows('sections') ):

	// loop through the rows of data
	while ( have_rows('sections') ) : the_row(); ?>
		<div class="section">
		<div class="row">
			<h3><?php the_sub_field('title'); ?></h3>
			<?php the_sub_field('content'); ?>
		</div>
		</div>
<?php
	endwhile;

endif;

get_footer();
