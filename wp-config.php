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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'yuna' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '5Mw*].;Sce+9,JIA?O;e@DOd]NGsa0MG}V(W^vDoEJH]CM>-*S~$s4afQ]K7d(AS' );
define( 'SECURE_AUTH_KEY',  'J9h) EY5;2r6Zw,Y}MQ#Vir6w(]bM>={GfUvGOE_*>Xv5bOT$u_rJ?N%J!Fx,Kf=' );
define( 'LOGGED_IN_KEY',    'kg5p{=RcV?iyEh{a@4uWPDYV7VX9_v~bg8V2~,Qd91a:-wrnOCq(+{:uoO1Zy*nt' );
define( 'NONCE_KEY',        '-- Uv>Ob]EQun|lZf,)@=Tk$+#VcF<Tz?hx5pMl@,HXB:B _RUlslB%$`9)vF2g%' );
define( 'AUTH_SALT',        'TFQ^0YNL,OHQbjOJWqumz7)]6roWZ/D25NJB#LwXGapN#5DcDQP/ jr,Hk!1cyTx' );
define( 'SECURE_AUTH_SALT', 'G0&O3c6X~qCm6l>Ae$5_kkojP=rr3=];6v;%*Br 1A|&_z!RKO7x3mimdB]6&DNi' );
define( 'LOGGED_IN_SALT',   ']F+P6`}_$Rv(-hwSj!wUQ9I3QY]X?maJa$KD_$pKtb#~!nadRIga*x/)j9bRPRbh' );
define( 'NONCE_SALT',       'J.`i;:>CHuI;[^{!tIk=|UovT]2&$w3*Jjib1Al1W=>4;EG]Lo$8_A}|Y*y]mzOK' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpyuna_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_ALLOW_MULTISITE', true);
	define( 'MULTISITE', true );
	define( 'SUBDOMAIN_INSTALL', true);
	define( 'DOMAIN_CURRENT_SITE', 'yuna.loc' );
	define( 'PATH_CURRENT_SITE', '/' );
	define( 'SITE_ID_CURRENT_SITE', 1 );
	define( 'BLOG_ID_CURRENT_SITE', 1 );

	/*define('ADMIN_COOKIE_PATH', '/');
	define('COOKIE_DOMAIN', '');
	define('COOKIEPATH', '');
	define('SITECOOKIEPATH', '');*/

/*define('WP_ALLOW_MULTISITE', true);
	define( 'MULTISITE', true );
	define( 'SUBDOMAIN_INSTALL', true);
	define( 'DOMAIN_CURRENT_SITE', 'yuna.loc' );
	define( 'PATH_CURRENT_SITE', '/' );
	define( 'SITE_ID_CURRENT_SITE', 1 );
	define( 'BLOG_ID_CURRENT_SITE', 1 );

	define('ADMIN_COOKIE_PATH', '/');
	define('COOKIE_DOMAIN', '');
	define('COOKIEPATH', '');
	define('SITECOOKIEPATH', '');*/

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


	/** Завантаження без FTP. */
	define('FS_METHOD', 'direct');

	/* Отключение редактирования файлов в админке WP */
	define('DISALLOW_FILE_EDIT', true);