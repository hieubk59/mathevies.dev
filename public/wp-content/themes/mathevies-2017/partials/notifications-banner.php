<div class="dates clear">

    <section class="dates__lf">
        <div class="dates__open-from"><span class="dates__title">Open from:</span> <?php the_field('open', 'options'); ?><span class="dates__title"> - </span><?php the_field('closed', 'options'); ?></div>
    </section>

    <div class="dates__rt">

        <?php if( !is_page(311) ) : ?>
            <a href="<?php echo site_url(); ?>/general-enquiry" class="button" role="button"><span>General inquiry</span></a>
        <?php endif; ?>

        <?php if( !is_page(124) ) : ?>
            <a href="<?php echo site_url(); ?>/reservations" class="button" role="button"><span>Make a booking</span></a>
        <?php endif; ?>

    </div>

</div>


<?php
    if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
        yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs">','</div>');
    }
?>
