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
define( 'DB_NAME', '4window' );

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
define( 'AUTH_KEY',         'a2.gw6;wiY,TWTwtuRyXD?l^sVH6%kcDe^X*C]}c)Gv21sL)s93lL-_<+ojnJLs6' );
define( 'SECURE_AUTH_KEY',  'K&0iGwJ,1kcOJn_X+HI|6Iz&vD+V7rYD`$cCAzu344-.g9Bz/F]{*O,[um7T2@BF' );
define( 'LOGGED_IN_KEY',    'f3?d{:r;+)v)C8a[EDG11SEKV%~,*>&a8PJ+< S?Q?Du@qaVFLQ>0aKT9cS~aMK]' );
define( 'NONCE_KEY',        '1sB1+p[5~-tJ{30EO,/m[o$wIiaTF2J[cRs1;}R-Bj7!<XdzW`[5F>/X)mMi/@ti' );
define( 'AUTH_SALT',        '^_YwXqH%vwEZV6*4/{/HZ4YYwkk<$~x-iyF,jVQn{&.ph=]|R0>^Wa(N!*OG56K}' );
define( 'SECURE_AUTH_SALT', 'ah=T}vFc-Sz8+L3+nI.`9R>H#ET{R{~XsnN0k(JlSMaOiRaQ!Me]02X~sqDk$G+i' );
define( 'LOGGED_IN_SALT',   'Rg%x#l]7TXoLuisHh+o&2ZPUp3$ecGZ.O#vjiODPEd)FH9Y;~U}PYsEG4P5}_+;c' );
define( 'NONCE_SALT',       '=9x@tA[3,~xO%VN*a>7+@HxN.=xDR=u(t&tS8:O(XFIT;tpDk{IQ O$z Tpf2+x%' );

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
