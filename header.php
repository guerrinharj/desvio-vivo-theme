<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Desvio_Vivo_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'desvio-vivo-theme' ); ?></a>

	<header id="masthead" class="site-header">

	<div class="logo">

			
		<div class="logo-container"> 
			<a href="<?php bloginfo('url'); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/desvio_marca_preto.png" alt="Logo" />
			</a>
		</div>	

		<div class="back"> 
		<a href="<?php bloginfo('url'); ?>">
		&larr;
		</a>
	</div>


	</div>


		
	</header><!-- #masthead -->
