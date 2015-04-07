<?php $title = get_the_title(); $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID)); get_header(); ?>

	<section id="<?php echo sanitize_title_with_dashes($title); ?>">
		<dl class="sub-nav no-bottom-margin">
			<dt><?php echo $title.' Rugby Football Union'; ?><span class="font-icons"><a class="font-icon logo" href="<?php echo the_field('website'); ?>"><img src="<?php echo $img[0]; ?>"/></a> <a class="font-icon" href="<?php echo the_field('facebook'); ?>"><i class="fa fa-facebook-official"></i></a> <a class="font-icon" href="<?php echo the_field('twitter'); ?>"><i class="fa fa-twitter"></i></a></span></dt>
		</dl>
		<dl class="sub-nav" data-tab>
		  <dd class="active"><a href="#about">Info</a></dd>
		  <dd class=""><a href="#contact">Contact</a></dd>
		  <dd class=""><a href="#clubs">Clubs</a></dd>
		</dl>

		<?php get_template_part('views/content/content','union'); ?>

	</section>

<?php get_footer(); ?>