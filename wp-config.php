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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/terrano1/public_html/romulus/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'terrano1_wp883' );

/** MySQL database username */
define( 'DB_USER', 'terrano1_wp883' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S[Lj!0p574' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '88ibmermsdoobvicfgfyeivwerfyd9gfnprogwyuqcelquuzu4fsxt2ieyxp67un' );
define( 'SECURE_AUTH_KEY',  'fkanibvkzp0jd8oi3klghnhi03hj8gzajoeulb0bpqypccomllyoh19bgtemeilg' );
define( 'LOGGED_IN_KEY',    '5vnbaihlbrdg4vgzwkadwgf0dpypqxqtpqt3eavvwbmrem6ggcn08tnfuiofxqt9' );
define( 'NONCE_KEY',        'zqs72wh0cvgit6owgrf7caw7ekwwy9hrclu5xatnik32shkp728blckjqqlar71f' );
define( 'AUTH_SALT',        'pztkm7nf3fjj2jiqtepe5vk2nbfd6zl4totpyvwxczunp7ai978qcausczuj2zub' );
define( 'SECURE_AUTH_SALT', 'lr4d6wau7cnpdo8oi6g5h4qxu7jt6bkoupnymubfxcit1okkzks4bobu7dkbddgk' );
define( 'LOGGED_IN_SALT',   'zgcrtorsxxt49i9h3dubfzfu9kdagqwzvufa7qnhutwee5btcou8matmccvy1uze' );
define( 'NONCE_SALT',       '4kqujbowyculk6hcwnzoxwrzz0pm8txwjmavarrzctvaamujiz53fg7imqbfvgvb' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpda_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
