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
if($_SERVER['HTTP_HOST'] == 'localhost'):
	define('DB_NAME', 'maksim_wp_project');
	define('DB_USER', 'maksim_belenkov');
	define('DB_PASSWORD', '7nVH8prVyztH2L9z');
else:
	define('DB_NAME', 'slashcry_theme_test');
	define('DB_USER', 'slashcry_maksim');
	define('DB_PASSWORD', 'Maksim90');
endif;

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
define('AUTH_KEY',         'QEa5LU#7W+!NIRC:cQ{-V: v|8W7jqO.z8DO7QDS:c]=5L25A^6H{v2kB`Z<MaoK');
define('SECURE_AUTH_KEY',  'j&+|0KElZWvP.3Be@6KBYeSr%P{Q!!2;I#Llodp i]bs]=k.*#5,/H1b/FG-&)Gf');
define('LOGGED_IN_KEY',    'yA-v}VFx@{@VzMy+y5p0nz$4+Ze|QRx:E;hHJA`nG<G_So PiwDYsG?VCR?7CrP1');
define('NONCE_KEY',        'T)!Ax$C/S@UA`dCYCZY(SU6btb4%:i6|?T.--SXu;z-7^c ;9Nm})16b>||o-07~');
define('AUTH_SALT',        '|eE-wX}v%a8}2H#Z)9T!+:P@<|=h98q|vj0PfFsn/GlvJQ9_7gFxryU>UKn#D+{~');
define('SECURE_AUTH_SALT', '6MUvTLm|*_<(bYXyg0Y9s]%KV%`ZNr 0Pmp+WN<-W+PqKbj[EPAoto[xYXKj/2NK');
define('LOGGED_IN_SALT',   '-ri$[Hy6-&x$<1[PTp}o&~]^Q?0ecyFk|wcXPIf~CA}^5q;pB-aE  PF.(~AAPy/');
define('NONCE_SALT',       'Ab.Uh+m!zU=-/-s:ds|E]&e#|_*5@=QMtGG`c+Efj,8rA*ja#Jo6}*J,:aj*ct~^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'project_';

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