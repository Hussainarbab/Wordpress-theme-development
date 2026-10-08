<?php
/**
 * Theme setup and features.
 *
 * @package My_First_Theme
 */

function my_first_theme_setup() {
	load_theme_textdomain( 'my-first-theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'my-first-theme' ),
			'footer'  => __( 'Footer Menu', 'my-first-theme' ),
		)
	);

	add_image_size( 'my-first-theme-card', 720, 480, true );
}
add_action( 'after_setup_theme', 'my_first_theme_setup' );

function my_first_theme_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'my-first-theme-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'my-first-theme-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'my_first_theme_assets' );

function my_first_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'my-first-theme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets shown beside posts and archive listings.', 'my-first-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_first_theme_widgets_init' );

function my_first_theme_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'my_first_theme_homepage',
		array(
			'title'       => __( 'Homepage Content', 'my-first-theme' ),
			'description' => __( 'Edit homepage and About page content and sections.', 'my-first-theme' ),
			'priority'    => 30,
		)
	);

	$settings = array(
		'hero_eyebrow'       => array( 'text', __( 'Hero label', 'my-first-theme' ), __( 'A small line above the main heading.', 'my-first-theme' ) ),
		'hero_title'         => array( 'textarea', __( 'Hero heading', 'my-first-theme' ), '' ),
		'hero_description'   => array( 'textarea', __( 'Hero description', 'my-first-theme' ), '' ),
		'hero_button_label'  => array( 'text', __( 'Main button label', 'my-first-theme' ), '' ),
		'hero_button_url'    => array( 'url', __( 'Main button link', 'my-first-theme' ), '' ),
		'about_eyebrow'      => array( 'text', __( 'About label', 'my-first-theme' ), '' ),
		'about_title'        => array( 'textarea', __( 'About heading', 'my-first-theme' ), '' ),
		'about_description'  => array( 'textarea', __( 'About description', 'my-first-theme' ), '' ),
		'about_page_lead'    => array( 'textarea', __( 'About page introduction', 'my-first-theme' ), '' ),
		'about_story_title'  => array( 'text', __( 'About story heading', 'my-first-theme' ), '' ),
		'about_value_one'    => array( 'text', __( 'About value 1 heading', 'my-first-theme' ), '' ),
		'about_value_one_text' => array( 'textarea', __( 'About value 1 description', 'my-first-theme' ), '' ),
		'about_value_two'    => array( 'text', __( 'About value 2 heading', 'my-first-theme' ), '' ),
		'about_value_two_text' => array( 'textarea', __( 'About value 2 description', 'my-first-theme' ), '' ),
		'about_value_three'  => array( 'text', __( 'About value 3 heading', 'my-first-theme' ), '' ),
		'about_value_three_text' => array( 'textarea', __( 'About value 3 description', 'my-first-theme' ), '' ),
		'services_eyebrow'   => array( 'text', __( 'Services label', 'my-first-theme' ), '' ),
		'services_title'     => array( 'text', __( 'Services heading', 'my-first-theme' ), '' ),
		'service_one_title'  => array( 'text', __( 'Service 1 heading', 'my-first-theme' ), '' ),
		'service_one_text'   => array( 'textarea', __( 'Service 1 description', 'my-first-theme' ), '' ),
		'service_two_title'  => array( 'text', __( 'Service 2 heading', 'my-first-theme' ), '' ),
		'service_two_text'   => array( 'textarea', __( 'Service 2 description', 'my-first-theme' ), '' ),
		'service_three_title'=> array( 'text', __( 'Service 3 heading', 'my-first-theme' ), '' ),
		'service_three_text' => array( 'textarea', __( 'Service 3 description', 'my-first-theme' ), '' ),
		'posts_eyebrow'      => array( 'text', __( 'Latest posts label', 'my-first-theme' ), '' ),
		'posts_title'        => array( 'text', __( 'Latest posts heading', 'my-first-theme' ), '' ),
		'cta_title'          => array( 'text', __( 'Call-to-action heading', 'my-first-theme' ), '' ),
		'cta_description'    => array( 'textarea', __( 'Call-to-action description', 'my-first-theme' ), '' ),
		'cta_button_label'   => array( 'text', __( 'Call-to-action button label', 'my-first-theme' ), '' ),
		'cta_button_url'     => array( 'url', __( 'Call-to-action button link', 'my-first-theme' ), '' ),
	);

	$defaults = array(
		'hero_eyebrow'        => __( 'Thoughtful design. Real results.', 'my-first-theme' ),
		'hero_title'          => __( 'A better website for the next chapter of your business.', 'my-first-theme' ),
		'hero_description'    => __( 'We create clear, considered digital experiences that help good businesses grow.', 'my-first-theme' ),
		'hero_button_label'   => __( 'Explore our services', 'my-first-theme' ),
		'hero_button_url'     => '#services',
		'about_eyebrow'       => __( 'A little about us', 'my-first-theme' ),
		'about_title'         => __( 'Good work starts with understanding your business.', 'my-first-theme' ),
		'about_description'   => __( 'From the first idea to the final detail, we bring strategy, design and technology together to make your next move feel simple.', 'my-first-theme' ),
		'about_page_lead'     => __( 'We bring thoughtful design and dependable technology together to help ambitious businesses move forward.', 'my-first-theme' ),
		'about_story_title'   => __( 'Small team. Big-picture thinking.', 'my-first-theme' ),
		'about_value_one'     => __( 'People first', 'my-first-theme' ),
		'about_value_one_text'=> __( 'We start by listening. The best digital work solves a real problem for the people using it.', 'my-first-theme' ),
		'about_value_two'     => __( 'Built with purpose', 'my-first-theme' ),
		'about_value_two_text'=> __( 'Every detail has a reason, from the first sketch to the final line of code.', 'my-first-theme' ),
		'about_value_three'   => __( 'Here for the long run', 'my-first-theme' ),
		'about_value_three_text' => __( 'We build flexible websites and lasting partnerships that keep getting better.', 'my-first-theme' ),
		'services_eyebrow'    => __( 'What we do', 'my-first-theme' ),
		'services_title'      => __( 'Everything you need to move forward.', 'my-first-theme' ),
		'service_one_title'   => __( 'Website design', 'my-first-theme' ),
		'service_one_text'    => __( 'Thoughtful, accessible design that makes your business easy to understand and trust.', 'my-first-theme' ),
		'service_two_title'   => __( 'WordPress development', 'my-first-theme' ),
		'service_two_text'    => __( 'Flexible, fast websites built so you can confidently manage your content yourself.', 'my-first-theme' ),
		'service_three_title' => __( 'Ongoing support', 'my-first-theme' ),
		'service_three_text'  => __( 'Practical help, updates and improvements to keep your website working hard.', 'my-first-theme' ),
		'posts_eyebrow'       => __( 'From the journal', 'my-first-theme' ),
		'posts_title'         => __( 'Ideas, updates and useful reads.', 'my-first-theme' ),
		'cta_title'           => __( 'Have a good idea? Let’s make it happen.', 'my-first-theme' ),
		'cta_description'     => __( 'Tell us what you are working on and we will help you find the right next step.', 'my-first-theme' ),
		'cta_button_label'    => __( 'Get in touch', 'my-first-theme' ),
		'cta_button_url'      => home_url( '/contact/' ),
	);

	foreach ( $settings as $id => $setting ) {
		$sanitize_callback = 'url' === $setting[0] ? 'esc_url_raw' : ( 'textarea' === $setting[0] ? 'sanitize_textarea_field' : 'sanitize_text_field' );

		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $defaults[ $id ],
				'sanitize_callback' => $sanitize_callback,
				'transport'         => 'refresh',
			)
		);

		$control = array(
			'label'   => $setting[1],
			'section' => 'my_first_theme_homepage',
			'type'    => $setting[0],
		);

		if ( ! empty( $setting[2] ) ) {
			$control['description'] = $setting[2];
		}

		$wp_customize->add_control( $id, $control );
	}
}
add_action( 'customize_register', 'my_first_theme_customize_register' );

