<?php 
/*
Template Name: Home
*/
get_header(); ?>

<script> 
	jQuery(document).ready(function ($) {
		$("#headlines").royalSlider({
			autoHeight: true,
		 	arrowsNav: false,
		 	controlNavigation: 'tabs', 
		 	sliderDrag: false,
		 	navigateByClick: false,
		 	addActiveClass: true
		});
		 var slider = $('#headlines');
    	 slider.append(slider.find('.rsNav'));
	});
</script>

<section id="hero" class="small-12 medium-12 large-12 left clearfix">
	
	<?php if(!dynamic_sidebar('hero')): ?>
	<?php endif; ?>

	<aside id="headlines" class="large-5 medium-12 small-12 right clearfix">
			
		<div id="news-articles-list" class="clearfix">

			<?php if(!dynamic_sidebar('lastest-headlines')): ?>
			<?php
			// get posts in sticky-1 category
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'posts_per_page'   => 3,
				'offset'           => 0,
				'orderby'          => 'post_date',
				'cat'			   => 81,
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'suppress_filters' => true,
				'paged'			   => $paged
			);
			$sticky = get_posts($args);

			foreach($sticky as $post) : setup_postdata($post); $do_not_duplicate = $post->ID;
			?>
			<article class="item clearfix">

				<div class="ranking-item">
				
					<a class="post-link" href="<?php the_permalink(); ?>">
					
						<span class="featured-image left small-5 medium-5 large-5">

							<?php the_post_thumbnail(medium); ?>

						</span>					

						<span class="news-article-metadata right small-7 medium-7 large-7">
							
							<h2 class="news-article-title" itemprop="headline"><?php the_title(); ?></h2>
						
							<div class="news-article-excerpt" itemprop="description">
							
								<?php the_excerpt(); ?>
							
							</div>
						
						</span>

					</a>

				</div>

			</article>

			<hr/>

			<?php endforeach; ?>
			<?php endif; wp_reset_postdata(); ?>

			<div class="rsTmb">Latest News</div>

		</div>

		<div id="rankings" class="clearfix">
		
			<?php if(!dynamic_sidebar('current-rankings')): ?>
			<?php
			// get posts in sticky-2 category
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'posts_per_page'   => 3,
				'offset'           => 0,
				'orderby'          => 'post_date',
				'cat'			   => 82,
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'suppress_filters' => true,
				'paged'			   => $paged
			);
			$ranking = get_posts($args);

			foreach($ranking as $post) : setup_postdata($post); $do_not_duplicate = $post->ID;
			?>
			<article class="item clearfix">

				<div class="ranking-item">
				
					<a class="post-link" href="<?php the_permalink(); ?>">
					
						<span class="featured-image left small-5 medium-5 large-5">

							<?php the_post_thumbnail(medium); ?>

						</span>					

						<span class="news-article-metadata right small-7 medium-7 large-7">
							
							<h2 class="news-article-title" itemprop="headline"><?php the_title(); ?></h2>
						
							<div class="news-article-excerpt" itemprop="description">
							
								<?php the_excerpt(); ?>
							
							</div>
						
						</span>

					</a>

				</div>

			</article>

			<hr/>

			<?php endforeach; ?>
			<?php endif; wp_reset_postdata(); ?>
			
			<div class="rsTmb">Current Rankings</div>

		</div>

		<div id="announcements" class="clearfix">
		
			<?php if(!dynamic_sidebar('announcements')): ?>
			<?php
			// get posts in sticky-3 category
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'posts_per_page'   => 3,
				'offset'           => 0,
				'orderby'          => 'post_date',
				'cat'			   => 83,
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'suppress_filters' => true,
				'paged'			   => $paged
			);
			$announcement = get_posts($args);

			foreach($announcement as $post) : setup_postdata($post); $do_not_duplicate = $post->ID;
			?>
			<article class="item clearfix">

				<div class="ranking-item">
				
					<a class="post-link" href="<?php the_permalink(); ?>">
					
						<span class="featured-image left small-5 medium-5 large-5">

							<?php the_post_thumbnail(medium); ?>

						</span>					

						<span class="news-article-metadata right small-7 medium-7 large-7">
							
							<h2 class="news-article-title" itemprop="headline"><?php the_title(); ?></h2>
						
							<div class="news-article-excerpt" itemprop="description">
							
								<?php the_excerpt(); ?>
							
							</div>
						
						</span>

					</a>

				</div>

			</article>

			<hr/>

			<?php endforeach; ?>
			<?php endif; wp_reset_postdata(); ?>
			
			<div class="rsTmb">Announcements</div>

		</div>		

	</aside>

</section>

<hr/>

<section id="featured-matches" class="small-12 medium-12 large-12 clearfix">
	
	<h1>Saturday Six-Pack</h1>

	<?php $matches = array(
			'post_type' 		=> 'match',
			'numberposts'		=> 1,
			'posts_per_page'	=> 1,
			'order'				=> 'DESC',
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
		   	//echo '<iframe src="http://usarugbystats.com/embed/squares/otf?matches='.$list.'" width="100%" height="144" frameborder="0" scrolling="0"></iframe>';
		   	echo '<img src="http://placehold.it/160x160.jpg"/> <img src="http://placehold.it/160x160.jpg"/> <img src="http://placehold.it/160x160.jpg"/> <img src="http://placehold.it/160x160.jpg"/> <img src="http://placehold.it/160x160.jpg"/> <img src="http://placehold.it/160x160.jpg"/>';
		}
	?>
			
</section>

<hr/>

<section id="latest-news-headlines" class="small-12 medium-12 large-12 clearfix">
	
	<h1 class="home-news">Latest Club Rugby News</h1>

	<div id="freewall" class="free-wall row">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type'			=>	'post',
				'post_status'		=>	'publish',
				'posts_per_page'	=>	24,
				'order'				=>	'DESC',
				'paged'				=> $paged,
				'pagination'		=> true
			);
			$freewall = new WP_Query($args);
		?>
		<?php while($freewall->have_posts()) : $freewall->the_post(); clubrugby_infinite_scroll_init(); ?>
		<?php endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>