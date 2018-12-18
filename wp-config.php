<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'woocommerce');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '$2h58[0.-0K5T}^Ov2wfQn`?b=F^vq6o|SeEKpY.J%i.n??xHE1nle_TywQ V0Y)');
define('SECURE_AUTH_KEY',  'WY^cI>3D,KpP/D=enDU{S=KWR2:2`q94&uC!=bE-^[ohBncMR??%q.[lN!#NE|aX');
define('LOGGED_IN_KEY',    'Y[lp*H1mPtAG%QqtPQcabYK*01UL42%{E{ePkDpK.PV8n;sb|W;K&,b3@%TYco[q');
define('NONCE_KEY',        '^ewcG^m;S|DLhz2=Pe,:z>h}_A%9H?*bJ&,7r!v/M9@(S/>SN9^MZ&!Kb<;PSWvF');
define('AUTH_SALT',        'WUGQX8^z2U{(nM{`RAI(a=VhbwQe;k&Z;bWs3Qws2VuF(y6ZY~K/p*:ifLuRz3|4');
define('SECURE_AUTH_SALT', '2/h3%T_S^F+C7c]6K[g^lMboXS>&{YiIJ;g<jeyt1LmZFi@Y<sK<GA>+iHAwD#|?');
define('LOGGED_IN_SALT',   'i?T70#<3GcCM]Q7]F40i5~m}=`cdB;Jb#=Dfh^;Od,BN{Kmkd;`-2hY%w5M{PAl0');
define('NONCE_SALT',       'vMNz/b]y4x5TeU[fq?saBE7}`U@`])C.bh=D&IxeunJ3WnFNWUB07iq6q+0LyoF6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('ALLOW_UNFILTERED_UPLOADS', true);