function my_first_theme_contact_redirect( $status ) {
	$redirect = isset( $_POST['redirect_to'] ) && is_string( $_POST['redirect_to'] ) ? wp_unslash( $_POST['redirect_to'] ) : wp_get_referer();
	$redirect = wp_validate_redirect( $redirect, home_url( '/' ) );

	wp_safe_redirect( add_query_arg( 'contact', $status, $redirect ) );
	exit;
}

function my_first_theme_contact_form() {
	$nonce = isset( $_POST['contact_form_nonce'] ) && is_string( $_POST['contact_form_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_form_nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'contact_form_action' ) ) {
		wp_die( esc_html__( 'Security check failed. Please return to the form and try again.', 'my-first-theme' ) );
	}

	if ( ! empty( $_POST['company_website'] ) ) {
		my_first_theme_contact_redirect( 'error' );
	}

	$name    = isset( $_POST['name'] ) && is_string( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) && is_string( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message = isset( $_POST['message'] ) && is_string( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		my_first_theme_contact_redirect( 'error' );
	}

	$body  = "Name: {$name}\n";
	$body .= "Email: {$email}\n\n";
	$body .= "Message:\n{$message}";

	$sent = wp_mail(
		get_option( 'admin_email' ),
		sprintf(
			/* translators: %s: sender name */
			__( 'Website enquiry from %s', 'my-first-theme' ),
			$name
		),
		$body,
		array( 'Reply-To: ' . $email )
	);

	my_first_theme_contact_redirect( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_nopriv_contact_form', 'my_first_theme_contact_form' );
add_action( 'admin_post_contact_form', 'my_first_theme_contact_form' );
