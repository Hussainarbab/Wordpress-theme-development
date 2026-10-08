<?php get_header(); ?>

<main id="main-content" class="not-found">
	<p class="eyebrow"><?php esc_html_e( 'Error 404', 'my-first-theme' ); ?></p>
	<h1><?php esc_html_e( 'This page took a different path.', 'my-first-theme' ); ?></h1>
	<p><?php esc_html_e( 'The page may have moved or the address may be incorrect. Try a search or head back to the homepage.', 'my-first-theme' ); ?></p>
	<?php get_search_form(); ?>
	<p><a class="button button-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to homepage', 'my-first-theme' ); ?> <span aria-hidden="true">↗</span></a></p>
</main>

<?php get_footer(); ?>
