<?php
/**
 * @package D1A Rugby
 */
?>

<?php get_header();  ?>

<?php $post = get_post($_POST['id']); ?>

    <div id="single-post post-<?php the_ID(); ?>">
 
    <?php while (have_posts()) : the_post(); ?>
 
        <?php get_template_part('/views/single', get_post_type()); ?>
 
    <?php endwhile;?> 
 
    </div>

<?php edit_post_link( __( 'Edit', 'diarugby' ), '<span class="edit-link">', '</span>' ); ?>

<?php get_footer(); ?>