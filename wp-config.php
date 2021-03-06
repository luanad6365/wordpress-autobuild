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

define( 'WP_SITEURL','http://'.$_SERVER['SERVER_NAME'] );
define( 'WP_HOME','http://'.$_SERVER['SERVER_NAME'] );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'setawebsite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '=l72 I,gIGe2[KM^BtJ&4N m:*(],(sj6@LW| 0DR16>ZfQ&kCm-pTOPbo+7vw=H');
define('SECURE_AUTH_KEY',  'r{CjJ<OD4uF)_/}B!9|;f+QbX!s`(Uu6zR&MNLY9FgsP8h3;Zi>eB3k `[~$l_9/');
define('LOGGED_IN_KEY',    'q#APEL%pZ vzVdM.Ij./*{8#06QS_wMC9A865z,$s)#[yf=E4go.X4+Jn z=MT!F');
define('NONCE_KEY',        'YnLnNS[H~A]GWRLamotR dftPjlzzNT6{{{JKwvZ4m+F; 90KX!^A|}<lwj64%kg');
define('AUTH_SALT',        '64FX?uuSWvt_,;B&-V C)TLU&n`W//x=%U7Id6$cDU0YS!}_U/^2UsYNqUAPk407');
define('SECURE_AUTH_SALT', 'TUjMuP^$5~cU*-^pD]QA4MCnGjv)9?P;:hHw=<kAh{5hbQ?_%4fqc0{C1/tv0YTB');
define('LOGGED_IN_SALT',   'FDU>Qv2Zb*TwOt^).gGNiPA]8$h>t_FXE&k^GEd_p*g+7bP%Lb|F};:^7BsA=Jcm');
define('NONCE_SALT',       ']sOa5@Xnqo0+.le*4P?$#sFgrytA16M.&dHPj[B_5`z>s9yotlEH`7kG3_<dw}?m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
