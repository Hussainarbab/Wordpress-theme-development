<?php

function my_first_theme_styles() {

    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );

}

add_action('wp_enqueue_scripts', 'my_first_theme_styles');


function my_first_theme_setup() {

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'my-first-theme'),
        )
    );

}

add_action('after_setup_theme', 'my_first_theme_setup');

function my_first_theme_contact_form() {

    if ( ! isset( $_POST['contact_form_nonce'] ) ) {
        wp_die( 'Security check failed.' );
    }

    if ( ! wp_verify_nonce(
        $_POST['contact_form_nonce'],
        'contact_form_action'
    ) ) {
        wp_die( 'Security check failed.' );
    }


    $name = sanitize_text_field(
        $_POST['name']
    );

    $email = sanitize_email(
        $_POST['email']
    );

    $message = sanitize_textarea_field(
        $_POST['message']
    );


    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {

        wp_die( 'Please fill in all fields.' );

    }


    $to = get_option( 'admin_email' );

    $subject = 'New Contact Form Message';

    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";


    wp_mail(
        $to,
        $subject,
        $body
    );


    wp_safe_redirect(
        home_url( '/contact/?contact=success' )
    );

    exit;
}

add_action(
    'admin_post_nopriv_contact_form',
    'my_first_theme_contact_form'
);

add_action(
    'admin_post_contact_form',
    'my_first_theme_contact_form'
);