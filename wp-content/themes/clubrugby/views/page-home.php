<?php 
/*
Template Name: Home
*/
get_header(); ?>

<div id="hero" class="small-12 medium-7 large-7">

	<?php if(!dynamic_sidebar('Hero')): ?>
	<?php endif; ?>

</div>

<div id="featured-info" class="small-12 medium-12 large-12">

	<div class="author-info left column small-12 medium-6 large-6">
	
		

	</div>

	<div class="featured-book left column small-12 medium-6 large-6">


	</div>

</div>

<?php get_footer(); ?>