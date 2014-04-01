<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>


	<section id="about-intro" class="about-section">
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<h2 class="home-head"><?php the_title(); ?></h2>
			<div class="blog">
				<div class="entry about-intro">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="clear"></div>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</section>

	<section id="about-skills" class="about-section">
		<h2 class="home-head">Web Development Skills</h2>

		<div class="blog">
			<div id="skills-box">
				<ul>
					<div class="skills-column">
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/html5-02.png" alt="HTML5 logo" />HTML</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/css3-01.png" alt="CSS3 logo" />CSS</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/js-01.png" alt="JavaScript logo" />JavaScript, jQuery</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/php-01.png" alt="PHP logo" />PHP</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/sass-01.png" alt="Sass logo" />Sass, LESS</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/angular-01.png" alt="Angular JS logo" />AngularJS, Backbone.js</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/accessibility-01.png" alt="Web Accessibility" />Web Accessibility</li>
					</div>
					<div class="skills-column second">
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/wordpress-01.png" alt="WordPress logo" />WordPress</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/drupal-01.png" alt="Drupal logo" />Drupal</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/handlebars-01.png" alt="Handlebars logo" />Handlebars.js</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/bootstrap-01.png" alt="Bootstrap logo" />Bootstrap, Foundation</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/grunt-01.png" alt="Grunt logo" />Grunt</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/git-01.png" alt="Git logo" />Version Control (Git, SVN)</li>
						<li><img src="<?php bloginfo('template_directory'); ?>/images/skills/ps-02.png" alt="Photoshop logo" />Adobe Creative Suite</li>
					</div>
					<div class="clear"></div>
				</ul>
			</div>
		</div>

	</section>

	<section id="about-education" class="about-section">
		<h2 class="home-head">Education</h2>

		<div id="education-box" class="blog">
			<ul>
				<li id="univ-ky">
					<a href="http://www.uky.edu" target="_blank" rel="nofollow">
						<img src="<?php bloginfo('template_directory'); ?>/images/ukentucky01.jpg" alt="University of Kentucky logo" border="0" />
					</a>
					<h3><a href="http://www.uky.edu" target="_blank" rel="nofollow">University of Kentucky</a></h3>
					<h4>Bachelor of Fine Arts (BFA)<br> Art Studio</h4>
					<p>Graduated Dec. 2007, <em>Magna Cum Laude</em></p>
				</li>
				<li id="depaul">
					<a href="http://www.depaul.edu" target="_blank" rel="nofollow">
						<img src="<?php bloginfo('template_directory'); ?>/images/depaul01.jpg" alt="DePaul University logo" border="0" />
					</a>
					<h3><a href="http://www.depaul.edu" target="_blank" rel="nofollow">DePaul University</a></h3>
					<h4>Master of Arts (MA)<br> New Media Studies</h4>
					<p>Graduated May 2010</p>
				</li>
				<li id="starter-league">
					<a href="http://www.starterleague.com" target="_blank" rel="nofollow">
						<img src="<?php bloginfo('template_directory'); ?>/images/starterleague01.jpg" alt="Starter League logo" border="0" />
					</a>
					<h3><a href="http://www.starterleague.com" target="_blank" rel="nofollow">Starter League (aka: Code Academy)</a></h3>
					<h4>12-week Web App Development program<br> Ruby on Rails, HTML5, CSS3, JS/jQuery</h4>
					<p>Winter 2012 (Jan-Mar)</p>
				</li>
			</ul>
		</div>
	</section>

	<section id="about-facts" class="about-section">
		<h2 class="home-head">Random Facts</h2>
		<div id="facts-box" class="blog">
			<div class="fact green-fact" tabindex="0">I love Chicago and hope to live here for the rest of my life.</div>
			<div class="fact italic-fact" tabindex="0">I met my girlfriend Amanda at the 2009 Sundance Film Festival in Park City, Utah. We returned to the festival again in 2010 and 2011.</div>
			<div class="fact" tabindex="0">I consider myself a liberal/progressive Catholic and am a member at Old St. Patrick's Church in the West Loop of Chicago.</div>
			<div class="fact italic-fact" tabindex="0">I have zero tolerance for people who use cellphones in movie theaters.</div>
			<div class="fact italic-fact" tabindex="0">I was born and grew up in the tiny borough of Shrewsbury, New Jersey. In 1999 my family moved to Bardstown, Kentucky, where I went to high school.</div>
			<div class="fact green-fact" tabindex="0">My favorite movies are <em>City Lights</em>, <em>Taxi Driver</em>, <em>The Empire Strikes Back</em>, and <em>Edward Scissorhands</em>.</div>
			<div class="fact green-fact" tabindex="0">My favorite bands are Nirvana, The Beatles, and Tom Waits.</div>
			<div class="fact green-fact" tabindex="0">My favorite actors are Vincent Price and Jack Nicholson.</div>
			<div class="fact green-fact" tabindex="0">My favorite book is "Perfume" by Patrick S&uuml;skind.</div>
			<div class="fact italic-fact" tabindex="0">Thanks to my Dad, I am a big fan of Formula 1 racing&mdash;especially the Ferrari team, having grown up during the Michael Schumacher era. My Dad and I attended the US Grand Prix at Indianapolis 3 times and the Italian Grand Prix of Monza in 2011.</div>
			<div class="fact" tabindex="0">I'm afraid of most insects, especially praying mantises and moths. I am <em>not</em>, however, afraid of snakes, mice, or rats.</div>
			<div class="fact" tabindex="0">I was a vegetarian from 2005-2010. During the last year I was a pescetarian, but my ultimate downfall was wanting a Chicago-style hot dog.</div>
			<div class="fact" tabindex="0">I am a recovering alcoholic and have been sober since October 9, 2013.</div>
			<div class="fact italic-fact" tabindex="0">To date, I have visited England twice, Italy twice, Switzerland, Mexico, and Canada.</div>
			<div class="fact italic-fact" tabindex="0">I am definitely a "cat person" and have always had a pet cat my whole life. I am generally uncomfortable around dogs and will never own one as a pet.</div>
			<div class="fact" tabindex="0">I have been playing music since 2nd grade and can play (in descending order of aptitude) the guitar, piano, bass, and drums. I'd someday like to learn the cello.</div>
			<div class="sizer">&nbsp;</div>
		</div>
	</section>

<?php get_footer(); ?>