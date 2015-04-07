<?php
/**
 * @package USA Club Rugby
 */
?>

<?php get_header();  ?>

<?php $post = get_post($_POST['id']); ?>

    <div id="single-post post-<?php the_ID(); ?>">
 
    <?php while (have_posts()) : the_post(); ?>
 
        <?php get_template_part('/views/single', get_post_type()); ?>
 
    <?php endwhile;?> 
 
    </div>

<?php get_footer(); ?>