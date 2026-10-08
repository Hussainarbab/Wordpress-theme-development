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
		'woocommerce',
		array(
			'thumbnail_image_width' => 480,
			'single_image_width'    => 900,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 6,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
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
	add_editor_style( 'style.css' );
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

	$primary_color    = sanitize_hex_color( get_theme_mod( 'nexa_primary_color', '#7157f5' ) );
	$accent_color     = sanitize_hex_color( get_theme_mod( 'nexa_accent_color', '#a9f6ee' ) );
	$background_color = sanitize_hex_color( get_theme_mod( 'nexa_background_color', '#f7f8fc' ) );
	$text_color       = sanitize_hex_color( get_theme_mod( 'nexa_text_color', '#111a35' ) );
	$content_width    = min( 1440, max( 960, absint( get_theme_mod( 'nexa_content_width', 1180 ) ) ) );

	$design_css = sprintf(
		':root{--color-primary:%1$s;--color-accent:%2$s;--color-paper:%3$s;--color-ink:%4$s;--content-width:%5$dpx;}',
		$primary_color ? $primary_color : '#7157f5',
		$accent_color ? $accent_color : '#a9f6ee',
		$background_color ? $background_color : '#f7f8fc',
		$text_color ? $text_color : '#111a35',
		$content_width
	);
	wp_add_inline_style( 'my-first-theme-style', $design_css );

	wp_enqueue_script(
		'my-first-theme-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'my_first_theme_assets' );

function my_first_theme_body_classes( $classes ) {
	$header_layout = get_theme_mod( 'nexa_header_layout', 'left' );
	$font_family   = get_theme_mod( 'nexa_font_family', 'system' );

	$classes[] = 'nexa-header-layout-' . sanitize_html_class( $header_layout );
	$classes[] = 'nexa-font-' . sanitize_html_class( $font_family );

	return $classes;
}
add_filter( 'body_class', 'my_first_theme_body_classes' );

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
		'nexa_studio_design',
		array(
			'title'       => __( 'Theme Design', 'my-first-theme' ),
			'description' => __( 'Set global colors, typography, header alignment and content width.', 'my-first-theme' ),
			'priority'    => 29,
		)
	);

	$design_controls = array(
		'nexa_primary_color'    => array( 'color', __( 'Primary color', 'my-first-theme' ), '#7157f5' ),
		'nexa_accent_color'     => array( 'color', __( 'Accent color', 'my-first-theme' ), '#a9f6ee' ),
		'nexa_background_color' => array( 'color', __( 'Page background', 'my-first-theme' ), '#f7f8fc' ),
		'nexa_text_color'       => array( 'color', __( 'Text color', 'my-first-theme' ), '#111a35' ),
	);

	foreach ( $design_controls as $setting_id => $control ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $control[2],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'   => $control[1],
					'section' => 'nexa_studio_design',
				)
			)
		);
	}

	$wp_customize->add_setting(
		'nexa_content_width',
		array(
			'default'           => 1180,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nexa_content_width',
		array(
			'label'       => __( 'Content width (px)', 'my-first-theme' ),
			'description' => __( 'Choose a width between 960px and 1440px.', 'my-first-theme' ),
			'section'     => 'nexa_studio_design',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 960,
				'max'  => 1440,
				'step' => 20,
			),
		)
	);

	$wp_customize->add_setting(
		'nexa_header_layout',
		array(
			'default'           => 'left',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nexa_header_layout',
		array(
			'label'   => __( 'Header alignment', 'my-first-theme' ),
			'section' => 'nexa_studio_design',
			'type'    => 'select',
			'choices' => array(
				'left'     => __( 'Logo left, menu right', 'my-first-theme' ),
				'centered' => __( 'Centered logo with menu below', 'my-first-theme' ),
			),
		)
	);

	$wp_customize->add_setting(
		'nexa_font_family',
		array(
			'default'           => 'system',
			'sanitize_callback' => 'sanitize_key',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nexa_font_family',
		array(
			'label'   => __( 'Font style', 'my-first-theme' ),
			'section' => 'nexa_studio_design',
			'type'    => 'select',
			'choices' => array(
				'system'    => __( 'Modern sans serif', 'my-first-theme' ),
				'geometric' => __( 'Soft geometric sans serif', 'my-first-theme' ),
				'serif'     => __( 'Classic serif', 'my-first-theme' ),
			),
		)
	);

	$wp_customize->add_section(
		'my_first_theme_homepage',
		array(
			'title'       => __( 'Homepage Content', 'my-first-theme' ),
			'description' => __( 'Edit homepage and About page content and sections.', 'my-first-theme' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_setting(
		'my_first_theme_brand_name',
		array(
			'default'           => __( 'Nexa Studio', 'my-first-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'my_first_theme_brand_name',
		array(
			'label'       => __( 'Brand name', 'my-first-theme' ),
			'description' => __( 'Shown in the site header and footer when no logo is set.', 'my-first-theme' ),
			'section'     => 'my_first_theme_homepage',
			'type'        => 'text',
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
		'service_four_title'  => array( 'text', __( 'Service 4 heading', 'my-first-theme' ), '' ),
		'service_four_text'   => array( 'textarea', __( 'Service 4 description', 'my-first-theme' ), '' ),
		'service_five_title'  => array( 'text', __( 'Service 5 heading', 'my-first-theme' ), '' ),
		'service_five_text'   => array( 'textarea', __( 'Service 5 description', 'my-first-theme' ), '' ),
		'service_six_title'   => array( 'text', __( 'Service 6 heading', 'my-first-theme' ), '' ),
		'service_six_text'    => array( 'textarea', __( 'Service 6 description', 'my-first-theme' ), '' ),
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
		'service_four_title'  => __( 'Custom theme development', 'my-first-theme' ),
		'service_four_text'   => __( 'Purpose-built WordPress themes with the features and editing tools your business needs.', 'my-first-theme' ),
		'service_five_title'  => __( 'E-commerce solutions', 'my-first-theme' ),
		'service_five_text'   => __( 'Easy-to-manage online stores that make browsing, buying and checkout feel simple.', 'my-first-theme' ),
		'service_six_title'   => __( 'SEO & performance', 'my-first-theme' ),
		'service_six_text'    => __( 'Technical improvements that help your website load quickly and get discovered online.', 'my-first-theme' ),
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
