<?php
	/** Template name: Home page **/
	get_header();
?>

<section class="homeContent">
	<article id="post-<?php the_ID(); ?>" <?php post_class('twelve columns'); ?>>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<header class="paddingB20">
				<h1 class="background "><?php the_title();?></h1>
			</header>
		<?php the_content(); ?>
		<?php endwhile; ?>
	</article>
</section>	

<section class="services">
 

	<?php $args = array(
	'post_type' => 'page',
	'post__in' => array(12,15,14,13));
	query_posts($args); ?>


	<ul>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<li <?php post_class('three columns'); ?>>
			<a href="<?php the_permalink(); ?>">
					<h3><?php the_title();?></h3>
					<img src="<?php bloginfo('template_directory'); ?>/img/singleIcons.png" alt="">
				<?php the_excerpt(); ?>
			</a>
		</li>
	<?php endwhile; ?>
	</ul>
</section>

 
 
<section class="logoStrip">
	<ul>
		<li class="three columns"><a href="http://www.tripadvisor.co.uk/Hotel_Review-g735213-d1874998-Reviews-Camping_Domaine_des_Mathevies-Sainte_Nathalene_Sarlat_la_Caneda_Dordogne_Aquitaine.html" target="_blank"><img src="<?php bloginfo( 'template_directory' );?>/img/tripadvisor.png"></a></li>
		<li class="three columns"><a href="http://www.coolcamping.co.uk/campsites/europe/france/west-france/dordogne-lot/384-camping-domaine-des-mathevies" target="_blank"><img src="<?php bloginfo( 'template_directory' );?>/img/coolcamping.png"></a></li>
		<li class="three columns"><a href="http://www.zoover.co.uk/france/aquitaine/stenathalene-dordogne/domaine-des-mathevies/camping" target="_blank"><img src="<?php bloginfo( 'template_directory' );?>/img/zoover.png"></a></li>
		<li class="three columns"><a href="http://www.ukcampsite.co.uk/sites/reviews.asp?revid=8465" target="_blank"><img src="<?php bloginfo( 'template_directory' );?>/img/ukcampsite.png"></a></li>
	</ul>
</section>




<?php get_footer()?>