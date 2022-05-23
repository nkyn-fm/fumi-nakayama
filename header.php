<?php
if(!is_home()):
if(is_page('web')):
$userArray = array(
    "nkyn" => "fmfm5550"
);
basic_auth($userArray);
endif;
endif;
?>
<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=3.0,user-scalable=yes" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11">
        <meta name="format-detection" content="telephone=no">

      <?php get_template_part('inc/meta'); ?>
        <link rel="shortcut icon" href="/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/common.css" rel="stylesheet">
        <?php if( is_home() || is_front_page() ) : ?>
        <link href="<?php echo get_template_directory_uri(); ?>/css/home.css" rel="stylesheet">
        <?php else:?>
        <link href="<?php echo get_template_directory_uri(); ?>/css/second.css" rel="stylesheet">
        <?php endif; ?>
        <?php wp_head(); ?>
        <?php if( is_page('web') ) : ?>
        <meta name="robots" content="noindex">
        <?php endif; ?>
    </head>

    <body <?php body_class( $class ); ?> oncontextmenu="return false;">
        <header id="header">
            <?php if ( is_home() || is_front_page() ) : ?>
            <h1 class="logo eng"><span>Photographer</span>Fumi Nakayama</h1>
            <?php else : ?>
            <div class="logo eng"><a href="<?php echo home_url(); ?>"><span>Photographer</span>Fumi Nakayama</a></div>
            <?php endif; ?>
            <div class="menu"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
            <nav>
                <ul class="gmenu">
                    <li><a href="<?php echo home_url(); ?>" class="eng">Home</a></li>
                    <li>
                        <?php if ( is_page('portfolio') ) : ?>
                        <h1><a href="<?php echo home_url(); ?>/portfolio/" class="eng current">Portfolio</a></h1>
                        <?php else: ?>
                        <a href="<?php echo home_url(); ?>/portfolio/" class="eng">Portfolio</a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ( is_page('about') ) : ?>
                        <h1><a href="<?php echo home_url(); ?>/about/" class="eng current">About</a></h1>
                        <?php else: ?>
                        <a href="<?php echo home_url(); ?>/about/" class="eng">About</a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ( is_category('information') ) : ?>
                        <h1><a href="<?php echo home_url(); ?>/information/" class="eng current">Information</a></h1>
                        <?php else: ?>
                        <a href="<?php echo home_url(); ?>/information/" class="eng">Information</a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ( is_page('contact') ) : ?>
                        <h1><a href="<?php echo home_url(); ?>/contact/" class="eng current">Contact</a></h1>
                        <?php else: ?>
                        <a href="<?php echo home_url(); ?>/contact/" class="eng">Contact</a>
                        <?php endif; ?>
                    </li>
                </ul>
                <div class="sns">
                    <a href="https://twitter.com/nkyn_photo" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon_twitter.svg" alt="Twitter"></a>
                    <a href="https://www.instagram.com/nkyn_photo/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon_insta.svg" alt="Instagram"></a>
                    <a href="https://www.youtube.com/channel/UC_XlqaYwCOzI2SzuNHSCqVw" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon_youtube.svg" alt="YouTube"></a>
                </div>
            </nav>
        </header>
        
        <?php if( is_page( array('portfolio','about') ) ) : ?>
        <div id="splash">
            <div id="splash_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo_fumi.svg" alt=""></div>
            <div class="race-by"></div>
        </div>
        <?php elseif ( is_home() || is_front_page() ) : ?>
        <div id="splash">
            <div id="splash_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo_fumi.svg" alt=""></div>
            <div class="race-by"></div>
        </div>
        <?php else: ?>
        <?php endif; ?>
