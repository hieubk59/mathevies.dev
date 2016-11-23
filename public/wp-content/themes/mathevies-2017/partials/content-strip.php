<?php

    // Set args
    // if is front page
    if ( is_front_page() ) {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array( 8, 10, 12, 14, 16, 113, 138, 161 )
        );

    // If is Activities
} elseif( is_page( array( 138, 142, 144, 146, 148, 150, 152 ) ) ) {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array( 142, 144, 146, 148, 150, 152 )
        );

    // If is Facilities
    } elseif( is_page( array( 161, 163, 165, 167, 169, 171, 173 ) ) ) {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array( 163, 165, 167, 169, 171, 173 )
        );

    // If is Gites
    } elseif( is_page( array(12, 83, 85 ) ) ) {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array(83, 85)
        );

    // If is Chalets
    } elseif( is_page( array(16, 107, 109 ) ) ) {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array(107, 109)
        );

    // All pages
    } else {
        $args = array(
     	    'post_type' => 'page',
            'post__in' => array(10, 12, 14, 16, 138, 161)
        );
    }
    // Query posts
    query_posts($args);

    // Wordpress loop
    if ( have_posts() ) while ( have_posts() ) : the_post();

    // do not duplicate post
    if ( $post->ID == $do_not_duplicate ) continue;

?>

<div class="section" id="post-<?php the_ID(); ?>">

        <div class="section__image-container">
            <figure class="section__figure">
                <?php if( get_the_post_thumbnail_url( $post_thumbnail_id ) ) : ?>
                    <!-- Image -->
                    <img src="<?php the_post_thumbnail_url( $post_thumbnail_id ); ?>" width="843" height="400"  class="section__image"alt="<?php bloginfo('name'); ?>">
                <?php else : ?>
                    <!-- Placeholder Image -->
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/11/placeholder.jpg" width="843" height="400"  class="section__image"alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
            </figure>
        </div>

        <a href="<?php echo get_permalink(); ?>" class="section__content-container">
            <div class="section__content-inner">

                <?php the_title('<h2>','</h2>') ?>

                <h4>
                    <?php the_field('subtitle') ?>
                </h4>

                <?php if ( $post->ID == 8 ) : ?>
                    <svg class="section__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-play-button" viewBox="0 0 32 32"></use>
                    </svg>

               <?php endif; ?>

            </div>
        </a>
</div>

<?php
    endwhile; wp_reset_query();
?>




<?php

if ( is_front_page() ) :

$args = array(
    'post_type' => 'page',
    'post__in' => array(116)
    //'post__not_in' => array(116)
);

// Query posts
query_posts($args);

// Wordpress loop
if ( have_posts() ) while ( have_posts() ) : the_post();

// do not duplicate post
// if ( $post->ID == $do_not_duplicate ) continue;
 ?>


<div class="banner banner--last">

    <div class="banner_img">
        <figure>
            <img src="<?php the_post_thumbnail_url( $post_thumbnail_id ); ?>" width="1257" height="501" alt="<?php bloginfo('name'); ?>">
        </figure>
    </div>

    <div class="banner_in">
        <div class="banner_cnt">
            <div class="banner_sec">
                <a href="<?php echo get_permalink(); ?>"  class="banner_blk">
                    <?php the_title('<h1>','</h1>') ?>
                    <h4><?php the_field('subtitle') ?></h4>
                </a>
            </div>
        </div>
    </div>

</div>

<?php
    endwhile; endif;
?>
