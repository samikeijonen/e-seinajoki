<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asioi_Seinäjoki
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="grid-footer-wrapper">
				<?php
				$logo_url = get_template_directory_uri() . '/assets/images/seinajoki_tekstilogo_w400.png';
				?>
				<div class="logo-wrapper logo-footer-wrapper">
					<a href="http://www.seinajoki.fi/"><img class="logo-footer logo" alt="<?php esc_html_e( 'Seinäjoki', 'e-seinajoki' ); ?>" src="<?php echo $logo_url; ?>"></a>
				</div>
				<?php
					// Get footer post meta.
					$footer_cl_1_title = e_seinajoki_get_post_meta( 'footer_cl_1_title' );
					$footer_cl_1_text  = e_seinajoki_get_post_meta( 'footer_cl_1_text' );
					$footer_cl_2_title = e_seinajoki_get_post_meta( 'footer_cl_2_title' );
					$footer_cl_2_text  = e_seinajoki_get_post_meta( 'footer_cl_2_text' );

					// Get footer emails.
					$footer_emails = e_seinajoki_get_post_meta( 'footer_emails' );

					// First column.
					if ( isset( $footer_cl_1_title ) && $footer_cl_1_title && isset( $footer_cl_1_text ) && $footer_cl_1_text ) :

						echo '<div class="footer-area footer-area-1">';
						if ( isset( $footer_cl_1_title ) && $footer_cl_1_title ) :
							echo '<h2 class="footer-area-title">' . esc_html( $footer_cl_1_title ) . '</h2>';
						endif;

						if ( isset( $footer_cl_1_text ) && $footer_cl_1_text ) :
							echo wpautop( wp_kses_post( $footer_cl_1_text ) );
						endif;

						if ( isset( $footer_emails ) && $footer_emails ) :
							echo '<p>';
							foreach ( $footer_emails as $footer_emails ) :
								if ( isset( $footer_emails['email'] ) && $footer_emails['email'] ) :
									echo '<a href="mailto:' . antispambot( $footer_emails['email'] ) . '">' . antispambot( $footer_emails['email'] ) . '</a><br>';
								endif;
							endforeach;
							echo '</p>';
						endif;
						echo '</div><!-- .footer-area-1 -->';

					endif;

					// Second column.
					if ( isset( $footer_cl_2_title ) && $footer_cl_2_title && isset( $footer_cl_2_text ) && $footer_cl_2_text ) :

						echo '<div class="footer-area footer-area-1">';
						if ( isset( $footer_cl_2_title ) && $footer_cl_2_title ) :
							echo '<h2 class="footer-area-title">' . esc_html( $footer_cl_2_title ) . '</h2>';
						endif;
						if ( isset( $footer_cl_2_text ) && $footer_cl_2_text ) :
							echo wpautop( wp_kses_post( $footer_cl_2_text ) );
						endif;
						echo '</div><!-- .footer-area-1 -->';

					endif;

				get_template_part( 'menus/menu', 'social' ); ?>

			</div><!-- .grid-footer-wrapper -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
