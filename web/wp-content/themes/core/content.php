<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php if ( is_single() ) : ?>
		<?php the_title( '<h1 class="entry-title columns small-12">', '</h1>' ); ?>
		<div class="columns small-12 medium-9">
			<?php the_post_thumbnail('full'); ?>
			<?php the_content(); ?>
		</div>
		<div class="columns small-12 medium-3 blog-sidebar">
			<?php dynamic_sidebar( 'blog' ); ?>
		</div>
	<?php else : ?>
		<?php if( $i % 2 == 0 ) : ?>
			<div class="columns small-12 medium-6 show-for-small-only">
				<?php the_post_thumbnail(); ?>
			</div>
			
			<div class="columns small-12 medium-6 entry-content">
		
				<header class="entry-header">
					<?php
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					?>
				</header><!-- .entry-header -->

			<?php
			/* translators: %s: Name of current post */
			// the_content( sprintf(
			// 	__( 'Continue reading %s', 'twentyfifteen' ),
			// 	the_title( '<span class="screen-reader-text">', '</span>', false )
			// ) );

			the_excerpt();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>

				<a href="<?php echo get_permalink(); ?>" class="button">Read More</a>

			</div><!-- .entry-content -->

			<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
			?>

		<div class="columns small-12 medium-6 show-for-medium">
			<?php the_post_thumbnail(); ?>
		</div>

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	
	<?php else: ?>

		<div class="columns small-12 medium-6">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="columns small-12 medium-6 entry-content">
		
			<header class="entry-header">
				<?php
				
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				
				?>
			</header><!-- .entry-header -->

		<?php
			/* translators: %s: Name of current post */
			the_excerpt();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

		<a href="<?php echo get_permalink(); ?>" class="button">Read More</a>

	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

		<?php endif; ?>

		

	<?php $i++; endif; ?>

</article><!-- #post-## -->
