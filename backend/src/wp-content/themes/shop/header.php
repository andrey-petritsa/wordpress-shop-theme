<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<header>
    <a href="#" class="burger"><span></span></a>
    <nav class="nav">
        <a href="/#main" class="nav__link">Торговое оборудование</a>
        <a href="/#instruction" class="nav__link">Как сделать заказ</a>
        <a href="/#question" class="nav__link">Оставить заявку</a>
        <a href="/#contact" class="nav__link">Контакты</a>
    </nav>
    <a href="" class="telephone">+7701-768-59-09</a>
</header>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>





