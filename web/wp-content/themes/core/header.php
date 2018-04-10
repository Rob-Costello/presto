<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package The Box
 * @subpackage Reward Tagz
 * @since Reward Tagz 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!-- Google Tag Manager -->
<!--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--        })(window,document,'script','dataLayer','GTM-M9HXNT');</script>-->
    <!-- End Google Tag Manager -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css' />
    <![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section id="main-header" class="row">
    <div class="small-12 medium-6 columns">
        <a href="/"><img id="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/reward-tagz-logo.svg"></a>
    </div>
    <div class="small-12 medium-6 columns" id="main-menu">
    <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
        <li>
            <?php if(is_user_logged_in()) { ?>
                <a href="<?php echo wp_logout_url( '/' ); ?>">Logout</a>
            <?php } else { ?>
                <a href="/my-account/">Login</a>
            <?php } ?>
        </li>
        <li>
            <a href="#">Menu</a>
            <?php wp_nav_menu( array( 'menu' => 'Main Menu', 'theme_location' => 'header-menu', 'menu_class' => 'vertical menu', 'container' => 'ul', 'container_class' => '', 'sort_column' => 'menu_order' ) ); ?>
        </li>
    </ul>
    </div>
</section>

<div id="sequence" class="seq">

    <div class="seq-screen">
      <ul class="seq-canvas">

        <li class="seq-step1" id="step1" style="background-image: url('/wp-content/themes/core/images/banner-cover-lost-phone.jpg');">
          <?php if(is_front_page()){ ?>
            <div class="seq-content">
            
            <h3 data-seq class="seq-subtitle">YOUR <strong>LOST</strong></h3> 
            <h2 data-seq class="seq-title">ITEMS RETURNED</h2>
            <h3 data-seq class="seq-subtitle">TO <strong>YOU</strong></h3>
            <!--<a class="seq-button" href="" target="_blank" tabindex="-1">Find Out More →</a>-->
            
          </div>
          <?php } ?>
        </li>

        <li class="seq-step2" id="step2">
          <!-- <div class="seq-content">
            <h2 data-seq class="seq-title">Create Unique Animated Themes</h2>
            <h3 data-seq class="seq-subtitle">For sliders, presentations, <br />banners, and other step-based applications</h3>
            <a class="seq-button" href="http://sequencejs.com/" target="_blank" tabindex="-1">Find Out More →</a>
          </div> -->
        </li>

<!--         <li class="seq-step3" id="step3">
          <div class="seq-content">
            <h2 data-seq class="seq-title">Rapid Development of Step-Based Animated  Applications</h2>
            <h3 data-seq class="seq-subtitle">All of the JavaScript functionality you need built-in, so you can concentrate on substance and style</h3>
            <a class="seq-button" href="http://sequencejs.com/" target="_blank" tabindex="-1">Find Out More →</a>
          </div>
        </li> -->

      </ul>
    </div>

<!--     <ul rel="sequence" class="seq-pagination" role="navigation" aria-label="Pagination">
      <li><a href="#step1" rel="step1" title="Go to slide 1">Powered by Sequence.js</a></li>
      <li><a href="#step2" rel="step2" title="Go to slide 2">Create Unique Animated Themes</a></li>
      <li><a href="#step3" rel="step3" title="Go to slide 3">Rapid Development of Step-Based Animated Applications</a></li>
    </ul> -->
  </div>

<div id="cta-buttons" class="row small-up-1 medium-up-3 large-up-3">
    
    <div class="column column-block">
        <a href="/shop/">
            <div class="content">
                <i class="tag"></i>
            </div>
            <h3>BUY TAGZ</h3>
        </a>
    </div>
    <div class="column column-block">
        <a href="/rt/">
            <div class="content">
                <i class="power"></i>
            </div>
            <h3>ACTIVATE TAGZ</h3>
        </a>
    </div>
    <div class="column column-block">
        <a href="/rt/">
            <div class="content">
                <i class="return"></i>
            </div>
            <h3>RETURN ITEM</h3>
        </a>
    </div>

</div>