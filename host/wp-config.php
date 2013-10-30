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
define('DB_NAME', 'ragamalika');

/** MySQL database username */
define('DB_USER', 'ragamalika');

/** MySQL database password */
define('DB_PASSWORD', 'Bramkas123!');

/** MySQL hostname */
define('DB_HOST', 'ragamalika.db.9451960.hostedresource.com');

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
define('AUTH_KEY',         '##C2UtvPqK[%2e,bwT{)4S.u25P<VAA5b>!R9GHB|mo0,@*-{3f$6(A]1kJbGfKD');
define('SECURE_AUTH_KEY',  '-ExAmS[_u0+.M5|#`&tYJRfPkU}?2-6zK{--KUd4;UE7$X$#^.HRb j~f0]M}N%r');
define('LOGGED_IN_KEY',    '55b VK-GaF<|RJ_e_$${,AojePL*ncG(%KeHWmh}WaMqg%|r1En&@mmS/b@f[cu_');
define('NONCE_KEY',        'iEf?6Y{/_NY3YrO-p]$@8[_w)`cJ!g@Wv6g<MkxZ7?!GS#W.5}kk{t:)=;T}4v)x');
define('AUTH_SALT',        'iq4!t<x O=O!_@9(iJO*_AjkPa,E0L3%Xe2yXHYF{VpNYp HCAX.xSc@]{.b1n]^');
define('SECURE_AUTH_SALT', 'zZ3(LCm_v)QDupF)4?%EBdYj6SG?(~H.i*6Hl/o_XW9%$Y6>*SBNY?b13%HB`)7Q');
define('LOGGED_IN_SALT',   'G)uK1a=)@,q&vW*CoPA`vL2Nf%t9M|.HP^xy*E<8;8< L@MR`gd^`thKY:!(Q<|W');
define('NONCE_SALT',       'AFOl!1t$C.8TJi&G#K]l0Wle.9`y[u[$RK!?-4mR<oOSo[8ER]$SAI9 y@cVe2+u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bramkas_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
