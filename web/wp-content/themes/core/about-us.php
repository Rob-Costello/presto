<?php
/**
 * Template Name: About Us
 */

get_header(); ?>

<header class="row">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<h1><?php echo $post->post_title; ?></h1>

</header>

<div class="row">
	<div class="columns small-12 medium-9 large-9"><?php the_field('intro_text'); ?></div>
	<div class="columns medium-3 large-3"><img src="/wp-content/themes/core/images/30-years.svg" class="rep-icon right"> </div>
</div>
<div class="orange">
	<div class="row">
		<h3>Your Buying Experience</h3>
		<div class="columns medium-3 large-3"><img src="/wp-content/themes/core/images/trolley.svg" class="rep-icon left"></div>
		<div class="columns small-12 medium-9 large-9"><?php the_field('buying_experience'); ?></div>
	</div>
</div>
<div class="row">
	<h3>Receive Impartial Advice</h3>
	<div class="columns small-12 medium-9 large-9"><?php the_field('impartial_advice'); ?></div>
	<div class="columns medium-3 large-3"><img src="/wp-content/themes/core/images/speech-bubbles.svg" class="rep-icon right"></div>
</div>
<div class="orange">
	<div class="row">
		<h3>Get The Best Deals</h3>
		<div class="columns medium-3 large-3"><img src="/wp-content/themes/core/images/thumbs-up.svg" class="rep-icon left"></div>
		<div class="columns small-12 medium-9 large-9"><?php the_field('best_deals'); ?></div>
	</div>
</div>
<div class="row">
	<h3>Aftercare For You</h3>
	<div class="columns small-12 medium-9 large-9"><?php the_field('aftercare'); ?></div>
	<div class="columns medium-3 large-3"><img src="/wp-content/themes/core/images/heart.svg" class="rep-icon right"></div>
</div>

<?php get_footer(); ?>
