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
define('DB_NAME', 'wp_lamar');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '8oRaJR8*yVitZ89#`&k!oDz{/7QPe{_/J7q+}%t3W:>utj/xZd-.1MyK]UElieQI');
define('SECURE_AUTH_KEY',  'P touJ/T9ZAABrpF0irJb]X|_s21:5n@e5e<nnRkOqof&(V{!a=t`M33(I[RX+]2');
define('LOGGED_IN_KEY',    'UeT3F$mYV9V}I!e$vds:+CSROg-*# u A2D=RwL(m;ZKIzcs=7<Y#]d>vTaw6x,a');
define('NONCE_KEY',        'u[Xrw(3]ibPlbF/^O[|]ZXFT{CK4Wmk@*dz.W)4#LgP}@D9.fOM364vy%bo1hr]4');
define('AUTH_SALT',        '>n<eb6#FD=mr,7yWJV}Eayu;_d 8~7/P?8zY+L!.!H0B*KPHZlY/i%H?$9,bD8{o');
define('SECURE_AUTH_SALT', 'w0O5rTzDh3U>/-/q7qG:hnvyZ1e,jrXHGZ&cB,tQU&|i6^4s.fdMS1B^8+6826jl');
define('LOGGED_IN_SALT',   ']-!#fts|x)`&+]ht(4w4,Pcg6E`G_V:F(k2(#X]]kU=IBr{7L+dR^nOem`mn.Z)`');
define('NONCE_SALT',       '~_6%O5v]3ie_ur)U>2@b{tbU~6T@J5^-YZCr`HZbg`HP{Fu>uGPkFBL2loek|7yp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'j7_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
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
define('WP_DEBUG', true);

define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
