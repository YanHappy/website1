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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/var/www/demo/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'aaaaaaaaaaaaaaaaaaaaaa');

/** MySQL database username */
define('DB_USER', 'aaaaaaaaaaaaaaaaaaa');

/** MySQL database password */
define('DB_PASSWORD', 'aaaaaaaaaaaaaaaaaaa');

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
define('AUTH_KEY',         '[HdA pZ:p0LvFTaiQ}d5U7>[ynqu>Am<ddJ9vRfsNBo<_.Vxu!T$v{1L2g|m1V^D');
define('SECURE_AUTH_KEY',  'OF2 Ub9M8$B-&2./T]=W*ItsJs_[g<e/dv=RF;%Uyh[!tou[AQ~@L[R:f6seJ8Th');
define('LOGGED_IN_KEY',    '8:r]eh+Y,dn{=YB6>?*gZNt.s4fGdugb@#mZ5*s|2xM4fg3g<0(pR_Ux`:wHfbs`');
define('NONCE_KEY',        '8HaztrCo6I,vj]3gQ*r4~T^hq`GNADlwI6e=|[i5|FTqPqO0`T=usAtC(5D-jFhS');
define('AUTH_SALT',        'HsThMAhAv2RmQqF:qT+d>{:6uom(LAWlHsGi:a}^a`Vz(6X+5c-TEOa)?WI@m*Y=');
define('SECURE_AUTH_SALT', '-6u6QjT#r5St5@RZ]`6</Ae=`&}~zIIX,MZIqgkA!]3a]{-qHf5sBsc2>MIhv>xJ');
define('LOGGED_IN_SALT',   'a,* n:j}v*`A[ba+lAH)-`=*wUCYyO>i)SUdCn}!dgg}F@o:ta[s /mS;^nZ:j{j');
define('NONCE_SALT',       '3;I}yk$bMxW0Pt6(WjCBmO7c}tggM]!!*;ow ,4!.*2`YF>u9~_ZXQs._t$fYJ@Y');

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
