<?php get_header(); ?>

<main id="main-content" class="archive-layout">
	<header class="archive-header">
		<p class="eyebrow"><?php esc_html_e( 'Search the site', 'my-first-theme' ); ?></p>
		<h1>
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Results for “%s”', 'my-first-theme' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'card' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination( array( 'class' => 'pagination' ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
