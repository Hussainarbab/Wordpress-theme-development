<?php get_header(); ?>

<main id="main-content" class="page-content">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-featured-image"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<div class="entry-content">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'my-first-theme' ),
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
