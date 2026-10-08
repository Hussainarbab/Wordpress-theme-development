<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<a class="post-card-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'my-first-theme-card', array( 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
			<span class="post-card-placeholder"><?php echo esc_html( strtoupper( substr( get_the_title(), 0, 1 ) ) ); ?></span>
		<?php endif; ?>
	</a>
	<div class="post-card-meta">
		<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		<?php if ( get_the_category_list() ) : ?>
			<span><?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?></span>
		<?php endif; ?>
	</div>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="post-card-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
</article>
