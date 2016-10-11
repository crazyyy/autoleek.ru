<?php 
/**
 * content.php
 *
 * The default template for displaying content.
 * @package Theme_Material
 * GPL3 Licensed
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article header -->
	<header class="entry-header"> <?php
		// If the post has a thumbnail and it's not password protected
		// then display the thumbnail
		if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
		<?php endif;

		// If single page, display the title
		// Else, we display the title in a link
		if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>
	</header> <!-- end entry-header -->

	<!-- Article content -->
	<div class="entry-content">

		<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading &rarr;', 'material' ) );

				wp_link_pages();
			}	
?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Внутренний статьи -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2990418069799616"
     data-ad-slot="5858721689"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div> <!-- end entry-content -->
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>	
	<!-- Article footer -->
	<footer class="entry-footer">
	<?php 
			// If we have a single page and the author bio exists, display it
/*			if ( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'material' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta( 'description' ) . '</p>';
			}*/
		material_post_meta2();

		?>
	</footer> <!-- end entry-footer -->
</article>
