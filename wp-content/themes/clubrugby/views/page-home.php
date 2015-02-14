<?php 
/*
Template Name: Home
*/
get_header(); ?>

<section id="hero" class="small-12 medium-9 large-7">

	<?php if(!dynamic_sidebar('hero')): ?>
	<?php endif; ?>

</section>

<hr/>

<section id="featured-matches" class="small-12 medium-12 large-12">
	
	<?php $matches = array(
			'post_type' 		=> 'match',
			'numberposts'		=> 1,
			'posts_per_page'	=> 1,
			'order'				=> 'DESC'
		);
		$query = null;
		$query = new WP_Query($matches);
		if($query->have_posts()) {
		   	$sep = '';
		   	$list = '';
		   	while ($query->have_posts()) : $query->the_post();
		    	$item = get_post_meta($post->ID, 'match_numbers', true);
		      	if ($item) {
		        	$list .= "$sep$item";
		         	$sep = ', ';
		      	}
		   	endwhile;
		   	echo '<iframe src="http://usarugbystats.com/embed/squares/otf?matches='.$list.'" width="100%" height="144" frameborder="0" scrolling="0"></iframe>';
		}
	?>
			
</section>

<hr/>

<section id="latest-news-headlines">
	
	<div id="container" class="free-wall row">

		<?php $args = array(
			'post_type'			=>	'post',
			'post_status'		=>	'publish',
			'posts_per_page'	=>	-1,
			'order'				=>	'DESC'
		);
		$freewall = new WP_Query($args);
		if($freewall->have_posts()) : while($freewall->have_posts()) : $freewall->the_post(); ?>

			<div class="brick">
				
				<div class="news-item">

					<?php if(has_post_thumbnail($post->ID)): ?>
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID)); $d = 'F j, Y'; ?>
					<div class="image-content-wrapper">
						
						<div class="featured-image"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></div>
	
						<h1><?php echo the_title(); ?></h1>
	
						<div><?php echo the_excerpt(); ?></div>
					
					</div>
					
					<?php else : ?>
					
					<h1><?php echo the_title(); ?></h1>
	
					<div><?php echo the_excerpt(); ?></div>

					<?php endif; ?>
					
				</div>
				
			</div>

			<?php endwhile; wp_reset_postdata(); ?>

		<?php endif; ?>

	</div>

</section>

<?php get_footer(); ?>