<?php $title = get_the_title(); get_header(); ?>

	<section id="<?php echo sanitize_title_with_dashes($title); ?>">

		<dl class="sub-nav" data-tab>
		  <dt><?php echo $title.' Club Menu'; ?></dt>
		  <dd class="tab-title active"><a href="#about">Info</a></dd>
		  <dd class="tab-title "><a href="#contact">Contact</a></dd> 
		</dl>

		<?php get_template_part('views/content/content','club'); ?>

	</section>

<?php get_footer(); ?>