<?php 
/* Template name: Services
*/
get_header();
?>

<section class="center centerCopy mainContent">
	<div class="innerCont">
		<header>
			<h1 class="background ">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- post -->
				<?php the_title(); ?>
			</h1>
		</header>
		<article>
			<?php the_content(); ?>
		</article>	
	</div>
</section>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>




<section class="center accommodationContainer">
	<?php if(get_field('accommodation_container')): ?>
		<ul>
		<?php while(has_sub_field('accommodation_container')): ?>
	 
			<li>
				<h3><?php the_sub_field('title'); ?></h3>
				<?php the_sub_field('copy'); ?>
				<a href="<?php the_sub_field('link'); ?>" class="btn"><?php the_sub_field('link_title'); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</section>








<section class="slider pageGallery">
<?php
 
/*
*  View array data (for debugging)
*/
 
//var_dump( get_field('gallery') );
 
/*
*  Create the Markup for a slider
*  This example will create the Markup for Flexslider (http://www.woothemes.com/flexslider/)
*/
 
$images = get_field('image_gallery');
if( $images ): ?>
    <div class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                	<p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
 
    /*
    *  The following code creates the thumbnail navigation
    */
 
    ?>
 
<?php endif; 
 
?>
</section>





<?php get_footer() ?>