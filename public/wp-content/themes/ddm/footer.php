<footer class="main">
	<div class="container">

		<div class="three">
			<h4><?php _e('Visit us','theme-text-domain'); ?></h4>
			<p><strong>Domaine des Mathevies</strong>
				<br> Les Mathevies, 24200
				<br> Sainte Nathalène, France</p>
			<div class="footerSubCont">
				<?php if (is_page( 'contact-us' )) : ?>
					<a href="https://maps.google.co.uk/maps?q=Les+Mathevies,+24200+Sainte+Nathal%C3%A8ne,+France&hl=en&ie=UTF8&sll=51.48931,-0.08819&sspn=0.763599,2.113495&hnear=Les+Mathevies,+Sainte-Nathal%C3%A8ne,+Dordogne,+Aquitaine,+France&t=m&z=15" target="_blank" class="btn">View large map</a>
					<?php else : ?>
						<div id="map_canvas"></div>
						<a href="https://maps.google.co.uk/maps?q=Les+Mathevies,+24200+Sainte+Nathal%C3%A8ne,+France&hl=en&ie=UTF8&sll=51.48931,-0.08819&sspn=0.763599,2.113495&hnear=Les+Mathevies,+Sainte-Nathal%C3%A8ne,+Dordogne,+Aquitaine,+France&t=m&z=15" target="_blank" class="btn">View large map</a>
						<?php endif; ?>
			</div>
		</div>

		<!-- Footer news -->
				
			<div class="three" id="footerNews">
				<h4><?php _e('Latest news','theme-text-domain'); ?>
			</h4>
			<?php $args = array(
					'post_type' => 'post',
					'posts_per_page' => 4
					//'post__in' => array(108)
					); query_posts($args); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink (); ?>">
						<?php the_title(); ?>
					</a>
					<br/>
				</article>
				<?php endwhile; wp_reset_query();?>
	</div>
	
	 

	<div class="three" id="newsletter">
		<h4><?php _e('Newsletter sign up','theme-text-domain'); ?></h4>
		<p>
			<?php _e('Sign up for the Domaine des Mathevies newsletter.','theme-text-domain'); ?>
		</p>
		<form action="http://email.voyagermail.co.uk/t/r/s/jistyj/" method="post" id="subForm">
			<input type="text" name="cm-name" id="name" value="Name" onclick="this.value=''" onblur="if (this.value=='') this.value='Name'" onfocus="this.value='Name'" />
			<input type="text" name="cm-jistyj-jistyj" id="jistyj-jistyj" value="Email" onclick="this.value=''" onblur="if (this.value=='') this.value='Email'" onfocus="this.value='Email'" />
			<input type="submit" class="btn" value="Subscribe" />
		</form>
		<div class="social">
			<h4><?php _e('Connect with us','theme-text-domain'); ?></h4>
			<a href="https://www.facebook.com/pages/Camping-Domaine-des-Mathevies-Sarlat-Dordogne/259891924039873?ref=hl" class="facebook" target="_blank">
				<span><?php _e('Facebook','theme-text-domain'); ?></span>
			</a>
			<a href="https://twitter.com/campmathevies" class="twitter" target="_blank">
				<span><?php _e('Twitter','theme-text-domain'); ?></span>
			</a>
		</div>
	</div>

	<div class="three" id="gallery">

		<h4><?php _e('Gallery','theme-text-domain'); ?></h4>
		<?php
				$args = array(
					'post_type' => 'page',
					'post__in' => array(45)
					);
				query_posts($args);
				?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php $images = get_field('image_gallery');
					if( $images ): ?>
					<ul>
						<?php foreach( $images as $image ): ?>
							<li>
								<a class="fancybox" rel="gallery1" href="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								</a>
							</li>
							<?php endforeach; ?>
					</ul>
					<?php endif; ?>
						<?php endwhile; wp_reset_query();?>
	</div>

	<div class="three" id="map">
		<h4><?php _e('Campsite map','theme-text-domain'); ?></h4>

		<a href="/wp-content/uploads/2015campsiteMap.jpg" target="_blank" class="fancybox">
					<img src="<?php bloginfo('template_directory'); ?>/img/map.png" width="100%" style="margin-bottom: 15px;">
				</a>
		<br>
		<a href="/wp-content/uploads/2015campsiteMap.jpg" target="_blank" class="btn fancybox">View large map</a>
	</div>

	</div>

	<div id="subFooter">
		<div class="container">
			<div class="six">
				T: +33 (0)5 53 59 20 86 / M: +33 (0) 614 10 95 86 / E: <a href="mailto:info@mathevies.com">info@mathevies.com</a>
				<br> Copyright &copy;
				<?php date(Y); ?> Domaine des Mathevies.
					<?php icl_link_to_element(304); ?>.
			</div>
			<div class="seven">
				<a href="http://michaelmannphotography.com/" target="_blank">Michael Mann Photography</a><br>
				<a href="http://www.mattjessop.com/" target="_blank">Matt Jessop Photography</a>
				<br/> Site by: <a href="http://www.squie.com" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/squie_ico_white.png" width="57" height="21" alt="This website was designed and build by: Squie" class="colorbox-manual"></a>
			</div>
		</div>
	</div>
</footer>

<!-- Google -->
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-26348196-1']);
	_gaq.push(['_trackPageview']);
	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
</script>

<?php wp_footer(); ?>
	</body>

	</html>
