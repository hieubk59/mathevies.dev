<?php 
/* Template name: Contact
*/
get_header();
?>
<div class="maxWidth">

 
<section class="center centerCopy mainContent">
	<div class="innerCont">
		<header>
		 




<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
	<h1 class="background">
		<?php the_title(); ?>
	</h1>

<?php the_field('sub_content'); ?>


</header>


 
<article class="leftCol"> 
	<?php the_content(); ?>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
</article>

<article class="rightCol">
 <?php the_field('second_column'); ?>	
</article>

</div>

</section>


</div>
 

<?php get_footer() ?>