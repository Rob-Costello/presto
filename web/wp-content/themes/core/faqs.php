<?php
/**
 * Template Name: FAQs
 */
get_header(); ?>

<section class="row">

	<div class="column small-12">

		<div class="small-12 columns">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>

		<?php if( have_rows('faqs') ): ?>
			<ul class="accordion" data-accordion>
 				
 				<?php while ( have_rows('faqs') ) : the_row(); ?>

        			<li class="accordion-item" data-accordion-item>
        				<a href="#" class="accordion-title">
        					<?php the_sub_field('title'); ?>
        				</a>
        				<div class="accordion-content" data-tab-content>
        					<?php the_sub_field('description'); ?>
        				</div>
        			</li>
    				
    			<?php endwhile; ?>
    			
    		</ul>
		<?php endif; ?>

	</div>

</section>

<?php get_footer(); ?>