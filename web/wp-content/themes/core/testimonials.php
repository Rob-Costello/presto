<?php
/**
 * Template Name: Testimonials
 */
get_header(); ?>

<section class="row">

	<div class="columns small-12">

        <div id="testimonials" class="row">

		  <div class="small-12 columns">
			 <h1 class="page-title"><?php the_title(); ?></h1>
		  </div>

		  <?php if( have_rows('testimonials') ): ?>
				
 				<?php while ( have_rows('testimonials') ) : the_row(); ?>

                    <div class="columns small-12 testimonial">

                        <div class="row">

        			         <div class="columns small-12 medium-3 name-box">
                                <?php the_sub_field('name'); ?><br />
                                <small><?php the_sub_field('location'); ?></small>
        			         </div>
        			         <div class="columns small-12 medium-9">
                                <i class="speechmark-open"></i>
        				        <?php the_sub_field('testimonial'); ?>
                                <i class="speechmark-close"></i>
        			         </div>

                        </div>

    			     </div>

    			<?php endwhile; ?>
    			
		  <?php endif; ?>
          </div>
	</div>

</section>

<?php get_footer(); ?>