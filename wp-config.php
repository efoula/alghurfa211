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
define( 'DB_NAME', 'alghurfa' );

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
define('AUTH_KEY',         'o$$/+|UPj%:L<}oF_1Bj1qBr/IcV^N^D++x}B|nx5qR&s^[YDZ2S w%R^.vVRg#0');
define('SECURE_AUTH_KEY',  'AGSo.IE)RxU@VQ+4u=Kz(Tm5{+Td~l0]S_zBu6h/v^aV<(x{!}M8[qe|oC1_#EQM');
define('LOGGED_IN_KEY',    'JAY+ XB91m{lVe{0_{VlOOq|nM-XVI`XVa]>v&Ig_CW_?PS>0;af$+e3EhJ-<E7@');
define('NONCE_KEY',        'vV8w*Z [8+H$KHsTUH|+21E_da]:IBF9,fv=r1T2u+u.|Qs@]3XC}peYaPEZdA&0');
define('AUTH_SALT',        '?n$BkQ/7ZZ-_}i/^!-@Y%j<qcV4^47@lMJm^|ly@oY?us+c8y_*0h7S+vbJ{b4ta');
define('SECURE_AUTH_SALT', '}CX:lUQz^7GR:Oetp+9JwpMMl&fO-wyWWSuqz5:LFf](aHl-T->V-kuPn)i4Fy* ');
define('LOGGED_IN_SALT',   '@k|:|`ZA8+CvqH:>qsueO*ty(Jq>SwnwjurW}C=je56KW~Z{`ljAZ9x#y_t+|ig0');
define('NONCE_SALT',       '0v>_+ +B%[C[>~mu.-U|4L)DOsdOp$6$h:hOoBoor&T(9y HF}Xq41?+bw4s|T<<');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_securearete_';

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
