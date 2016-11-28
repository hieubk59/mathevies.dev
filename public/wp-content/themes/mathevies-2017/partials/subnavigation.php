<?php

    // Loop through the sub-pages of your custom post type
    $childpages = new WP_Query( array(
        'post_type'      => 'page',
        'post_parent'    => $post->ID,
        'posts_per_page' => -1,
        'orderby'        => 'menu_order'
    ));

    if($childpages->have_posts()) : ?>

        <ul class="js-scrollspy-nav subnavigation" id="top-menu" data-subnavigation>

            <?php while ( $childpages->have_posts() ) : $childpages->the_post();

            // Get post slug
            $slugName =  $post->post_name;

            // Get post ID
            $postID =  $post->ID;

            ?>

            <li class="subnavigation__title" data-subnavigation>
                <a href="#<?php echo $slugName; ?>" class="subnavigation__link"><?php the_title(); ?></a>
            </li>

            <?php endwhile; wp_reset_query(); ?>

        </ul>

<?php endif; ?>
