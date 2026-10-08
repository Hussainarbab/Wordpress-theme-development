<footer class="site-footer">
	<div class="site-footer-inner">
		<div class="footer-brand">
			<a class="footer-site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_theme_mod( 'my_first_theme_brand_name', __( 'Nexa Studio', 'my-first-theme' ) ) ); ?></a>
			<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'my-first-theme' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<p class="copyright">
			<?php
			printf(
				/* translators: 1: current year, 2: site name */
				esc_html__( '© %1$s %2$s. All rights reserved.', 'my-first-theme' ),
				esc_html( gmdate( 'Y' ) ),
				esc_html( get_theme_mod( 'my_first_theme_brand_name', __( 'Nexa Studio', 'my-first-theme' ) ) )
			);
			?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
