<?php
/**
 * Social links menu.
 *
 * @package Asioi_Seinäjoki
 */
?>

<?php
	if ( ! has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location.
		return;
	endif;
?>
	<nav class="menu-social social-navigation menu" role="navigation">

		<?php
		$social_title = e_seinajoki_get_post_meta( 'footer_social_title' );
		if ( isset( $social_title ) && $social_title ) :
			echo '<h2 class="footer-area-title social-media-title">' . esc_html( $social_title ) . '</h2>';
		endif;

		wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'container_class' => 'social-menu-wrapper',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-social-items',
				'depth'           => 1,
				'link_before'     => '<span class="screen-reader-text">',
				'link_after'      => '</span>' . e_seinajoki_get_svg( array( 'icon' => 'chain' ) ),
				'fallback_cb'     => '',
			)
		);
		?>

	</nav><!-- .menu-social -->
