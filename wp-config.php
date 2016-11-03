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

//** Joshua ** //
define('WP_HOME','http://192.168.0.3/natrast/');
define('WP_SITEURL','http://192.168.0.3/natrast/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpnatrast');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'IZ1di/j-s&O0^w-$Gu4R65~N_xl2 |^+_zq-;.vE#FAy2]JOx~Be9)*Oe4)E7vYZ');
define('SECURE_AUTH_KEY',  'OQeI6}EVwiBr:uB<A)(G:+z$hA}n0MV~EtD{W,4q~p]qy$~,J?5 NeLlwJvS@T6(');
define('LOGGED_IN_KEY',    '#/b:.r;@hTc$GdzF@1o2, D 0a_%LtTTS~UOlTwo#nHj^pCUoI[hi8K`UcdnZS<t');
define('NONCE_KEY',        'OG&|-uSG[BeX)J1s_rmsE o!5uE7|FWTqv,-{sGp&{ZF~F>lA cR9D~?pJFgGBxF');
define('AUTH_SALT',        '/K63,?YW+u=0GPn^_W[(Xm`1$mG%@n}b**`Xs1w6F]<R[a!m[zQF>g}<P%cT#<S.');
define('SECURE_AUTH_SALT', '-%dkcRgLd(f@z JSU|AE)|61P{O,( LF<I2W(Q7_oJqvk7VVa*F}n!UJhN1f4I:/');
define('LOGGED_IN_SALT',   'Z$<GILtp+t0!cWQ}nYO+CtgUK!ozYxQdta54|Jv?(7Frx?IF0;*A;qLlL;%Fwg4;');
define('NONCE_SALT',       '>x,3/$(]}v=`!2yx,BS0nB]%@/?5/bX_SB:3`bM_CQIJ73dO;6w=ZxS|z14=NLTU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_natrast';

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
