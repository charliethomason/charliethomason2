<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<main class="home-main">

	<section id="home-blog" class="home-section">
		<h2 class="home-head"><a href="blog">Blog</a></h2>
		<div class="blog ideas-blog">

			<div class="ideas-list">
				<?php 
					query_posts( 'posts_per_page=5'); 
					$count = 1;
				?>
		        <?php while(have_posts()) : the_post(); ?>
		        <article class="idea">
			        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<ul class="catdate">
						<li><?php the_time('D, M j, Y'); ?></li>
							<?php 
								$meta = get_post_meta($post->ID,'place',true);
								if ($meta != '') {
									echo '<li>&#8226; '.get_post_meta($post->ID,'place',true).'</li>';
								} 
							?>
						<li>&#8226; <?php the_category(', '); ?></li>
					</ul>
				</article>
				<?php 
					$count++;
					endwhile; 
				?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<section id="home-art" class="home-section">
		<h2 class="home-head"><a href="art">Art <span class="fancy-amp">&amp;</span> Photo Gallery</a></h2>
		<?php 
			$temp = $wp_query; 
			$wp_query = null; 
			$wp_query = new WP_Query(); 
			$wp_query->query('showposts=1&post_type=art'.'&paged='.$paged); 
			$count = 1;

			while ($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<?php
			$custom = get_post_custom($post->ID);
			$medium = $custom["medium"][0];
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
		?>
		<div class="featured-art-item">
			<a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?> </a>
			<div class="featured-art-info">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php if($medium != "") { ?>
					<p class="catdate"><strong>Medium:</strong> <?=$medium?></p>
				<?php } ?>
				<p><a class="btn" href="<?php the_permalink(); ?>">More Info</a> 
					<a class="btn secondary-btn enlarge-btn" href="<?php echo $thumb_url[0]; ?>">Enlarge</a>
				</p>
			</div>
		</div>
		<?php 
			$count++;
			endwhile; 
			wp_reset_query();
		?>
		<div class="clear"></div>
	</section>

	<section id="home-flickr" class="home-section">
		<h2 class="home-head"><a href="http://flickr.com/recycledfilm" target="_blank" rel="nofollow">Flickr <span class="fancy-amp">&amp;</span> Instagram Gallery</a></h2>
		<div id="flickr-wrap">
			<div id="flickr-loading">
				<p>Loading...</p>
				<div id="noTrespassingOuterBarG">
					<div id="noTrespassingFrontBarG" class="noTrespassingAnimationG">
						<div class="noTrespassingBarLineG"> </div>
						<div class="noTrespassingBarLineG"> </div>
						<div class="noTrespassingBarLineG"> </div>
						<div class="noTrespassingBarLineG"> </div>
						<div class="noTrespassingBarLineG"> </div>
						<div class="noTrespassingBarLineG"> </div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="clear"> </div>

</main>
   
<?php get_footer(); ?>