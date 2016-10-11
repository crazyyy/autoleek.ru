<?php
/**
 * functions.php
 * Based on Adi Purdila's Alpha WordPress Framework
 * @package Theme_Material
 * GPL3 Licensed
 */

/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Define constants.
 * ----------------------------------------------------------------------------------------
 */
define( 'MATERIAL_THEMEROOT', get_stylesheet_directory_uri() );

include_once('json-rest-api/plugin.php');
define( 'ACF_LITE', true );
include_once('acf/acf.php');
include_once('acf-repeater/acf-repeater.php');
/* advanced custom fields */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_video',
    'title' => 'Видео',
    'fields' => array (
      array (
        'key' => 'field_55c36e54ab933',
        'label' => 'Видео',
        'name' => 'video',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_55c36e65ab934',
            'label' => 'iframe',
            'name' => 'iframe',
            'type' => 'textarea',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'formatting' => 'html',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Добавить видео',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}



/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * ----------------------------------------------------------------------------------------
 */
require_once( get_template_directory() . '/framework/widget-social-links.php' );


/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}




/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_setup' ) ) {
	function material_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = MATERIAL_THEMEROOT . '/languages';
		load_theme_textdomain( 'material', $lang_dir );

		/**
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * Add support for automatic feed links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

	}

	add_action( 'after_setup_theme', 'material_setup' );
}
function wpeExcerpt10($length) {
    return 10;
}
function wpeExcerpt20($length) {
    return 20;
}
function wpeExcerpt40($length) {
    return 40;
}
function wpeExcerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}
/**
 * ----------------------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_post_meta' ) ) {
	function material_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i></li>';
			}

			// Get the date.

            printf(
				'<li class="meta-date">'.__(' Posted on ','material').'<a href="%1$s" rel="date">%2$s</a></li>',
				esc_url( get_permalink()),
				get_the_date()
			);

			// Get the post author.
			printf(
				'<li class="meta-author">'.__(' by ','material').'<a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

		}
	}
}

if ( ! function_exists( 'material_post_meta2' ) ) {
	function material_post_meta2() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . __('Tagged with ','material'). $tag_list . ' </li>';
			}

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li class="meta-edit"><i class="fa fa-pencil-square-o"></i>';
				edit_post_link( __( 'Edit', 'material' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}

		}
	}
}
// WPE head navigation
function wpeHeadNav()
{
  wp_nav_menu(
  array(
    'theme_location'  => 'header-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="menu-menu" class="site-menu">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE footer navigation
function wpeFootNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'footer-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="footernav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE sidebar navigation
function wpeSideNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'sidebar-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="sidebarnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
//  Register WPE Navigation
function register_html5_menu() {
  register_nav_menus(array(
    'header-menu' => __('Меню в шапке', 'wpeasy'),
    'sidebar-menu' => __('Меню в сайдбар', 'wpeasy'),
    'footer-menu' => __('Меню в подвал', 'wpeasy')
  ));
}
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

function wpa_category_nav_class( $classes, $item ){
  if( 'category' == $item->object ){
    $classes[] = 'menu-category-' . $item->object_id;
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'wpa_category_nav_class', 10, 2 );

//  Catch first image from post and display it
function catchFirstImage() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
    $first_img = get_template_directory_uri() . '/images/noimage.jpg'; }
    return $first_img;
}

function subh_get_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = get_post_meta( $postID, $count_key, true );
 if ( $count == '' ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );

 return '0 View';
 }

 return $count . ' Views';
}

/**
 * To count number of views and store in database.
 *
 * @param $postID currently viewed post/page
 */
function subh_set_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = (int) get_post_meta( $postID, $count_key, true );
 if ( $count < 1 ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );
 } else {
 $count++;
 update_post_meta( $postID, $count_key, (string) $count );
 }
}

/**
 * Add a new column in the wp-admin posts list
 *
 * @param $defaults
 *
 * @return mixed
 */
function subh_posts_column_views( $defaults ) {
 $defaults['post_views'] = __( 'Views' );

 return $defaults;
}

