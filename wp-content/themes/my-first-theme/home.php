<?php get_header(); ?>

<main id="main-content" class="archive-layout">
	<header class="archive-header">
		<p class="eyebrow"><?php esc_html_e( 'The journal', 'my-first-theme' ); ?></p>
		<h1>
			<?php
			$posts_page_id = (int) get_option( 'page_for_posts' );
			echo esc_html( $posts_page_id ? get_the_title( $posts_page_id ) : __( 'Latest stories', 'my-first-theme' ) );
			?>
		</h1>
		<?php if ( $posts_page_id && get_post_field( 'post_content', $posts_page_id ) ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( apply_filters( 'the_content', get_post_field( 'post_content', $posts_page_id ) ) ); ?></div>
		<?php endif; ?>
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
