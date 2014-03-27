<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>
<div class="blog page-blog">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<article class="post">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>