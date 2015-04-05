<?php $author = get_the_author(); ?>

<div class="brick small-12 medium-6 large-4">
	
	<div class="news-item">

		<?php if(has_post_thumbnail($post->ID)): ?>
		<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');?>
		<div class="image-content-wrapper">
			
			<div class="featured-image small-12"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></div>

			<h1 class="news-item-title small-12"><?php echo the_title(); ?></h1>
			<h4 class="news-item-metadata small-12">
				<span class="news-article-author" itemprop="author"><?php $author_alias = get_field('author_alias'); $author = get_the_author(); $d = 'F j, Y'; $date = get_the_date($d); if(!$author_alias) { echo $author; } else { echo $author_alias; } ?></span>
				<span>&nbsp;|&nbsp;</span>
				<span class="news-article-date"><?php echo $date; ?></span>
			</h4>
			<div class="news-item-excerpt small-12"><span class="excerpt"><?php echo get_the_excerpt(); ?></span></div>
		
		</div>
		
		<?php else : ?>
		
		<h1 class="news-item-title small-12"><?php echo the_title(); ?></h1>

		<div class="news-item-excerpt small-12"><span class="excerpt"><?php echo get_the_excerpt(); ?></span></div>

		<?php endif; ?>
		
	</div>
	
</div>