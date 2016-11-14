<?php get_header(); ?>

<div class="maxWidth">

<section class="center mainContent">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
$do_not_duplicate = $post->ID; //This is the magic line
?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('marginB40 twelve columns bdrB paddingB30'); ?>>
			
				<header class="paddingB20">
					<h1 class="background "><?php the_title();?></h1>
				</header>
 

		<div class="entry-date">
			<span class="day"><?php echo get_the_date('d'); ?><sup><?php echo get_the_date('S'); ?></sup></span>
			<span class="monthYear"><?php echo get_the_date('M Y'); ?></span>	
		</div>
 			

<div class="inner">
			<?php the_content(); ?>
					
			<footer>
				<p class="commentLinks" style="display:none;">
					<?php comments_popup_link( __( 'No Comments', 'starkers' ), __( '1 Comment', 'starkers' ), __( '% Comments', 'starkers' ) ); ?>
				</p>
			</footer>
		</div>	
		</article>

<?php endwhile; wp_reset_query(); // end of the loop. ?>
</section>




<section class="subNews">

<?php query_posts(
	array('posts_per_page' => 4,
			'orderby' => 'date'
			));?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
if( $post->ID == $do_not_duplicate ) continue; //This is the Magic Line
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("four columns blog sub"); ?>>
			
			<div class="entry-date">
				<span class="day"><?php echo get_the_date('d'); ?><sup><?php echo get_the_date('S'); ?></sup></span>
				<span class="monthYear"><?php echo get_the_date('M Y'); ?></span>	
			</div>
		 <div class="inner">
			<h2>
				<a href="<?php permalink_link(); ?>"><?php the_title(); ?></a>
			</h2>
		<?php excerptBlog('30'); ?>
		
		<footer>
			<p class="commentLinks" style="display:none;">
			<?php comments_popup_link( __( 'No Comments', 'starkers' ), __( '1 Comment', 'starkers' ), __( '% Comments', 'starkers' ) ); ?>
		</p>
	</footer>
		</div>
		</article>
	<?php endwhile; ?>

	<div class="clearfix"></div>

	<P>
		<a href="../latest-news" class="btn">More news</a>
	</P>
	
</section>


</div>
<?php get_footer(); ?>