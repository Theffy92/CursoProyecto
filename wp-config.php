<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'worpress_curso_project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '/zc?h_eOHO$E?5t[+ADwe}zxJc~}B?0{P,ruF`q15)f@TI-?j{vW,7G8(MOH1*H_' );
define( 'SECURE_AUTH_KEY',  '=!TBz~_zo9<WXqs{Z>keV<!B]<4`HTFuD0Y8XKLii!*?Die&O?Nm_GCV9fFy,oEA' );
define( 'LOGGED_IN_KEY',    '{p4@6NLk:6kg)p2.TV5cc:B:ZP0dBNjdq4NF/>07^-7AUKzG)-O 6`&B sJAn[]@' );
define( 'NONCE_KEY',        '@lF0y&kq7J}2k?!9e2*s[b`cW*kb12WL<J99N~ oT!Q%S`fg49Lcrmlq63jSWSEF' );
define( 'AUTH_SALT',        'e:Bj6TYhOTh_iM<1`PBx~68c*t_L2EMpK^EZ%4;!mcFyCl+P(D-g>2I0E#BE)$rt' );
define( 'SECURE_AUTH_SALT', '%1il?/Y(m%~j?O[GsKuYtbPP2Rjy*]7{X0W/J.@2JNEDO-?}^1Jsl=Sx;a-dsK*B' );
define( 'LOGGED_IN_SALT',   'G[4<k}WhD;_@ALP#Xp+tL$aC`w #CKAJeqN1s-05>5(&%6/Gp$1kYFAr0Qt^H`$N' );
define( 'NONCE_SALT',       'R(t@8$[Xv4T7r6{py]2tT967;GZJD,;O!DA5AM%sf8X^Q;zz1/XV=Q$C+|17$nBA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'project1_';

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
