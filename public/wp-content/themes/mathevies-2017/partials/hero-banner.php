<?php
    // Variables
    $hero_banner = get_field('hero_banner');

    function add_class() {

        if( is_front_page() ) {
            return "banner_blk_inner";
        }

    }

    $className = add_class();
?>



<!-- <div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>

      <div class="video-wrapper">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/DJDQaroUHK4" frameborder="0" allowfullscreen></iframe>
      </div>

</div>

<a href="#modal">Call the modal with data-remodal-id="modal"</a> -->


<?php
// If is Gallery
if ( is_page(116) ) : ?>
    <div class="banner">
        <!-- START: Slick slider -->
        <?php include("slider.php"); ?>
        <!-- END: Slick slider -->
    </div>
<?php endif; ?>



<?php
// If is Video
if ( is_page(8) ) : ?>
    <div class="banner">
        <div class="video-wrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/DJDQaroUHK4" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
<?php endif; ?>


<?php
// If is Map
if ( is_page(113) ) : ?>
<div class="banner">

    <div class="banner_img">
        <figure>
            <img src="<?php the_post_thumbnail_url( $post_thumbnail_id ); ?>" width="1257" height="501" alt="<?php bloginfo('name'); ?>">
        </figure>
    </div>

</div>
<?php endif; ?>


<?php
// If is not Video, Gallery, Explore
if ( !is_page( array(8, 116, 113) ) ) : ?>

    <?php if( get_the_post_thumbnail_url( $post_thumbnail_id ) ) : ?>
        <!-- Image -->
        <div class="banner banner--vh" style="background-image: url('<?php the_post_thumbnail_url( $post_thumbnail_id ); ?>')">
    <?php else : ?>
        <!-- Placeholder Image -->
        <div class="banner banner--vh" style="background-image: url('<?php echo site_url(); ?>/wp-content/uploads/2016/11/placeholder.jpg')">
    <?php endif; ?>

    <div class="banner_in">
        <div class="banner_cnt">
            <div class="banner_sec">
                <?php if ( is_front_page() ) : ?>

                <div class="banner_blk <?php echo $className ?>">
                    <h1><?php bloginfo('name'); ?></h1>
                    <h4><?php bloginfo('description'); ?></h4>

                <?php elseif ( is_page(113) ) : ?>

                <?php else : ?>
                    <div class="banner_blk <?php echo $className ?>">
                        <?php the_title('<h1>','</h1>') ?>
                        <h4><?php the_field('subtitle') ?></h4>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
