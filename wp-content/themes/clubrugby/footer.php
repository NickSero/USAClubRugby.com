<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package USA Club Rugby
 */
?>

			</div><!-- #content -->

		</div><!-- #content-wrapper -->

		<?php if(is_page()|is_single()): ?>
		<div class="bottom edit column">
			<?php edit_post_link( __( 'Edit', 'usacr' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<?php endif; ?>

		<footer id="footer" class="site-footer row" role="contentinfo">
			<div class="column site-info">
				<p>Website created &amp; designed by <a href="http://usarugby.org" rel="designer">USA Rugby Football Union Ltd.</a></p>
			</div><!-- .site-info -->
		</footer><!-- #footer -->

		<?php wp_footer(); ?>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/foundation.min.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/placeholder.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.cookie.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.fittext.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/custom.js"></script>
		<script>
			$('#site-menu > li > a').fitText(1);
			$('.rsContent').each(function(i){
    			i = i+1;
    			$(this).addClass('rsContent-' + i);
  			});
		</script>

	</div><!-- #main-wrapper -->

</body>
</html>
