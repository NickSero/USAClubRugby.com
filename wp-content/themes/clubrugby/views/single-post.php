<?php
/**
 * @package USA Club Rugby
 */
get_header(); ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('views/content/content', 'post'); ?>

	<?php endwhile; ?>

<?php get_footer(); ?>