<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * @package My_First_Theme
 */

get_header();
?>

<main id="main-content" class="contact-page">
	<div class="contact-container">
		<div class="contact-intro">
			<p class="eyebrow"><?php esc_html_e( 'Contact us', 'my-first-theme' ); ?></p>
			<h1><?php esc_html_e( 'Let’s start a conversation.', 'my-first-theme' ); ?></h1>
			<p><?php esc_html_e( 'Have a question or an idea to share? Send us a note and we’ll get back to you.', 'my-first-theme' ); ?></p>
		</div>

		<?php
		$contact_status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
		?>
		<?php if ( 'success' === $contact_status ) : ?>
			<div class="form-success" role="status"><?php esc_html_e( 'Thanks for reaching out. Your message has been sent.', 'my-first-theme' ); ?></div>
		<?php elseif ( 'error' === $contact_status ) : ?>
			<div class="form-error" role="alert"><?php esc_html_e( 'Your message could not be sent. Please check your details and try again, or contact us directly.', 'my-first-theme' ); ?></div>
		<?php endif; ?>

		<div class="contact-form-wrapper">
			<form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="contact_form">
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
				<?php wp_nonce_field( 'contact_form_action', 'contact_form_nonce' ); ?>

				<div class="contact-honeypot" aria-hidden="true">
					<label for="company-website"><?php esc_html_e( 'Leave this field empty', 'my-first-theme' ); ?></label>
					<input type="text" id="company-website" name="company_website" tabindex="-1" autocomplete="off">
				</div>

				<div class="form-group">
					<label for="contact-name"><?php esc_html_e( 'Your name', 'my-first-theme' ); ?></label>
					<input type="text" id="contact-name" name="name" autocomplete="name" required>
				</div>

				<div class="form-group">
					<label for="contact-email"><?php esc_html_e( 'Email address', 'my-first-theme' ); ?></label>
					<input type="email" id="contact-email" name="email" autocomplete="email" required>
				</div>

				<div class="form-group">
					<label for="contact-message"><?php esc_html_e( 'How can we help?', 'my-first-theme' ); ?></label>
					<textarea id="contact-message" name="message" rows="7" required></textarea>
				</div>

				<button type="submit"><?php esc_html_e( 'Send message', 'my-first-theme' ); ?> <span aria-hidden="true">↗</span></button>
			</form>
		</div>
	</div>
</main>

<?php get_footer(); ?>
