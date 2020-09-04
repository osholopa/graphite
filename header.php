<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Graphite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- JQuery -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/jquery-3.5.1.min.js'; ?>">
	</script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/bootstrap.min.js'; ?>">
	</script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.min.css'; ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('menu-open'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'graphite' ); ?></a>

	<header id="masthead" class="site-header page-header">
		<div class="site-branding">
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div class="trigger-menu-wrapper">
				<div class="site-title">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php echo get_bloginfo('description'); ?></p>
				</div>
				<button class="menu-toggle trigger-menu" aria-controls="primary-menu" aria-expanded="false">|||<!--<?php esc_html_e( 'Menu', 'graphite' ); ?>--></button>

				<!-- Desktop Menu -->
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_class'	 => 'desktop-menu',
							'container_class' => 'desktop-menu-container',
						)
					);
					?>

			</div>
			<!-- Mobile menu -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'	 => 'menu'
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
