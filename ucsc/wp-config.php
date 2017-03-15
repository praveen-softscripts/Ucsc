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
define('DB_NAME', 'hikerco_ucsc');

/** MySQL database username */
define('DB_USER', 'hikerco_uscs');

/** MySQL database password */
define('DB_PASSWORD', 'Lvt+;wF^n!z(');

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
define('AUTH_KEY',         ')*>wOp,.%Q)L_@x uC _>xic#s;P]GMr3?@MDcb_z>11D?36GO+$FqisDvo?w0>q');
define('SECURE_AUTH_KEY',  't+iPE3OdJW]5:o s#sQ{=XwPIRe+]4ntg20SkC)rLo+;4d3l_iA}50=(q*N&<Hl=');
define('LOGGED_IN_KEY',    'zhk49xD~QHX~RVn_k[d@bN$w2tw`f4q1M{&_v5Jld;>ih)-4i||Gg*ne=&/6|e$|');
define('NONCE_KEY',        'M#nIKEKJcj):[YF+lW08QWd(&oApLH]1lVz?wBmTcn96uB[zE*$!V53Nq}Za,7$7');
define('AUTH_SALT',        '||ZXZ@_~!OJmx>4=rnNKssum@E2^PA]BIACYy3TpyDc[mlrD^q6u4tJ=YDJ lXp<');
define('SECURE_AUTH_SALT', '<@64zliRq[t6fD$5fcEjC}jNcYv/4b!kH~j0?+B3 }bQ/E+<H:S)_<lx#q`59H]4');
define('LOGGED_IN_SALT',   '4A0EA,g$m-h%o_j3Ef|$-ZT03NN6+KkPjv.e*JE}k~BWR;[=_`&USw}ZV9Nuq$a]');
define('NONCE_SALT',       '|boO7#3IE|(3(/Wj$%zWO[@LD)k^Y)=j?S%{L?k?MS)(E@BC!ho&6fk]Y6^QtUH3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
