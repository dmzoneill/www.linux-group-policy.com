<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache
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
//Added by WP-Cache Manager
define('DB_NAME', 'linuxgpo');
/** MySQL database username */
define('DB_USER', 'books');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'mysql.feeditout.com');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again
* @since 2.6.0
*/
/*
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
*/
define('AUTH_KEY',         '!==)h7%M)UA*I c}xM^7]z{v9&hZL,7ar=?1<iL,p{JgFfL@vJ>OAH,K}=-iu0`;');
define('SECURE_AUTH_KEY',  'nYb,z3[P+2]|+ixN4zdNDCYlwO,(RK!R_O,ZXU_4!zdR)D]JAN,h_23 m+3Y-PX/');
define('LOGGED_IN_KEY',    ']i+6|n`LQJ!QGK2+9HO{fn;cQi%)aU]9+i+Mu^`ovI[S56qMn~OS-658RL&w;k6i');
define('NONCE_KEY',        'krl8EJ{2@[@dr|#4U7$98f!/t4|a.3!ay @d^{2-#`{k%W+?<*D9G`3rN/>OE|[>');
define('AUTH_SALT',        'V7>/g)x}!xPFv+n+K.X;H4J{dW?R r RhV//78@Ty#D+|RLEkp%Ed@`V+u-LS<85');
define('SECURE_AUTH_SALT', '9g.MHY(FjgI-1:@y6Zo=5Nliedlm-]E%;@7HRze@kVptev;N/tD9mj-5Yr:#A(.b');
define('LOGGED_IN_SALT',   '?[E/P3eSKnc(;T6fyEul<:v3:X)wI`;YzNEC@9UEMqN6KDo2P2 3A`g:9#f6:h*x');
define('NONCE_SALT',       '|%sr.O1z?KNF1<VWzTh%_|6inCJk/Qx{2r6PmPVA@k+d{yZ2C+-:g6!K[=xiGDaF');
/***#@-*/
/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'wplgp_';
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
