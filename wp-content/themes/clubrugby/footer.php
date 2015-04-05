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

	<footer id="footer" class="site-footer row" role="contentinfo">
		
		<div id="site-menu-wrap" class="column small-12 medium-12 large-12">
		<?php wp_nav_menu(array(
			'theme_location' => 'site-map',
			'menu_id' => 'site-map',
			'menu_class' => 'no-bullet large-block-grid-5 medium-block-grid-4',
			'container' => false,
			'depth' => 2,
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			));	
		?>
		</div>

		<div class="column site-info">
			<p>Website created &amp; designed by <a href="http://usarugby.org" rel="designer">USA Rugby Football Union Ltd.</a></p>
		</div>

		<?php if(is_page()|is_single()): ?>
		<div class="bottom edit column">
			<?php edit_post_link( __( 'Edit', 'usacr' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<?php endif; ?>

	</footer>

	<?php wp_footer(); ?>

	<!-- REMOVE BEFORE PUSH TO LIVE -->
	<script src="https://togetherjs.com/togetherjs-min.js"></script>

	<a class="exit-off-canvas"></a>

</body>
</html>
