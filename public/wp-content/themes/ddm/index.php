<?php get_header(); ?>

<div class="maxWidth">

<section class="center centerCopy mainContent ">
	<div class="innerCont">
		<header>
			<h1 class="background ">
				<?php
				$args = array(
					'post_type'=> 'page',
					'post__in' => array(236));
				query_posts($args);
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- post -->
				<?php the_title(); ?>
			</h1>
		</header>
		<article>
			<?php the_content(); ?>
		</article>	
	</div>
</section>
<?php endwhile; wp_reset_query(); ?>
<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>




<!-- post -->

<section class="latestNews" id="content"> 
	<?php $args = array(
		'post_type' => 'post',
		'posts_per_page' => 3);
		query_posts($args); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class("four columns blog"); ?>>
			<div class="entry-date">
				<span class="day"><?php echo get_the_date('d'); ?><sup><?php echo get_the_date('S'); ?></sup></span>
				<span class="monthYear"><?php echo get_the_date('M Y'); ?></span>	
			</div>
			<div class="inner">
				<h2>
					<a href="<?php permalink_link(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php excerptBlog('30'); ?>
				<p class="commentLinks" style="display:none;">
					<?php comments_popup_link( __( 'No Comments', 'starkers' ), __( '1 Comment', 'starkers' ), __( '% Comments', 'starkers' ) ); ?>
				</p>
			</div>
		</article>

	<?php endwhile; ?>
</section> 


</div>

<?php get_footer(); ?>