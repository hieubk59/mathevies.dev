<?php

// If is gallery
if( is_page(116) ) {
    $images = get_field('images', 116);
} else {
    $images = get_field('images');
}

if( $images ): ?>

    <div class="slick-slider" data-slider>
        <?php foreach( $images as $image ): ?>
            <div>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="slick__image" />

                <!-- If has caption -->
                <?php if( $image['caption'] ) : ?>
                    <p><?php echo $image['caption']; ?></p>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