/**
 * Display the number of views for each posts
 *
 * @param $column_name
 * @param $id
 *
 * @return void simply echo out the number of views
 */
function subh_posts_custom_column_views( $column_name, $id ) {
 if ( $column_name === 'post_views' ) {
 echo subh_get_post_view( get_the_ID() );
 }
}

add_filter( 'manage_posts_columns', 'subh_posts_column_views' );
add_action( 'manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2 );


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_paging_nav' ) ) {
	function material_paging_nav() { ?>
		<ul class="pager">
			<?php
				if ( get_next_posts_link() ) : ?>
				<li class="prev">

					<?php next_posts_link( __( '<i class="fa fa-angle-double-left"></i> Older Posts', 'material' ) ); ?>
				</li>
				<?php endif;
			 ?>
			<?php
				if ( get_previous_posts_link() ) : ?>
				<li class="nxt">
					<?php previous_posts_link( __( 'Newer Posts <i class="fa fa-angle-double-right"></i>', 'material' ) ); ?>

				</li>
				<?php endif;
			 ?>

		</ul> <?php
		/*start php script*/
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_widget_init' ) ) {
	function material_widget_init() {

		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'material' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'material' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
                                        'orderby'       => 'id',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'material' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'material' ),
					'before_widget' => '<div id="%1$s" class="widget col-md-3 %2$s">',
                                        'orderby'       => 'id',
                                        'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'material_widget_init' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_validate_length' ) ) {
	function material_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_load_wp_head' ) ) {

	function material_load_wp_head() {

		  $banner = get_template_directory_uri()."/images/banner.png";
		// Add theme support for Custom Header
		$header_args = array(
			'default-image'          => $banner,
			'default-text-color'     => 'fff',
			'header-text'			 => false,
			'flex-width'			 => true,
			'width'					 => '1920',
			'height'				 => '150',
			'uploads'                => true,
			'admin-preview-callback' => 'material_admin_header_image_preview',
		);

        $background_args = array(
              'default-color'          => 'eee',
//            'default-image'          => '',
//            'default-repeat'         => '',
//            'default-position-x'     => '',
//            'default-attachment'     => '',
//            'wp-head-callback'       => '_custom_background_cb',
//            'admin-head-callback'    => '',
//            'admin-preview-callback' => ''
        );

		function material_admin_header_image_preview(){

			$header_image = get_header_image();

			if ( ! empty( $header_image ) ) : ?>

			<div id="headimg" style="height: 100px; margin-bottom:-70px; background: #428bca url('<?php header_image(); ?>') no-repeat left top">
			<?php else : ?>

			<div id="headimg" style="height: 100px; margin-bottom:-70px; background: #428bca url('<?php echo $banner; ?>') no-repeat left top">
			<?php endif; ?>

			</div>

			<h1 style="color:#fff;padding-left:10px;font-size:36px;"> <?php bloginfo( 'name' ); ?> </h1>

			 <?php
		}


			add_theme_support( 'custom-header', $header_args );
            add_theme_support( 'custom-background', $background_args );



		}

	add_action( 'after_setup_theme', 'material_load_wp_head' );

}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts and stylesheets for the theme.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'material_scripts' ) ) {
	function material_scripts() {
		// Adds support for pages with threaded comments (reply form for desktop)
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load scripts
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/javascripts/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'material-custom', get_template_directory_uri() . '/javascripts/main.js', array( 'jquery' ), false, true );

		// Load the stylesheets
		wp_enqueue_style( 'material-custom', MATERIAL_THEMEROOT . '/stylesheets/styles.css' );
        wp_enqueue_style( 'material-main', get_stylesheet_uri() );
	}

	add_action( 'wp_enqueue_scripts', 'material_scripts' );
}

