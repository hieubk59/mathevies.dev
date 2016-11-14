<?php 
/* Template name: FAQs
*/
get_header();
?>

<section class="center centerCopy mainContent">
	<div class="innerCont">
		<header>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="background">
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











 

<section class="askTheQuestions">
	<?php if(get_field('faqs')): ?>
	<?php while(has_sub_field('faqs')): ?>
	<article>
		<h3><?php the_sub_field('heading'); ?></h3> 
			<ul id="accord">
				<?php if( get_sub_field('content') ): ?>
				<?php while( has_sub_field('content') ): ?>
				<li>
				<a><?php the_sub_field('title'); ?></a>
					<ul>
						<li>
							<?php the_sub_field('copy'); ?>
						</li>
					</ul>
				</li>
				<?php endwhile; endif; ?>
			</ul>
	</article>
	<?php endwhile; endif;  ?>
</section>













<?php get_footer() ?>