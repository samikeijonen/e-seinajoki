<?php
/**
 * Template Name: Front page
 *
 * The template for displaying front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Asioi_Seinäjoki
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// Get info from post meta.
			$fp_infos = e_seinajoki_get_post_meta( 'fp_infos' );

			if ( isset( $fp_infos ) && $fp_infos ) :

				echo '<div class="grid-info-wrapper">';

				foreach ( $fp_infos as $fp_infos ) :
				?>

				<article class="hentry">
					<div class="entry-inner-wrapper">

						<?php
							if ( isset( $fp_infos['image'] ) && $fp_infos['image'] ) :
								echo '<header class="entry-media">';
									echo '<img class="entry-media-img" src="' . esc_url( $fp_infos['image'] ) . '" alt="">';
								echo '</header><!-- .entry-media -->';
							endif;
						?>

						<?php
							if ( isset( $fp_infos['title'] ) && $fp_infos['title'] ) :
								$title_color = isset( $fp_infos['title_color'] ) && $fp_infos['title_color'] ? 'style="background-color: #' . esc_attr( $fp_infos['title_color'] ) . '"' : '';
								echo '<header class="entry-header"' . $title_color . '>';
									echo '<h2 class="entry-title">' . esc_html( $fp_infos['title'] ) . '</h2>';
								echo '</header><!-- .entry-header -->';
							endif;
						?>

						<div class="entry-content">
							<?php
								echo wpautop( wp_kses_post( $fp_infos['content'] ) );
							?>
						</div><!-- .entry-content -->

					</div><!-- .entry-inner-wrapper -->
				</article><!-- #post-## -->

				<?php
				endforeach;
				echo '</div><!-- .grid-wrapper -->';
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
