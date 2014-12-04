<?php
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
define('DB_NAME', 'wordpressdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'chqcolectivo');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '(2!s5J@qg_,:/Qa-]B<!~bT/}&}1Dr1r{ba5xp-%-2>DTb sHAC e^D2-tjy9P@1');
define('SECURE_AUTH_KEY',  '|e^>8tO.<ELmywb&zm0c+6/LpA+Xx&M~{!^$BP!-u6. xsp2T#;hm}*|+O5.kqYD');
define('LOGGED_IN_KEY',    'oAWFFMY%phQ_p78BsU|t^7Xv*++P3wa=4s^15BrZA&FTv@*b |]n2L9Rc%/xHe|8');
define('NONCE_KEY',        'jt)2~TBzp-XL-^$M5dChnp32Z=o&!>{sm~m|UXo5j68?]| 6na7UuBJyUobu 5tN');
define('AUTH_SALT',        'LQ,K.@:b>y{HFrL|Ze~-|!u-F]K78sTv5~l5X<xIKS|@ ||p7+OAz7bH8P|;k[= ');
define('SECURE_AUTH_SALT', 'u7}MFnufRecLmOGqY:)5kh-KEbOO#5l)le=!t`Gt-l.ad3[q;|,eFWyTd>A20qr8');
define('LOGGED_IN_SALT',   'NnIP_=kv*}lAm)_h740x>?dhgX3+l$/vCMMGcVjUxzhG>u|w|{Wc-G|!9jTZB--c');
define('NONCE_SALT',       '<ILs@T--(NEFhYjhcf+k:zV!_+5[GG`:Fi5wLC.EKjio1Nj|0QIu<&`CEt<8;rd*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
