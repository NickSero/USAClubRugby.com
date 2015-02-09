<?php
/**
 * @package D1A Rugby
 */
get_header();
$page_header = 'News';
include(locate_template('inc/blank-header.php')); ?>

<div class="main-content columns small-12 medium-12 large-12">

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('views/content', 'post'); ?>

	<?php endwhile; ?>

</div>


<?php edit_post_link( __( 'Edit', 'diarugby' ), '<span class="edit-link">', '</span>' ); ?>

<?php get_footer(); ?>