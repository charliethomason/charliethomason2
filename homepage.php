<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
 	
<div class="intro-image">
	<a id="mobile-portrait" href="/about" title="Charlie Thomason">
		<img src="<?php bloginfo('template_directory'); ?>/images/cthomason07_680.jpg" alt="Charlie Thomason" />
	</a>
	<section class="intro">
		<div class="introcontent">
			<h1>Charlie Thomason is a Web Developer, Artist <span class="fancy-amp">&amp;</span> Photographer from Chicago</h1>
			<p>He is currently an Associate Presentation Layer Engineer at <a href="http://www.razorfish.com" target="_blank">Razorfish</a> and specializes in CSS3, JavaScript <span class="fancy-amp">&amp;</span> jQuery, web accessibility, responsive design, SEO, and custom WordPress themes.</p>
			<p>Charlie published his first photography book, <a href="http://www.blurb.com/b/2868673-open-range" target="_blank"><em>Open Range: From Monument Valley to the Mojave Desert</em></a> in January 2012, and has had paintings, drawings, and photographs featured in numerous exhibitions.</p>
			<div>
				<a class="btn home-btn" href="/about">Learn More</a> <a class="btn home-btn secondary-btn" href="/art">View Gallery</a>
			</div>

		</div>
		<div class="clear"></div>
	</section>
</div>

<section id="home-blog" class="home-section">
	<h2 class="home-head"><a href="javascript:void(0)"> Blog </a></h2>
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
	<h2 class="home-head"><a href="javascript:void(0)"> Gallery </a></h2>
	<div class="art-item-wrap">
		<?php 
		  $temp = $wp_query; 
		  $wp_query = null; 
		  $wp_query = new WP_Query(); 
		  $wp_query->query('showposts=100&post_type=art'.'&paged='.$paged); 
		  $count = 1;

		  while ($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		<?php	
			$custom = get_post_custom($post->ID);
			$medium = $custom["medium"][0];
			$print = $custom["print"][0];
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
		?>
		<div id="art-item-<?php echo $count; ?>" class="art-item">
			<a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?> </a>
			<div class="info">
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
	</div>
</section>
   
<?php get_footer(); ?>