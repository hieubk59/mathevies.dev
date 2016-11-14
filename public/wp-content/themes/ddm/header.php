<!-- -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=8" > -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>
		<?php

		global $page, $paged;

		wp_title( '|', true, 'right' );

		bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'starkers' ), max( $paged, $page ) );

		?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery-1.10.1.js"></script>

	<!-- Google  -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>
	

	<?php
/* We add some JavaScript to pages with the comment form
* to support sites with threaded comments (when in use).
*/
if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

/* Always have wp_head() just before the closing </head>
* tag of your theme, or you will break many plugins, which
* generally use this hook to add elements to <head> such
* as styles, scripts, and meta tags.
*/
wp_head();
?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 9]>
<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
<![endif]-->

<div class="topWoodStrip">
	<div class="contactInfoContainer">
		<div class="language mobile">
		<?php/* do_action('icl_language_selector'); */?>

	<?php function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            //echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> ';
            echo icl_disp_language($l['native_name'], $l['translated_name']);
            if(!$l['active']) echo '</a>';
        }
    }
}
?>
 

<div id="flags_language_selector"><?php language_selector_flags(); ?></div >

			<!--<a href="http://www.mathevies.com">EN</a>
			<a href="http://www.mathevies.com/?lang=nl">NE</a>
			<a href="#">FR</a>
			<a href="#">NE</a>
			<a href="#">ES</a>
			<a href="#">DE</a>-->
		</div>

		<!-- <div class="language desktop">
			<a href="#" class="active">English</a>
			<a href="#">Français</a>
			<a href="#">Nederlands</a>
			<a href="#">Español</a>
			<a href="#">Deutsch</a>
		</div> -->

		<div class="contactInfo">
			<span class="green">T:</span><a href="tel:+33 (0)5 53 59 20 86">+33 (0)5 53 59 20 86</a>
			<span class="green">E:</span><a href="mailto:info@mathevies.com">info@mathevies.com</a>
		</div>
	</div>
</div>

<header class="main">
<!-- Logo -->
	<div class="container">

	<div class="logo">
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php bloginfo('template_directory'); ?>/img/mathevies_reverse_logo.png" alt="Domaine des Mathevies" />
		</a>
	</div>

	<!-- Navigation -->	 
	<?php wp_nav_menu( array(
	//'theme_location'  => ,
	'menu'            => 'yes', 
	'container'       => 'nav', 
	//'container_class' => 'eight columns omega', 
	'container_id'    => 'menu',
	'menu_id'         => 'mainMenu'
	//'menu_class'      => 'four coloumns', 
	//'echo'            => true,
	//'fallback_cb'     => 'wp_page_menu',
	//'before'          => ,
	//'after'           => ,
	//'link_before'     => ,
	//'link_after'      => ,
	//'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	//'depth'           => 0,
	//'walker'          =>  
	)); ?>
	</div>

	<div id="mobileNavIcon"><img src="<?php bloginfo('template_directory'); ?>/img/menu_background.png"></div>
	
</header>

<?php if (is_front_page( home )) : ?>

<section class="slider">
	<div class="flexslider">
		<ul class="slides">
			<?php $loop = new WP_Query( array(
 				'post_type' => 'slider',
 				'posts_per_page' => 5,
 				'orderby' => 'menu_order',
 				'order' => 'ASC'
 				)); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<li>
					<div class="cont">
						<h1><?php the_title(); ?></h1>
						<?php /* <p><?php the_content(); ?></p> */?>
					</div>
					<img src="<?php the_field('home_slider_images'); ?>" alt="<?php the_title(); ?>">
				</li>

			<?php endwhile; wp_reset_query();?> 	
		</ul>
	</div>

	<div class="mobileImage">
	<?php $loop = new WP_Query( array(
					'post_type' => 'slider',
					'posts_per_page' => 1,
					'orderby' => 'menu_order',
					'order' => 'ASC'
					)); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<div class="cont">
				<img src="<?php the_field('home_slider_images'); ?>" alt="<?php the_title(); ?>">

	<?php endwhile; wp_reset_query();?> 
	</div>

</section>


<?php elseif (is_page( 'find-us' )) : ?>
	<div id="mapWrap">
		<div id="map_canvas"></div>
		<!-- <div class="flex-control-nav"></div> -->
	</div>

<?php else : ?>

<?php endif; ?>
<!--end slider--> 