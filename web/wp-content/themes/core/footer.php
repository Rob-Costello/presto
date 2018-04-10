</div>
</div>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package The Box
 * @subpackage Reward Tagz
 * @since Reward Tagz 1.0
 */
?>
<footer class="footer">
	<div class="row">
		<div class="small-12 medium-4 columns">
			<a href="https://www.facebook.com/Reward-Tagz-211248139383602/?hc_ref=PAGES_TIMELINE"><img src="/wp-content/themes/core/images/facebook-icon-circle.svg"></a>
			<?php dynamic_sidebar( 'footer_1' ); ?>
		</div>
		<div class="small-12 medium-4 columns">
			<a href="https://twitter.com/rewardtagz"><img src="/wp-content/themes/core/images/twitter-icon-circle.svg"></a>
			<?php dynamic_sidebar( 'footer_2' ); ?>
		</div>
		<div class="small-12 medium-4 columns">
			<a href="https://www.youtube.com/channel/UCcSe9kNNiUAgacl_j9C9UMw?view_as=subscriber"><img src="/wp-content/themes/core/images/youtube-icon-circle.svg"></a>
			<?php dynamic_sidebar( 'footer_3' ); ?>
		</div>
	</div>
	<div class="background-purple">
		<div class="row">
			<div class="small-12 columns">
				<p>&copy; Reward Tagz Ltd. Copyright <?php echo date("Y"); ?>. Site by <a href="http://www.hyperext.com">Hyperext</a></p>
			</div>
		</div>
	</div>
</footer>
<script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>
</body>
</html>
