<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fiyrtwit_wp_etatl' );

/** Database username */
define( 'DB_USER', 'fiyrtwit_wp_vstx4' );

/** Database password */
define( 'DB_PASSWORD', 'dYZ0w#4AUzx7q0g&' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', 'lh29KX8424b9T2/P(4ad(lj:Yr~[/hKM3N!~|!ut2_0LR9P!hX05(6%3U:6d#2UL');
define('SECURE_AUTH_KEY', 'Prp0yeSZA*J(8Gg*BP78p9Y|zcaTL@o(kCi2449@9/I4!C8ZD98e-GUEOc5Nug%)');
define('LOGGED_IN_KEY', '9D/OvFHxpHEa7#59@7uc+QWMIVn)1L2+&3Ta0BO1|*gWdU+0Y8X;r-W:#Y5BVY!O');
define('NONCE_KEY', '4(N)59+~~9q2:u7Evg8blqq*3-5&16IKgq%9Gzf;QC8V1J+JNhXY;4EKSI5XOLs2');
define('AUTH_SALT', 'LH2(;2~Ez6CjP5;2S7mjR5C**2*g|/nquLrSW6t-kpfV6vo9gS|9#*31)0k25H)#');
define('SECURE_AUTH_SALT', '43(Dr_g83t]Ehd%98HX9:MiB3]nNf:aaUdq)0Q~Y1s/6F8TM6nK/|5kSc@#y*FpO');
define('LOGGED_IN_SALT', '0ZhGd~:%sz34iC3:#1:@I8@9@x42Ut&26l~s8l/|lFP7DHCN&eg7+/pkg3&-+g*W');
define('NONCE_SALT', '/_n3V;|p8q|_4w~7N)QA+99r!)6n23zA8n2P(8(87s8&uBa193Ur&95/015;2W:6');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Ilq91a_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
