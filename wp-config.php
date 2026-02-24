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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'rJ[q=,+J|1?4eR3I&+!)z35-TT/u6%E3S->fxXRjA/SR)b,v={rI:Esl&c_A*OjV' );
define( 'SECURE_AUTH_KEY',   '**5{cn-MnUk:claB)jA:W8!?p(KQ]JT@xrf?2lV^?8B2kX-z!{ @ vlE7`>!Ei6&' );
define( 'LOGGED_IN_KEY',     '71xumhp4QOJvt~O8: (<kU!Jk;p-yud@c0!P?LS2=L;FhQ>gl/dONQM/oM.EF;9L' );
define( 'NONCE_KEY',         '6W*K`kuNKL0cuUL^_wp!:[=R,1.cc325;C5qrKiWe&tt.Yc+ou*Mz!Okp$Q?X4,|' );
define( 'AUTH_SALT',         '3(AVX%{<fidxHx5;Kv [b<X*GS|AtNJr!XE+I^v*?NlL8Jd.l/u7%yT8EhRMm:c?' );
define( 'SECURE_AUTH_SALT',  'f0JK&~QpXYIK=27^+]Y?AT#O;d+$e`Ny[y]n-Gl-G$Fuwl|0wF$R.X_K1I~|b~rM' );
define( 'LOGGED_IN_SALT',    ',kX,0cx!E!v7.4|9X]Dd0F&rrcuy2$,3QVg^$LFPDFj XObEjv!t>I-~cS0]/^j[' );
define( 'NONCE_SALT',        ':Co&Qp=h}PTWAYasB};/fJ+79D>h6n/KaoLf5qbcJ-por2Uiu`UvdS8C}XwZnCx,' );
define( 'WP_CACHE_KEY_SALT', '4:JsR/tfy(bqV)(MwC^1/2STfP^#ilbfQ26X`?ED>p_:H))]dt{aj9FARX;[l`+B' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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

define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', false);

define('WP_POST_REVISIONS', false);
define('AUTOSAVE_INTERVAL', 300);
define('EMPTY_TRASH_DAYS', 30);
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '256M');
define('DISALLOW_FILE_EDIT', true);
define('WP_AUTO_UPDATE_CORE', false);
define('WP_ALLOW_REPAIR', true);

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
