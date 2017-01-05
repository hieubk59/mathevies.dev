<?php
include("header.php");

// Variables
$introductoryParagraph = get_field('introductory_paragraph');
$tertiaryHeading = get_field('tertiary_heading');

$video = 8;
$video_nl = 683;
$Regardez_notre_vidéo = 957;

$explore = 113;
$onderzoek = 687;
$Explorer = 934;

$gallery = 116;
$Galerij = 690;
$Galerie = 937;

$FAQs_nl = 673;
$FAQs_fr = 836;
$FAQs = 191;

?>

<?php
    if (have_posts()): while (have_posts()) : the_post();
    $do_not_duplicate = $post->ID;
?>

    <?php
    if ( !is_page( array(
        $video,
        $video_nl,
        $Regardez_notre_vidéo,
        $explore,
        $onderzoek,
        $Explorer,
        $gallery,
        $Galerij,
        $Galerie) ) ) : ?>

    <?php if( $introductoryParagraph || '' !== get_post()->post_content ) : ?>
        <div class="pitches">
          	  	<div class="pitches_in">

                <!-- Subtitle -->
                <h3><?php echo $introductoryParagraph; ?></h3>
                <?php the_content(); ?>

            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

<?php endwhile; endif; ?>

<?php if ( is_page( array($FAQs, $FAQs_nl, $FAQs_fr) ) ): ?>
    <div class="pitches">
        <div class="pitches_in">
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
        </div>
    </div>
<?php endif; ?>

<?php if( !is_page( array($gallery, $Galerij, $Galerie) ) ) : ?>

<!-- START: Slick slider -->
<?php include("partials/slider.php"); ?>
<!-- END: Slick slider -->

<?php endif; ?>

<!-- START: Content strip -->
<?php include("partials/content-strip.php"); ?>
<!-- END: Content strip -->

<?php include("footer.php"); ?>
