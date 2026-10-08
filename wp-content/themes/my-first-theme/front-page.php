<?php
get_header();

$hero_button_url = get_theme_mod( 'hero_button_url', '#services' );
$cta_button_url  = get_theme_mod( 'cta_button_url', home_url( '/contact/' ) );
?>

<main id="main-content">
	<section class="hero-section">
		<div class="hero-inner">
			<div class="hero-copy">
				<p class="eyebrow"><?php echo esc_html( get_theme_mod( 'hero_eyebrow', __( 'Thoughtful design. Real results.', 'my-first-theme' ) ) ); ?></p>
				<h1><?php echo esc_html( get_theme_mod( 'hero_title', __( 'A better website for the next chapter of your business.', 'my-first-theme' ) ) ); ?></h1>
				<p class="hero-description"><?php echo esc_html( get_theme_mod( 'hero_description', __( 'We create clear, considered digital experiences that help good businesses grow.', 'my-first-theme' ) ) ); ?></p>
				<a class="button button-light" href="<?php echo esc_url( $hero_button_url ); ?>">
					<?php echo esc_html( get_theme_mod( 'hero_button_label', __( 'Explore our services', 'my-first-theme' ) ) ); ?>
					<span aria-hidden="true">↗</span>
				</a>
			</div>
			<div class="hero-art" aria-hidden="true">
				<div class="hero-art-card hero-art-card-back"></div>
				<div class="hero-art-card hero-art-card-front">
					<span class="hero-art-dot"></span>
					<span class="hero-art-line hero-art-line-long"></span>
					<span class="hero-art-line"></span>
					<span class="hero-art-line hero-art-line-short"></span>
					<span class="hero-art-mark">+</span>
				</div>
				<div class="hero-art-orbit"></div>
			</div>
		</div>
		<div class="hero-bottom"><span><?php esc_html_e( 'Independent by nature. In it together.', 'my-first-theme' ); ?></span><span aria-hidden="true">↓</span></div>
	</section>

	<section class="about-section section-wrap" id="about">
		<div class="about-label">
			<p class="eyebrow"><?php echo esc_html( get_theme_mod( 'about_eyebrow', __( 'A little about us', 'my-first-theme' ) ) ); ?></p>
			<span class="section-number">01 / <?php esc_html_e( 'About', 'my-first-theme' ); ?></span>
		</div>
		<div class="about-copy">
			<h2><?php echo esc_html( get_theme_mod( 'about_title', __( 'Good work starts with understanding your business.', 'my-first-theme' ) ) ); ?></h2>
			<p><?php echo esc_html( get_theme_mod( 'about_description', __( 'From the first idea to the final detail, we bring strategy, design and technology together to make your next move feel simple.', 'my-first-theme' ) ) ); ?></p>
		</div>
	</section>

	<section class="services-section" id="services">
		<div class="services-inner section-wrap">
			<div class="section-heading">
				<div>
					<p class="eyebrow"><?php echo esc_html( get_theme_mod( 'services_eyebrow', __( 'What we do', 'my-first-theme' ) ) ); ?></p>
					<h2><?php echo esc_html( get_theme_mod( 'services_title', __( 'Everything you need to move forward.', 'my-first-theme' ) ) ); ?></h2>
				</div>
				<span class="section-number">02 / <?php esc_html_e( 'Services', 'my-first-theme' ); ?></span>
			</div>

			<div class="services-grid">
				<?php
				$services = array(
					array(
						'number' => '01',
						'icon'   => 'design',
						'meta'   => __( 'Strategy · UX · UI', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_one_title', __( 'Website design', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_one_text', __( 'Thoughtful, accessible design that makes your business easy to understand and trust.', 'my-first-theme' ) ),
					),
					array(
						'number' => '02',
						'icon'   => 'development',
						'meta'   => __( 'Fast · Flexible · Yours', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_two_title', __( 'WordPress development', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_two_text', __( 'Flexible, fast websites built so you can confidently manage your content yourself.', 'my-first-theme' ) ),
					),
					array(
						'number' => '03',
						'icon'   => 'support',
						'meta'   => __( 'Care · Updates · Growth', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_three_title', __( 'Ongoing support', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_three_text', __( 'Practical help, updates and improvements to keep your website working hard.', 'my-first-theme' ) ),
					),
					array(
						'number' => '04',
						'icon'   => 'theme',
						'meta'   => __( 'Custom · Flexible · Unique', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_four_title', __( 'Custom theme development', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_four_text', __( 'Purpose-built WordPress themes with the features and editing tools your business needs.', 'my-first-theme' ) ),
					),
					array(
						'number' => '05',
						'icon'   => 'commerce',
						'meta'   => __( 'Shop · Sell · Grow', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_five_title', __( 'E-commerce solutions', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_five_text', __( 'Easy-to-manage online stores that make browsing, buying and checkout feel simple.', 'my-first-theme' ) ),
					),
					array(
						'number' => '06',
						'icon'   => 'growth',
						'meta'   => __( 'Search · Speed · Results', 'my-first-theme' ),
						'title'  => get_theme_mod( 'service_six_title', __( 'SEO & performance', 'my-first-theme' ) ),
						'text'   => get_theme_mod( 'service_six_text', __( 'Technical improvements that help your website load quickly and get discovered online.', 'my-first-theme' ) ),
					),
				);

				foreach ( $services as $service ) :
					?>
					<article class="service-card">
						<div class="service-card-top">
							<span class="service-icon service-icon-<?php echo esc_attr( $service['icon'] ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-' . $service['icon'] . '.svg' ); ?>" alt="" width="32" height="32" loading="lazy">
							</span>
							<span class="service-number"><?php echo esc_html( $service['number'] ); ?></span>
						</div>
						<p class="service-meta"><?php echo esc_html( $service['meta'] ); ?></p>
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="service-description"><?php echo esc_html( $service['text'] ); ?></p>
						<a class="service-link" href="<?php echo esc_url( get_theme_mod( 'cta_button_url', home_url( '/contact/' ) ) ); ?>">
							<?php esc_html_e( 'Let’s talk', 'my-first-theme' ); ?><span aria-hidden="true">↗</span>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	$recent_posts = new WP_Query(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
		)
	);
	?>
	<?php if ( $recent_posts->have_posts() ) : ?>
		<section class="journal-section section-wrap">
			<div class="section-heading">
				<div>
					<p class="eyebrow"><?php echo esc_html( get_theme_mod( 'posts_eyebrow', __( 'From the journal', 'my-first-theme' ) ) ); ?></p>
					<h2><?php echo esc_html( get_theme_mod( 'posts_title', __( 'Ideas, updates and useful reads.', 'my-first-theme' ) ) ); ?></h2>
				</div>
				<a class="text-link" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>">
					<?php esc_html_e( 'Visit the journal', 'my-first-theme' ); ?> <span aria-hidden="true">↗</span>
				</a>
			</div>
			<div class="post-grid">
				<?php
				while ( $recent_posts->have_posts() ) :
					$recent_posts->the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<section class="cta-section" id="contact">
		<div class="cta-inner">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Your next step', 'my-first-theme' ); ?></p>
				<h2><?php echo esc_html( get_theme_mod( 'cta_title', __( 'Have a good idea? Let’s make it happen.', 'my-first-theme' ) ) ); ?></h2>
				<p><?php echo esc_html( get_theme_mod( 'cta_description', __( 'Tell us what you are working on and we will help you find the right next step.', 'my-first-theme' ) ) ); ?></p>
			</div>
			<a class="button button-dark" href="<?php echo esc_url( $cta_button_url ); ?>">
				<?php echo esc_html( get_theme_mod( 'cta_button_label', __( 'Get in touch', 'my-first-theme' ) ) ); ?>
				<span aria-hidden="true">↗</span>
			</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
