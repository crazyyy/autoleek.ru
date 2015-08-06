<?php
/**
 * header.php
 *
 * The header for the theme.
 * @package Theme_Material
 * GPL3 Licensed
 */
?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- HEADER -->
  <header class="site-header" role="banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 banner">
          <img class="site-banner" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>"  alt="" />
        </div><!-- /.col-xs-12 -->
      </div><!-- /.row -->
    </div> <!-- end banner -->
    <div class="container header-contents">
      <div class="row">
        <div class="col-xs-9 sitelogo">
          <div class="site-logo">
            <?php if ( is_front_page() && is_home() ){ } else { ?>
              <a href="<?php echo home_url(); ?>" rel="home">
                <?php  } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
                <?php bloginfo( 'name' ); ?>
                <?php if ( is_front_page() && is_home() ){
                } else { ?>
              </a>
            <?php } ?>
            <span> Устройство и эксплуатация автомобиля</span>
            <div class="tagline"><?php echo get_bloginfo ( 'description' );?></div>
          </div> <!-- end site-logo -->
        </div> <!-- end col-xs-3 -->
        <div class="col-xs-12">
          <nav class="site-navigation navbar navbar-default navbar-mv-up" role="navigation">
          <div class="menu-short-container container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed navbar-color-mod" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only"><?php echo __( 'Toggle navigation', 'material' )  ?></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse header-nav" id="bs-example-navbar-collapse-1">
                  <?php wpeHeadNav(); ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div> <!-- end col-xs-9 -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </header> <!-- end site-header -->


  <!-- MAIN CONTENT AREA -->
  <div class="container">
    <div class="row">
