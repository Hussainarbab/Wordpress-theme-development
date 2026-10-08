<?php
/**
 * Template Name: About Us
 * Template Post Type: page
 *
 * @package My_First_Theme
 */

get_header();

$about_values = array(
	array(
		'title' => get_theme_mod( 'about_value_one', __( 'People first', 'my-first-theme' ) ),
		'text'  => get_theme_mod( 'about_value_one_text', __( 'We start by listening. The best digital work solves a real problem for the people using it.', 'my-first-theme' ) ),
	),
	array(
		'title' => get_theme_mod( 'about_value_two', __( 'Built with purpose', 'my-first-theme' ) ),
		'text'  => get_theme_mod( 'about_value_two_text', __( 'Every detail has a reason, from the first sketch to the final line of code.', 'my-first-theme' ) ),
	),
	array(
		'title' => get_theme_mod( 'about_value_three', __( 'Here for the long run', 'my-first-theme' ) ),
		'text'  => get_theme_mod( 'about_value_three_text', __( 'We build flexible websites and lasting partnerships that keep getting better.', 'my-first-theme' ) ),
	),
);
?>

<main id="main-content" class="about-page">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<section class="about-hero">
			<div class="about-hero-inner">
				<div>
					<p class="eyebrow"><?php esc_html_e( 'A little about us', 'my-first-theme' ); ?></p>
					<h1><?php the_title(); ?></h1>
					<p class="about-hero-lead"><?php echo esc_html( get_theme_mod( 'about_page_lead', __( 'We bring thoughtful design and dependable technology together to help ambitious businesses move forward.', 'my-first-theme' ) ) ); ?></p>
				</div>
				<div class="about-orbit-art" aria-hidden="true">
					<span class="about-orbit-core">+</span>
					<span class="about-orbit-dot"></span>
				</div>
			</div>
		</section>

		<section class="about-story section-wrap">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Our approach', 'my-first-theme' ); ?></p>
				<h2><?php echo esc_html( get_theme_mod( 'about_story_title', __( 'Small team. Big-picture thinking.', 'my-first-theme' ) ) ); ?></h2>
			</div>
			<div class="about-story-copy entry-content">
				<?php if ( trim( get_the_content() ) ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'We partner with people who care about doing good work. By combining clear strategy, thoughtful design and dependable WordPress development, we make websites easier to use and easier to grow.', 'my-first-theme' ); ?></p>
					<p><?php esc_html_e( 'No confusing process or unnecessary complexity. Just a collaborative team, honest advice and digital work built around what your business really needs.', 'my-first-theme' ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<section class="about-values">
			<div class="about-values-inner">
				<div class="about-values-heading">
					<div>
						<p class="eyebrow"><?php esc_html_e( 'What matters to us', 'my-first-theme' ); ?></p>
						<h2><?php esc_html_e( 'Good work, grounded in good values.', 'my-first-theme' ); ?></h2>
					</div>
					<span class="section-number">01 / <?php esc_html_e( 'Our values', 'my-first-theme' ); ?></span>
				</div>
				<div class="about-values-grid">
					<?php foreach ( $about_values as $index => $value ) : ?>
						<article class="about-value-card">
							<span class="about-value-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<h3><?php echo esc_html( $value['title'] ); ?></h3>
							<p><?php echo esc_html( $value['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	<section class="cta-section">
		<div class="cta-inner">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Let’s build something good', 'my-first-theme' ); ?></p>
				<h2><?php echo esc_html( get_theme_mod( 'cta_title', __( 'Have a good idea? Let’s make it happen.', 'my-first-theme' ) ) ); ?></h2>
				<p><?php echo esc_html( get_theme_mod( 'cta_description', __( 'Tell us what you are working on and we will help you find the right next step.', 'my-first-theme' ) ) ); ?></p>
			</div>
			<a class="button button-dark" href="<?php echo esc_url( get_theme_mod( 'cta_button_url', home_url( '/contact/' ) ) ); ?>">
				<?php echo esc_html( get_theme_mod( 'cta_button_label', __( 'Get in touch', 'my-first-theme' ) ) ); ?>
				<span aria-hidden="true">↗</span>
			</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
