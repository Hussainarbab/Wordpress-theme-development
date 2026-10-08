<?php get_header(); ?>

<main id="main-content" class="archive-layout">
	<header class="archive-header">
		<p class="eyebrow"><?php esc_html_e( 'Browse the journal', 'my-first-theme' ); ?></p>
		<h1><?php echo esc_html( get_the_archive_title() ); ?></h1>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>

	<div class="archive-content">
		<div class="archive-main">
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
		</div>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<aside class="archive-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'my-first-theme' ); ?>">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
