<?php $the_query = new WP_Query( $args ); ?>
 
<?php if( $the_query->have_posts() ): ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<?php
$category = get_the_category(); 
?>

<article class="clearfix">

	    <a class="<?php echo $linkClass ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail');?></a>

		<div class="copy">
			<h3><?php echo $category[0]->cat_name; ?></h3>
			<h2><a class="<?php echo $linkClass ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php echo get_excerpt(225); ?></p>
		</div>

</article>

<?php endwhile; ?>
<?php endif; ?>
