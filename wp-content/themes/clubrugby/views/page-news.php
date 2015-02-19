<?php 
/*
Template Name: News
*/
get_header(); ?>

<div id="news" class="column">

	<section id="news-menu" class="row">

		<dl class="sub-nav" role="menu" title="Filter News Menu List">
		  <dt>Sort By:</dt>
		  <?php echo do_shortcode('[searchandfilter taxonomies="unions,post_tag,divisions,sex,competitive_regions"]') ?>
		</dl>
		
		<hr/>

	</section>
	
	<section id="news-articles" class="small-12 medium-12 large-12">
		
		<ul id="news-articles-list">

		<?php
			// get posts in news category
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
			$terms = get_terms('union','level','sex','competitive_region',$args);
			$clubnews = get_posts($args);

			foreach($clubnews as $post) : setup_postdata($post);
		?>
			
			<li class="news-item">
	
				<div class="news-article-item clearfix">
					
					<a class="post-link" href="<?php the_permalink(); ?>">
						
						<span class="featured-image small-3 medium-3 large-3">

							<?php the_post_thumbnail(medium); ?>

						</span>
					
					</a>

					<span class="news-article-metadata small-9 medium-9 large-9">
						
						<a class="post-link" href="<?php the_permalink(); ?>"><h1 class="news-article-title" itemprop="headline"><?php the_title(); ?></h1></a>

						<h4 class="clearfix">

							<span class="news-article-author" itemprop="author"><?php $author_alias = get_field('author_alias'); $author = get_the_author(); $d = 'F j, Y'; $date = get_the_date($d); if(!$author_alias) { echo $author; } else { echo $author_alias; } ?></span>
							<span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
							<span class="news-article-date"><?php echo $date; ?></span>

						</h4>
					
						<div class="news-article-excerpt" itemprop="description">
						
							<?php the_excerpt(); ?>
						
						</div>

						<div class="read-more">

							<a class="post-link" href="<?php the_permalink(); ?>" itemprop="url"><i class="fa fa-chevron-circle-right"></i></a><a href="<?php the_permalink(); ?>"> Continue Reading</a>
						
						</div>
					
					</span>

				</div>

				<hr/>

			</li>

		<?php endforeach; ?>
		</ul>

	</section>

	<section class="page-footer">

		<div id="news-footer">
			<?php
				// Create WP_Query
				    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				    $args = array(
				        'post_type' => 'post',
				        'posts_per_page' => 15,
				        'total'	=> -1,
				        'order' => ASC,
				        'orderby' => date,
				        'paged' => $paged
				    );

				    $my_query = new WP_Query($args);

				// Start Wordpress Loop
				    if ( $my_query -> have_posts() ) : while ( $my_query -> have_posts() ) : $my_query -> the_post();

				// Generate Content
				    $output[] = '';

				// End Wordpress Loop
				    endwhile; else:
				    $output[] = _e('<p>Sorry, there are no news posts at this time.</p>');
				    endif;

				// Implode and Echo Output Array
				    if(isset($output))
				        {
				        $output = implode("\n",$output);
				        echo($output);
				        }

				// Unset MySQL Loop Variables
				    unset($output);

				// Calculate Number of WP Paged
				    $published_posts = wp_count_posts()->publish;
				    $number_of_pages = ($published_posts/15);
				    $number_of_pages = ceil($number_of_pages);
			?>

			<div class="left"><?php previous_posts_link('&laquo; Latest News',0) ?></div>
			<div class="left previous"><?php next_posts_link('Previous News &raquo;',$number_of_pages) ?></div>
		</div>

	</section>

</div>

<?php get_footer(); ?>