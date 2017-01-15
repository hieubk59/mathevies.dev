<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/sites/mathevies.com/public_html/staging/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'cl33-a-wordp-60a');

/** MySQL database username */
define('DB_USER', 'cl33-a-wordp-60a');

/** MySQL database password */
define('DB_PASSWORD', 'Wb^bJy6bD');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w+U400+)n2zyhbmyPE(93TqmQp7ws4#vD3XuSIFJn0!R#MNHW!cdsnAJ^Ls#3_FE');
define('SECURE_AUTH_KEY',  '38Q3f6^qFgFEsM!VzRy+SuE=j(jXSZy(a_lB3wgxJKkg0pai=l3Z6j6(MvwHhgk=');
define('LOGGED_IN_KEY',    'Mp5Cfo9_5VxfLYhgTtZym#4eJiG0icx3LclrlWLgjGXSF^yF#w3N68fLPFS/aXhE');
define('NONCE_KEY',        'PuK4qhoePljSxAJ_d)y5q+mj/A1WxhT=1WAGr9+UvnvQ2gCyEAbH6+lqvofbd1wg');
define('AUTH_SALT',        'n/aQ386131Z7G4T-s78J0OyS25J62sGEt8vSKSKV4f3W5r(mxQmrOIof547owjce');
define('SECURE_AUTH_SALT', 'sglHXIBdfVjcrF18RgRUu0q+j#/kCR-RH!O4s!=wN=g_4A86u4IRjCqMcfofRHd(');
define('LOGGED_IN_SALT',   '+FmLc(q3ofyLl(09cey200xfoj!sGff=4hxkKastWfXQuqi7O3gFh_Cb)U9l8wiK');
define('NONCE_SALT',       'VQ5uR(fLCmljDrJ#y-bbapE9VL+TI09/ps)dn8+)JCgzGXKg5gPDhij1-hpo1R0h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 *  Change this to true to run multiple blogs on this installation.
 *  Then login as admin and go to Tools -> Network
 */
define('WP_ALLOW_MULTISITE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* Destination directory for file streaming */
define('WP_TEMP_DIR', ABSPATH . 'wp-content/');

