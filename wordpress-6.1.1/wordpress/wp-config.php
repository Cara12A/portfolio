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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'S#<I^8x:izJE5Mwn#O5O8cr;p5*u!W*0XiKy>Q Y0_U?.^D0f-2FP5`<L<j3P~[P' );
define( 'SECURE_AUTH_KEY',  'TUi[G+]|:Q)#r2LDih->ieCMFk>LN/5;PJ9U60}k:Ez=TbaA?cfVs1(afwH_v&1x' );
define( 'LOGGED_IN_KEY',    'JeD%[vu!bDct-A|<%Q(<iD|}>|9lL?fvQXL<Vp&e#8Pw;:4}?^MrO#o?_:o/:VQ:' );
define( 'NONCE_KEY',        ',Wc#a&qfy8&}8EMb1P*LxfHj2@TSMI^*Ipf+ny4a}1]$fd`|h#`]2|zrmLv},rY=' );
define( 'AUTH_SALT',        'G17sNDE3Kx>T`<R%!_MJA/B)a~SiWXsDZGgAQ7+qD1A_C^Rx!j?0nULML$h&&zU?' );
define( 'SECURE_AUTH_SALT', 'SsT 6)ULRlt~Z5u]M,!Qj0e9;!rM/xCxrz=1W|-OZzUwOAc2E wlM_Xt*:AZIOO2' );
define( 'LOGGED_IN_SALT',   '&kw@5cDO028J8SE@xH+EBO}@[kyt>muiW`s&+h*8-xHh*F0T~,vK?bRT6&4B[c$;' );
define( 'NONCE_SALT',       '9AHm(0VEhD?TvDsR}-G$kWZ}5)rsfs-.fK3S|Ptc:cQ`%xx*|}ZNrY2./v!5U$0d' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
