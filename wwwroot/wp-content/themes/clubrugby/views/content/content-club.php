<article id="<?php $title = get_the_title(); echo sanitize_title_with_dashes($title); ?>" class="post-<?php the_ID(); ?> column small-12 medium-12 large-12">

	<div class="tabs-content">

		<div class="content active" id="about">
			
			<?php while (have_posts()) : the_post(); ?>

				<h2>About</h2>
				<?php echo the_field('about'); ?>

			<?php endwhile; ?>

		</div>

		<div class="content" id="contact">

			<?php while (have_posts()) : the_post(); ?>

				<h2>Contact</h2>
				<?php echo the_field('contact'); ?>

			<?php endwhile; ?>

		</div>

	</div>

</article>