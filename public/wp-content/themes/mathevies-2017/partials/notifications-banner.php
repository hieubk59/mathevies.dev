<div class="dates clear">

    <section class="dates__lf">
        <div class="dates__open-from"><span class="dates__title"><?php the_field('text', 'options'); ?></span> <?php the_field('open', 'options'); ?><span class="dates__title"> - </span><?php the_field('closed', 'options'); ?></div>
    </section>

    <div class="dates__rt">

        <?php
        // If English
        if(ICL_LANGUAGE_CODE=='en') : ?>

            <?php if( !is_page(311) ) : ?>
                <a href="<?php echo site_url(); ?>/general-enquiry" class="button" role="button"><span>General inquiry</span></a>
            <?php endif; ?>

            <?php if( !is_page(124) ) : ?>
                <a href="<?php echo site_url(); ?>/reservations" class="button" role="button"><span>Make a booking</span></a>
            <?php endif; ?>

        <?php
        // If Dutch
        elseif(ICL_LANGUAGE_CODE=='nl') : ?>

            <?php if( !is_page(311) ) : ?>
                <a href="<?php echo site_url(); ?>/contact/?lang=nl" class="button" role="button"><span>Algemeen onderzoek</span></a>
            <?php endif; ?>

            <?php if( !is_page(124) ) : ?>
                <a href="<?php echo site_url(); ?>/reserveren/?lang=nl" class="button" role="button"><span>Maak een boeking</span></a>
            <?php endif; ?>


            <?php
            // If French
            elseif(ICL_LANGUAGE_CODE=='fr') : ?>

                <?php if( !is_page(311) ) : ?>
                    <a href="<?php echo site_url(); ?>/faire-une-demande/?lang=fr" class="button" role="button"><span>Faire une demande</span></a>
                <?php endif; ?>

                <?php if( !is_page(124) ) : ?>
                    <a href="<?php echo site_url(); ?>/faire-une-reservation/?lang=fr" class="button" role="button"><span>Faire une réservation</span></a>
                <?php endif; ?>

        <?php endif; ?>


    </div>

</div>


<?php
    if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
        yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">','</div>');
    }
?>
