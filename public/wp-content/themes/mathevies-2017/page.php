<?php
include("header.php");

// Variables
$introductoryParagraph = get_field('introductory_paragraph');
$tertiaryHeading = get_field('tertiary_heading');
?>

<?php
    if (have_posts()): while (have_posts()) : the_post();
    $do_not_duplicate = $post->ID;
?>

    <?php if ( !is_page( array(8, 113, 116) ) ) : ?>
        <div class="pitches">
          	  	<div class="pitches_in">

                    <!-- Tertiary heading -->
                    <?php if( $tertiaryHeading ) : ?>
                        <h2>
                            <?php echo $tertiaryHeading; ?>
                        </h2>
                    <?php endif; ?>

                    <!-- Subtitle -->
                    <?php if( $introductoryParagraph ) : ?>
                        <h3>
                            <?php echo $introductoryParagraph; ?>
                        </h3>
                    <?php endif; ?>

                <?php the_content(); ?>

                <?php if ( is_page(191) ): ?>
                    <section class="faqs">
                    	<?php if(get_field('faqs')): ?>
                    	<?php while(has_sub_field('faqs')): ?>
                    	<article>
                    		<h3 class="faqs__title"><?php the_sub_field('heading'); ?></h3>
                    			<ul id="accord" class="faqs__list">
                    				<?php if( get_sub_field('content') ) : ?>
                    				<?php while( has_sub_field('content') ) : ?>
                    				<li class="faqs__list-item">
                    				    <h4 class="faqs__sub-title"><?php the_sub_field('title'); ?></h4>
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
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>

<?php endwhile; endif; ?>

<?php if( !is_page(116) ) : ?>

<!-- START: Slick slider -->
<?php include("partials/slider.php"); ?>
<!-- END: Slick slider -->

<?php endif; ?>

<!-- START: Content strip -->
<?php include("partials/content-strip.php"); ?>
<!-- END: Content strip -->

<?php include("footer.php"); ?>
