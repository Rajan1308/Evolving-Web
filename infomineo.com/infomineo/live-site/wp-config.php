<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

define( 'WP_CACHE', true ); // Added by WP Rocket




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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'infominesite' );

/** MySQL database username */
define( 'DB_USER', 'infominesite' );

/** MySQL database password */
define( 'DB_PASSWORD', 'X9zk8WZV26' );

/** MySQL hostname */
define( 'DB_HOST', 'infominesite.mysql.db' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';D%1L?4b2WjXq0iEC(afFL/>{V{F6lH0rE(I`o|il}Hw}d^[l>Y$FTORcu*0`e3h' );
define( 'SECURE_AUTH_KEY',  '$o8} 9yN;dD#v1AFyc6aPq(c2V|Zu#PtwC63>2EnZG[~R!#dEq4c1_rWf lY&5>O' );
define( 'LOGGED_IN_KEY',    '6]HW)oVrD3mQ:)}%_w,{8k4(itYUcabb7$d;J!0%u5jAG6;frvlnvUekA-dIr3H ' );
define( 'NONCE_KEY',        ':b!cpaBe]FTR^7p,W&hW1DNbZ= 7,QHMI}9z&.h,5v`ID_*Z_XTeA*rUst|iX)$@' );
define( 'AUTH_SALT',        'jO5[HEns[2R9W*+om4P4w@jtOi|~zLbQPan;3{dfsH!tS,GK[nMB6Q;Ya]pSGZad' );
define( 'SECURE_AUTH_SALT', 'Zph@2>bOxqOmKpJakY<LmWo+$x@Fo=<.:h4KWpJuF3H.9,@olz&iwOzAaW((/o#}' );
define( 'LOGGED_IN_SALT',   '%Fr]*t<?.+)I+M2@BnE.s$R*c~^L_woFwl3vYB=6ukk%=n@F+Sjy#h%CTSP,!Aiv' );
define( 'NONCE_SALT',       '-63LTqh@@F+s9m`^VV6n4}=2,W%<3$~=g>;,P,Np-y0MgAs42s|}/IwEKC!+Fr%7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// Your license KEY.
if ( ! defined( 'WP_ROCKET_KEY' ) ) {
    define( 'WP_ROCKET_KEY', 'ef54c0cf');
}
// Your email, the one you used for the purchase.
if ( ! defined( 'WP_ROCKET_EMAIL' ) ) {
    define( 'WP_ROCKET_EMAIL', 'subs@digitalnexa.com' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
