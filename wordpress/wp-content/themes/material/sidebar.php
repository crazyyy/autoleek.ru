<?php
/**
 * sidebar.php
 *
 * The primary sidebar.
 * @package Theme_Material
 * GPL3 Licensed
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <aside class="sidebar col-md-3" role="complementary">
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
      <div class="widget widget_popular_post">
        <h5 class="widget-title">Популярные записи</h5>
        <ul class="popular-post-container">
        <?php
          $args = array(
            'showposts'      => '7',
            'orderby'      => 'meta_value',
            'meta_key'     => 'post_views_count',
            'order'        => 'DESC',
            'post_status'  => 'publish'
          );
          $ranking = 0;
        ?>
        <?php query_posts($args); ?>
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts()) : the_post(); $ranking++; ?>

            <li class="popular-post-container">
              <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </li>

          <?php endwhile; else: endif;
          wp_reset_query(); ?>

        </ul><!-- popular-post-container -->
      </div><!-- widget_popular_post -->
      <?php
        // check if the repeater field has rows of data
        if( have_rows('video') ):
          echo '<div class="widget widget-video-post">';
          while ( have_rows('video') ) : the_row();
      ?>
            <?php the_sub_field('iframe'); ?>

      <?php
          endwhile;
          echo '</div><!-- /.widget widget-video-post -->';
          else : endif;
      ?>


  </aside> <!-- end sidebar -->
<?php endif; ?>
