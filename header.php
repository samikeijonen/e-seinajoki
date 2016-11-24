<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asioi_Seinäjoki
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'e-seinajoki' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div class="grid-wrapper">
				<?php
				$logo_url = get_template_directory_uri() . '/assets/images/seinajoki_logo_550x301.png';
				?>
				<div class="logo-wrapper logo-header-wrapper">
					<img class="logo-header logo" alt="<?php esc_html_e( 'Seinäjoki blue logo', 'e-seinajoki' ); ?>" src="<?php echo $logo_url; ?>">
				</div>
				<div class="site-branding">
					<?php
					if ( is_front_page() ) : ?>
						<h1 class="site-title"><?php echo single_post_title(); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;

					if ( is_front_page() ) :
						// Get post content in header.
						global $post;
						$post = get_post( get_the_ID() );
						setup_postdata( $post );
						the_content();
						wp_reset_postdata();
					endif;
					?>

				</div><!-- .site-branding -->

				<?php get_template_part( 'menus/menu', 'social' ); ?>

			</div><!-- .grid-wrapper -->
		</div><!-- .wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