// add ie conditional html5 shim to header
if ( ! function_exists( 'material_h5_script' ) ) {
    function material_h5_script() {
        echo '<!--[if lt IE 9]>';
        echo '<script src="' . get_template_directory_uri() . '/javascripts/html5shiv.js"></script>';
        echo '<![endif]-->';
}
    add_action('wp_head', 'material_h5_script');
}

/**
 * 11.0
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
if ( ! function_exists( 'material_name_wp_title' ) ) {
	function material_name_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'material_name_wp_title', 10, 2 );
}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Modify TinyMCE visual editor.
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'material_editor_styles' ) ) {

	function material_editor_styles() {
	    add_editor_style( MATERIAL_THEMEROOT . '/stylesheets/editor.css' );
	}

	add_action( 'after_setup_theme', 'material_editor_styles' );
}

add_filter('category_link', create_function('$a', 'return str_replace("category/", "", $a);'), 9999);

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'feed_links', 2 );
remove_action('wp_head','rel_canonical');
remove_action( 'wp_head', 'index_rel_link' );

// Удаляем title категорий
function removeTitle($str){
  $str = preg_replace('#title="[^"]+"#', '', $str);
  return $str;
}
add_filter("wp_list_categories", "removeTitle");

$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ( $filters as $filter ) {
remove_filter($filter, 'wp_filter_kses');
}
foreach ( array( 'term_description' ) as $filter ) {
remove_filter( $filter, 'wp_kses_data' );
}

// Настройки содержания записи

add_filter('the_content', 'make_contents');
function make_contents($content){
	global $_mc_contain, $left_adw_contents, $right_adw_contents, $auto_insert_contents, $noindex_contents, $min_amount_title_contents, $content_title_type;

	if($auto_insert_contents == 1 or $auto_insert_contents == 2){
		if( !is_singular() )
			return $content;
	}else{
		if( !is_singular() || strpos($content, '[contents')===false )
			return $content;
	}

	$_mc_contain = array();

	// получаем данные о содержании
	if($auto_insert_contents == 1 or $auto_insert_contents == 2){
		$content_morkovin = "[contents $content_title_type]".$content;
		preg_match('~\[contents\s*([^\]]*)\](.*)~s', $content_morkovin, $m);
	}else{
		preg_match('~\[contents\s*([^\]]*)\](.*)~s', $content, $m);
	}

	$hds = $m[1] ? trim($m[1]) : 'h2';
	$hds = explode(' ', $hds);
	$hds = array_map('trim', $hds);
	$h = implode('|', $hds);

	// заменяем заголовки в контенте на ссылки к меню
	$_content = $m[2];
	// считаем общее количество
	preg_match_all('@</('.$h.')>@i', $_content, $n);
	$_mc_contain['all'] = count($n[0]);
	$_content = preg_replace_callback('@<(?:'.$h.')[^>]*>(.*?)</('.$h.')>@is', '_make_contents', $_content);

	// вставляем содержание

	if(!is_front_page() and !is_page() and $_mc_contain['contents']) $contents = implode( "", $_mc_contain['contents'] );

	if($auto_insert_contents == 1 or $auto_insert_contents == 2){
		$_content1 = "";
	}else{
		$_content1 = $_content;
	}

	$out = '';
	if($left_adw_contents != "" and $right_adw_contents != "" and $_mc_contain['contents']){
		$out = '<!--noindex--><div class="table-of-content"><div class="table-of-content__title">Содержание</div>';
		$out .= "\n<ul id='с_menu' class='contents'>\n". $contents ."</ul>\n</div><!--/noindex-->". $_content1;	
	}
	elseif($left_adw_contents != "" and $_mc_contain['contents']){	
		$out = '<div class="contents-block"><div class="left-adw-contents-block">'.$left_adw_contents.'</div>';
		$out .= '<!--noindex--><div class="table-of-content content-right"><div class="table-of-content__title">Содержание</div>';
		$out .= "\n<ul id='с_menu' class='contents'>\n". $contents ."</ul>\n</div><!--/noindex--></div><!--.contents-block-->". $_content1;
	}elseif($right_adw_contents != "" and $_mc_contain['contents']){
		$out = '<div class="contents-block"><!--noindex--><div class="table-of-content content-left"><div class="table-of-content__title">Содержание</div>';
		$out .= "\n<ul id='с_menu' class='contents'>\n". $contents ."</ul>\n</div><!--/noindex-->";
		$out .= '<div class="right-adw-contents-block">'.$right_adw_contents.'</div></div><!--.contents-block-->'. $_content1;
	}
	elseif($_mc_contain['contents']){
		$out = '<!--noindex--><div class="table-of-content"><div class="table-of-content__title">Содержание</div>';
		$out .= "\n<ul id='с_menu' class='contents'>\n". $contents ."</ul>\n</div><!--/noindex-->". $_content1;	
	}

	if($auto_insert_contents == 1 and is_single() and $_mc_contain['all'] >= $min_amount_title_contents){
		$first_img_url = catch_that_image();
		$alt_img = get_the_title();
		$condition = '/<p><img.*? src=\"'.preg_quote($first_img_url, "/").'\"[^>]*><\/p>/i';
		$replace = '<div class="first-single-img"><img src="'.$first_img_url.'" alt="'.$alt_img.'"></div>'.$out;
		$content = preg_replace($condition, $replace, $_content);
	}elseif($auto_insert_contents == 2 and is_single() and $_mc_contain['all'] >= $min_amount_title_contents){
		$content = $out.$_content;
	}
	else{
		$content = str_replace($m[0], $out, $content);
	}


	unset($_mc_contain);

	return $content;
}
function _make_contents($match){
	global $_mc_contain;

	$anchor = $match[2] .'_'. ++$_mc_contain['n'] ;

	$li = "\t<li><a href=\"#$anchor\">$match[1]</a></li>\n";
	$index = (int) preg_replace("/[^0-9]/", '', $match[2]);
	$prev_index = ($r =(int) @end($_mc_contain['index'])) ? $r : null;
	$_mc_contain['index'][] = $index;

	// условия вывода содержания
	$close = $element = '';
	if( !isset($prev_index) || $prev_index == $index )
		$element = $li;

	elseif( $prev_index < $index ){
		++$_mc_contain['open'];
		$element = "\t<ul>\n$li";
	}
	else {
		if( $prev_index > $index ){
			$close = "\t</ul>\n$li";
			// убираем одну открытую
			--$_mc_contain['open'];
		} 
	}
	// закрываем если надо
	if( $_mc_contain['n'] == $_mc_contain['all'] && $_mc_contain['open'] ){
		$close = "\t</ul>\n";
	}

	$_mc_contain['contents'][] = "$element $close"; 

	$out = $_mc_contain['n'] == 1 ? '' : "";
	$out .= "<$match[2] id=\"$anchor\">$match[1]</$match[2]>";

	return $out;
}
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(!empty($first_img)) return $first_img;
}

//Выводить содержание автоматически после первой картинки ($auto_insert_contents = 1), автоматически в начало поста ($auto_insert_contents = 2) или не выводить автоматически ($auto_insert_contents = 3). 
//Если автоматический вывод содержания выключен — нужно использовать шорткод [contents].
$auto_insert_contents = 2;

//Реклама слева от содержания
$left_adw_contents = '';

//Реклама справа от содержания
$right_adw_contents = '';

//Минимальное количество заголовков в статье для отображения содержания
$min_amount_title_contents = 3;

//Типы заголовков, попадающие в содержание
//Через пробел нужно перечислить типы заголовков, попадающих в содержание ($content_title_type = "h2"; или $content_title_type = "h2 h3";)
$content_title_type = "h2";

//Удаляем цифровые дубли
function del_number_url_morkovin(){
$link = $_SERVER['REQUEST_URI'];
preg_match("/^(.+)\/([0-9]+)$/", $link, $matches);
if(is_single() and $matches[2])
{
global $wp_query;
$wp_query->set_404();
status_header(404);
}
}
add_action('wp', 'del_number_url_morkovin', -10);
?>