<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/build/img/favicon.png">

        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php
			//Include SVG Sprite
			include('assets/build/svg-sprite.svg');
		?>

        <div class="wrapper">
            <div class="wrapper__inner">

                <!-- START: Menu -->
                <?php include("partials/menu.php"); ?>
                <!-- END: Menu -->

                <!-- START: Header content -->
                <header class="header">

                    <div class="header__wrapper">

                        <div class="logo">
                            <a href="<?php echo home_url(); ?>">
                                <svg class="logo__svg">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-mathevies-logo"></use>
                                </svg>
                            </a>
                        </div>

                        <div class="header_rt clear">

                            <div class="header_rt_blk1">

								<?php function language_selector_flags(){
								$languages = icl_get_languages('skip_missing=0');
								if(!empty($languages)){
									foreach($languages as $l){
										if(!$l['active']) echo '<a href="'.$l['url'].'">';
										//echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> ';
										echo icl_disp_language($l['native_name'], $l['translated_name']);
										if(!$l['active']) echo '</a>';
									}
								}
							}

							language_selector_flags();

							?>


                            </div>

                            <div class="header_rt_blk2 clear">
                                <button class="c-hamburger c-hamburger--htx  menu_icon"><span></span</button>
                            </div>

                        </div>

                    </div>

                    <!-- START: Subnavigation -->
                    <?php include("partials/subnavigation.php"); ?>
                    <!-- END: Subnavigation -->

                </header>
                <!-- END: Header content -->

                <!-- START: Banner content -->
                <?php include("partials/hero-banner.php"); ?>
                <!-- END: Banner content -->

                <!-- START: Date - info dtrip -->
                <?php include("partials/notifications-banner.php"); ?>
                <!-- END: Date - info dtrip -->
