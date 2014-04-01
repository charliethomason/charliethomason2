<?php get_header(); ?>
 
    <div class="blog ideas-blog search-blog">

    	<h2 class="index-head">Search Results for &#8216;<?php the_search_query(); ?>&#8217;</h2>

		<div class="nav-wrap">
			 <?php get_search_form(); ?> 
			<div class="clear"></div>
		</div>

		<div class="blog-posts">
        <?php if(have_posts()) : ?>

        <?php while(have_posts()) : the_post(); ?>
         
        <article class="post">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="catdate"><?php the_time('D, M j, Y'); ?></p>
            
			<div class="entry">  
				<div class="aligncenter"><?php the_post_thumbnail('medium'); ?></div>
                <?php the_excerpt(); ?>
            </div><!-- div.entry -->
 
    	</article><!-- article.post -->
 
<?php endwhile; ?>
     
	<div class="navigation">
		<div class="prev-post"><?php previous_posts_link('&#9668; Back'); ?></div>
		<div class="next-post"><?php next_posts_link('Next &#9658;'); ?></div>
		<div class="clear"> </div>
	</div>

<?php else : ?>
	<h2 class="archivetitle">Search results</h2>
	<article class="post">
		<div class="entry">
		<p>Sorry, no results matched your search.</p>
		<?php get_search_form(); ?>
		</div>
	</article>
 
<?php endif; ?>
	</div><!-- div.blog-posts -->
</div>
 
   
<?php get_footer(); ?>