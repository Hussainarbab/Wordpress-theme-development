<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>

    <h1>My First WordPress Website</h1>

    <nav>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => false,
            )
        );
        ?>
    </nav>

</header>