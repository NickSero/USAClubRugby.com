<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package USA Club Rugby
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('small-12 medium-9 large-9'); ?>>
	
	<div class="entry-content column">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

<div id="divider"></div>

<aside id="sidebar-1" class="right column small-12 medium-3 large-3">

	<?php if(!dynamic_sidebar('Sidebar')): ?>
	<?php endif; ?>

</aside>
