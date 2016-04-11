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
define('DB_NAME', 'maksim_wp');

/** MySQL database username */
define('DB_USER', 'maksim_belenkov');

/** MySQL database password */
define('DB_PASSWORD', '7nVH8prVyztH2L9z');

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
define('AUTH_KEY',         'euw=y.;,GS2g*x/aqeJU={BE|vj5hN+{b?DO?E5+M1!)Ouh[%0a>v?7|dxEs45_9');
define('SECURE_AUTH_KEY',  ';IUBj3?;- 52wp=40&}b!d:}Gfa P{hDBFrCjjx_ouF,yiE(>--Pz>Fsh)kfv,e:');
define('LOGGED_IN_KEY',    '+cnXQgLcnhq_qF=<Xi_[[RYrgf]I,Q:/2hY/_m eP9V1&QJSl(:(2*F}bCZ?N?6H');
define('NONCE_KEY',        '/~OK$i%hir(mMf~MzmPIYSzE_OzHfd|-EoOi--aBZ5LLE3&+YORE=&`Onpdqi]5!');
define('AUTH_SALT',        'QXNW(jWIZl|Ev!4JxSyr?|JpX[fJ,Px:.W-,*yrX8u+#;-?-&l49V,B.X{|<sdW/');
define('SECURE_AUTH_SALT', '4MnQs2OLT.v|%_f t< s [t7nS#yj53zkXI17>qCBf[?|^WMZIEa8&t=Zcnt[Jue');
define('LOGGED_IN_SALT',   'OP~|<}PA|^s7K^m3[#-BH@ UaQ^:@=XZvH7!]K92a5R_qZ,h9/YC.ZMO{8H/m0J3');
define('NONCE_SALT',       'Il~yll|6o<SCN{OT|Ii,R1W+O6}UX>pOuQ{+.n]<mhd_Q)*Ap|+B52|2p1QF8GW+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'buggaboo_';

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
