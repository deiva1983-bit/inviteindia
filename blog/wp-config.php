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
define('DB_NAME', 'inviteindia_blogs');

/** MySQL database username */
define('DB_USER', 'InviteDB123');

/** MySQL database password */
define('DB_PASSWORD', 'DBDeiVa!Kavi123DB');

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
define('AUTH_KEY',         'n_frq..6^CzIq?]-o0jUX@g}v:6#Ib@(o-dD~3#)^Y3D+O_0/b4SZk#MNkzSx>Xf');
define('SECURE_AUTH_KEY',  ' foZcg~M4JEu$m_r;]!A(*gj=!oZvt I)a-(5.oG;nt$$]njPMha&&^(ewgY)Q>O');
define('LOGGED_IN_KEY',    'OIEn6]qmM}Rf^T2?iOtxh;a-lB*zM3WL[})B~H,X|9R6M{=?7Ny]& h=t3`RT$[;');
define('NONCE_KEY',        'S|cWK`<.!8`dpd9AHlHIzcZ>.g|s~@s2|GMg* 7[UDUcNjzZ_sy`.;r$8(z0Ttl[');
define('AUTH_SALT',        '[uF1ne,3W ETY=UcVzuOWH*Z~7~+u&/&=Yp;PjnRro!!~1&^fS?QhnpC=a_Kv_*L');
define('SECURE_AUTH_SALT', '7^i^@V(Tn3_5@_m-~(0+^L_BBRBrO3~9!N4[/kHz):fV1v,M}SzbYkU2lU2-=eJE');
define('LOGGED_IN_SALT',   'A ?Hwx#B`hLDXdsH#}FQku] Z+Bc&ktPYPp4pMEHeX6i9z|BlPfB]f bDZ99#}$E');
define('NONCE_SALT',       'MVTq 2TJdKAWMu6y+Jsg_1~lA%LE0DmS#U(1Xi*tap2Aq-RXFt2?i(q6D*3ZNs{B');

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
