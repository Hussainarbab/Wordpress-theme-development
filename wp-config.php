<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0$J-J4d0Np;3UWQ7X:W~`Nky6Mfn522z)*F}#gV(.?-K|9`Wg{[;9Luy4]r(4E}j' );
define( 'SECURE_AUTH_KEY',  'qO<Ux5/G*-H{1|)w~N@?6K<%lQ@!Xsw||s+6i _V-@M?qi`w;#Sac;/93meR_t(+' );
define( 'LOGGED_IN_KEY',    'rW{: @n1{*mx/W)JQI}YA9r`w2b/s}hrZY4@6Ma&ekvsrN9/n-PM4P:s*326/@M1' );
define( 'NONCE_KEY',        '/[a_Vrv-LC4TMYZ+>Q/e!mEf!b,v)}UJb{m;Xw|ei0agEXV*+@/9)[-uq|XQ?w0,' );
define( 'AUTH_SALT',        '-5.RqBih)sql=1{ahUl)*dWr!-N*2Pee}$gwf!X}.#s2i2#<~/rSK.N8zUS^AYN_' );
define( 'SECURE_AUTH_SALT', ')Q{P!:7CW}hvSYOd1a^NLW1l:Ee{<9EI` n9;q%qHk.-yY7EUo}Bw@#_9DW`ogQR' );
define( 'LOGGED_IN_SALT',   '.:^dp9}RW_,anHLU?DlN`_^88@E2(]Y{SEe:RIKLgg@#3CH](Vpkra3dD{IlS)pq' );
define( 'NONCE_SALT',       'Tv&X)z+FLS..d.M>VeBWK*&OcrB9VdglAEgqs|%t@prXXsr8gk=G>[!p4P{IMt`O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
