
            <footer class="footer">

                <figure>
                    <a href="<?php echo home_url(); ?>">
                        <svg class="footer-logo__svg">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-mathevies-logo-white"></use>
                        </svg>
                    </a>
                </figure>

                <p class="para-margin">
                    <strong>Domaine des Mathevies</strong><br>
                    Les Mathevies, 24200, Sainte Nathalène, France
                </p>

                <p class="para-margin">
                    <span class="footer-span"><strong>T:</strong> <a href="tel: +33 (0)5 53 59 20 86">+33 (0)5 53 59 20 86</a> <span class="hide-below--small">/</span></span> <span class="footer-span"><strong>M:</strong> <a href="tel: +33 (0) 614 10 95 86">+33 (0) 614 10 95 86</a> <span class="hide-below--small">/</span></span> <span class="footer-span"><strong>E:</strong> <a href="mailto: info@mathevies.com">info@mathevies.com</a></span>
                </p>

                <div class="small-copy">
                    <p class="copyright">&copy;<?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.

                    <?php
                        // If English
                        if(ICL_LANGUAGE_CODE=='en') : ?>
                        <a href="<?php echo site_url(); ?>/terms-and-conditions">Terms &amp; Conditions.</a>

                        <?php
                        // If Dutch
                        elseif(ICL_LANGUAGE_CODE=='nl') : ?>
                        <a href="<?php echo site_url(); ?>/algemene-boekingsvoorwaarden/?lang=nl">Algemene boekingsvoorwaarden.</a>

                        <?php
                        // If French
                        elseif(ICL_LANGUAGE_CODE=='fr') : ?>
                        <a href="<?php echo site_url(); ?>/conditions-de-reservation/?lang=fr">Conditions de reservation.</a>

                    <?php endif; ?>


                    </p>
                </div>

            </footer>


            <!-- START: Slick slider -->
            <?php include("partials/social.php"); ?>
            <!-- END: Slick slider -->


			</div> <!-- container END -->
		</div> <!-- wrapper END -->


		<?php wp_footer(); ?>

	</body>
</html>
