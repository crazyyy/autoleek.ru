<?php 
/**
 * 404.php
 *
 * The template for displaying 404 pages (Not Found).
 * @package Theme_Material
 * GPL3 Licensed
 */
?>
<style>
    |.container-404 h1{
          color: #F7971D;
    }
</style>

<?php get_header(); ?>
	<div class="main-content col-md-12" role="main">
	<div class="container-404">
		<h1><?php _e( 'Ошибка 404' ); ?></h1>
                                  <br>
		    <h2><?php _e( 'Запрашиваемая страница не найдена' ); ?></h2>
                                  <br>
                <p><?php _e( 'Возможные причины, по которым возникла эта ошибка:' ); ?></p>
                                  <br>
                          <ul>
                              <li>
                                  <strong>Неправильно указан адрес страницы</strong>
                                  <br>Проверьте правильность набора адреса страницы в адресной строке браузера<br>
                                  <br>
                              </li>
                              <li>
                                  <strong>Эта страница была удалена с сервера либо перемещена по другому адресу</strong>
                                  <br>Попробуйте найти интересующий Вас документ, используя навигацию по разделам сайта<br>
                                  <br>
                              </li>
                         </ul>
		<?php get_search_form(); ?>
	</div> <!-- end container-404 -->
	</div>
<?php get_footer(); ?>