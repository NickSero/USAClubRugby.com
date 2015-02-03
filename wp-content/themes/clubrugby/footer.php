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
				<p>Website created &amp; designed by my good buddy <a href="http://about.me/daveyjacobson" rel="designer">Davey Jacobson</a></p>
			</div><!-- .site-info -->
		</footer><!-- #footer -->

		<?php wp_footer(); ?>
		<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/custom.js"></script>

	</div><!-- #main-wrapper -->

</body>
</html>
