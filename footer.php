<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Graphite
 */

?>

	<footer id="colophon" class="site-footer container">
		<div class="site-info">
			<p>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. All rights reserved</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/mobileNavigation.js'; ?>">
</script>
</body>
</html>
