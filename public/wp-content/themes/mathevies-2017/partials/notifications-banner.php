<div class="dates clear">

    <section class="dates__lf">
        <h4 class="dates__open-from"><span class="dates__title">Open from:</span> <?php the_field('open', 'options'); ?><span class="dates__title"> - </span><?php the_field('closed', 'options'); ?></h4>
    </section>

    <div class="dates__rt">
        <a href="<?php echo site_url(); ?>/reservations" class="button" role="button"><span>General inquiry</span></a>
        <a href="<?php echo site_url(); ?>/reservations" class="button" role="button"><span>Book a pitch</span></a>
        <a href="<?php echo site_url(); ?>/reservations" class="button" role="button"><span>Book a gîte</span></a>
    </div>

</div>
