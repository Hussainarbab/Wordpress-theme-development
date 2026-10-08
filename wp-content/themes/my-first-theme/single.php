<?php get_header(); ?>

<main id="main-content" class="page-content single-layout">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<p class="eyebrow"><?php esc_html_e( 'The journal', 'my-first-theme' ); ?></p>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-meta">
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<span><?php esc_html_e( 'By', 'my-first-theme' ); ?> <?php the_author_posts_link(); ?></span>
				</div>
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
			<?php if ( get_the_category_list() || get_the_tag_list() ) : ?>
				<footer class="entry-footer">
					<?php if ( get_the_category_list() ) : ?>
						<p class="entry-categories"><?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?></p>
					<?php endif; ?>
					<?php if ( get_the_tag_list() ) : ?>
						<p class="entry-tags"><?php echo wp_kses_post( get_the_tag_list( '', ', ' ) ); ?></p>
					<?php endif; ?>
				</footer>
			<?php endif; ?>
		</article>
		<nav class="post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'my-first-theme' ); ?>">
			<div><?php previous_post_link( '%link', '← %title' ); ?></div>
			<div><?php next_post_link( '%link', '%title →' ); ?></div>
		</nav>
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<?php comments_template(); ?>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
