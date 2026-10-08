<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'my-first-theme' ); ?></a>

<header class="site-header">
	<div class="site-header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
			<?php $site_description = get_bloginfo( 'description', 'display' ); ?>
			<?php if ( $site_description ) : ?>
				<p class="site-description"><?php echo esc_html( $site_description ); ?></p>
			<?php endif; ?>
		</div>

		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
			<span class="menu-toggle-label"><?php esc_html_e( 'Menu', 'my-first-theme' ); ?></span>
			<span class="menu-toggle-icon" aria-hidden="true"><span></span><span></span><span></span></span>
		</button>

		<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'my-first-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'wp_page_menu',
				)
			);
			?>
		</nav>
	</div>
</header>
