<article id="<?php $title = get_the_title(); echo sanitize_title_with_dashes($title); ?>" class="post-<?php the_ID(); ?> column small-12 medium-12 large-12">

	<div class="tabs-content">

		<div class="content active" id="about">
			
			<?php while (have_posts()) : the_post(); ?>

				<div class="panel">
					<ul class="no-bullet button-group even-5">
						<li>Founded: <?php echo the_field('year_founded'); ?></li>
						<li>Members: 8,231</li>
						<li>Clubs: 189</li>
						<li>President: Jeremiah Johnson</li>
						<li>Congress Reps: <?php if(have_rows('congress_reps')) : while(have_rows('congress_reps')) : the_row(); the_sub_field('congress_reps_names'); endwhile; endif; ?></li>
					</ul>
				</div>
				<?php echo the_field('about'); ?>
		
			<?php endwhile; ?>

		</div>
	
		<div class="content" id="contact">

			<?php while (have_posts()) : the_post(); ?>

				<h2>Contact</h2>
				<?php echo the_field('contact'); ?>
		
			<?php endwhile; ?>

		</div>

		<div class="content" id="clubs">

			<?php while (have_posts()) : the_post(); ?>

				<h2>Clubs</h2>
				<?php echo the_field('clubs'); ?>
		
			<?php endwhile; ?>

		</div>

	</div>

	<hr/>

	<div class="single-news-feed">

		<ul id="news-items">
			<?php
				// get posts in news category
				global $post;
				$post_slug=$post->post_name;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'posts_per_page'   => 10,
					'offset'           => 0,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'post',
					'post_status'      => 'publish',
					'suppress_filters' => true,
					'paged'			   => $paged
				);

				$union_news = get_posts($args);

				foreach($union_news as $post) : setup_postdata($post);
			?>
				
				<li>

					<div class="news-article-item clearfix">
						
						<a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>">
							
							<span class="featured-image small-3 medium-3 large-3">

								<?php the_post_thumbnail('thumbnail'); ?>

							</span>
						
						</a>

						<span class="news-article-metadata small-8 medium-9 large-9">
							
							<a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>"><h1 class="news-article-title"><?php the_title(); ?></h1></a>

							<h4 class="clearfix">

								<span class="news-article-author"><?php $author_alias = get_field('author_alias'); $author = get_the_author(); $d = 'F j, Y'; $date = get_the_date($d); if(!$author_alias) { echo $author; } else { echo $author_alias; } ?></span>
								<span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
								<span class="news-article-date"><?php echo $date; ?></span>

							</h4>
						
							<div class="news-article-excerpt">
							
								<?php the_excerpt(); ?>
							
							</div>

							<div class="read-more">

								<a rel="<?php the_permalink(); ?>" href="<?php the_permalink(); ?>"><i class="fa fa-chevron-circle-right"></i> Continue Reading</a>
							
							</div>
						
						</span>

					</div>

					<hr/>

				</li>

			<?php endforeach; ?>

		</ul>

	</div>

</article>