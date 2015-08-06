<?php
/**
 * category.php
 *
 * The template for displaying category pages.
 * @package Theme_Material
 * GPL3 Licensed
 */
?>
<style>
    |.page-header h3{
         font-family: Georgia;
    }
    |.entry-header h1{
         font-family: Georgia
    }
</style>

<?php get_header(); ?>

  <div class="main-content col-md-9" role="main">
    <?php if ( have_posts() ) : ?>
<!--       <header class="page-header">
        <h3>
          <?php
            printf( __( '%s', 'material' ), single_cat_title( '', false ) );
          ?>
        </h3>

        <?php
          // Show an optional category description.
          if ( category_description() ) {
            echo '<p>' . category_description() . '</p>';
          }
        ?>
      </header> -->

      <?php while( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('subcat-template'); ?>>
          <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if ( has_post_thumbnail()) :
              the_post_thumbnail('medium');
            else: ?>
              <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
          </a><!-- /post thumbnail -->
          <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          <?php wpeExcerpt('wpeExcerpt20'); ?>
        </article>



      <?php endwhile; ?>

      <?php material_paging_nav(); ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
  </div> <!-- end main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
