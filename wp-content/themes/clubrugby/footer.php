<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package USA Club Rugby
 */
?>

			</main>

		</div>

		<?php if(is_page()|is_single()): ?>
		<div class="bottom edit column">
			<?php edit_post_link( __( 'Edit', 'usacr' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<?php endif; ?>

		<footer id="footer" class="site-footer row" role="contentinfo">
			<div class="column site-info">
				<p>Website created &amp; designed by <a href="http://usarugby.org" rel="designer">USA Rugby Football Union Ltd.</a></p>
			</div>
		</footer>

		<?php wp_footer(); ?>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/foundation.min.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/placeholder.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.cookie.js"></script>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.fittext.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>
		<!-- script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/masonry.min.js"></script -->
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/custom.js"></script>

	</div>
	<script> jQuery(document).foundation(); </script>
</body>
</html>
