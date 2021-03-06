<?php get_header(); ?>
    <div class="blog ideas-blog">

    	<h2 class="index-head">Blog</h2>

		<div class="nav-wrap">
			 <?php get_search_form(); ?> 
			<nav class="search-nav" role="navigation">
				<span id="search-nav-menu" role="menubar">
					<a href="#" class="btn secondary-btn cat-btn" aria-haspopup="true" aria-controls="blog-menu" role="menuitem">Categories</a>
                    <ul class="blog-menu" role="menu" aria-hidden="true" aria-live="polite" id="blog-menu">
                        <li class="cat-item" role="menuitem"><a href="/blog">Everything</a></li>
                        <?php 
                            $args = array(
                                'type' => 'post',
                                'orderby' => 'name',
                                'order' => 'ASC'
                            );
                            $categories = get_categories($args);
                            foreach($categories as $category) { 
                                echo '<li class="cat-item" role="menuitem"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name.'</a></li>';
                            } 
                        ?>
                    </ul>
				</span>
			</nav>
			<div class="clear"></div>
		</div>		
		
		<div class="ideas-list">

        <?php if(have_posts()) : ?>
        
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
			
			<?php endwhile; ?>

		</div><!--div.blog-posts-->
         
        <div class="navigation">
			<div class="prev-post"><?php previous_posts_link('&#9668; Back'); ?></div>
			<div class="next-post"><?php next_posts_link('Next &#9658;'); ?></div>
		</div>
		
		<?php else : ?>

			<article class="post">
				<div class="entry">
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>
     
        <?php endif; ?>

    </div><!-- div.blog -->
   
<?php get_footer(); ?>