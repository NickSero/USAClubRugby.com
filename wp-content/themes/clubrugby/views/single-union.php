<?php $title = get_the_title(); get_header(); ?>

	<section id="<?php echo sanitize_title_with_dashes($title); ?>">

		<dl class="sub-nav" data-tab>
		  <dt><?php echo $title.' Menu'; ?></dt>
		  <dd class="active"><a href="#about">Info</a></dd>
		  <dd class=""><a href="#contact">Contact</a></dd>
		  <dd class=""><a href="#clubs">Clubs</a></dd>
		</dl>

		<?php get_template_part('views/content/content','union'); ?>

	</section>

<?php get_footer(); ?>