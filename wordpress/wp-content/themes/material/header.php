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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2990418069799616",
    enable_page_level_ads: true
  });

</script>
<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter33720309 = new Ya.Metrika({ id:33720309, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/33720309" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78488741-1', 'auto');
  ga('send', 'pageview');

</script>

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