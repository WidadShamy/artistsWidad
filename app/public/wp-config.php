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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'ggNoOlV.ll=LR2W)aYd*-e569:T,6#scj|O4Fp3.bciX#)+QCWLX2P_ _`W5~^$2' );
define( 'SECURE_AUTH_KEY',   'ktgWnF2Npb7_HQdTbWW7lU3orYrqy@hc+{h.xLW{$*0^40#cx?sL/-D=;7mKIWi+' );
define( 'LOGGED_IN_KEY',     '+%RhyP=)Yh6 I*7[^.~AojijID5c?*XwA+)<RU+J55|m%s13Q[!0>8;Auv:!X_^i' );
define( 'NONCE_KEY',         '{;a`72X{.Ay^LP5:]b9;cWyP)Vu<^1_nwQo$NOz!$(oi@POq51a*h;$`.U|[!s_+' );
define( 'AUTH_SALT',         '2fdIdQ0I]}JY2Le@*?*%+|N$S34PWgg3-a_A8%W#d^Ew+sy_TY~`}++~D.%;Da{)' );
define( 'SECURE_AUTH_SALT',  'y]V|A6HonZ;ayW H9?jm&BxsI!P,9X%T 0H`]d{7lr&EEwuUHu-b }nQXK47w:YP' );
define( 'LOGGED_IN_SALT',    'kLwpOhZ}Ckd;OlvHAAM%9T?K/CA2*[Tmq[ug3q1&m2IP<Bc(#7;YPz,]N:kJcV~=' );
define( 'NONCE_SALT',        'W::.7qvJQjrI-~glR0{MN:E~;[bH%*3>8f.>7!,LD[)LV_cdP1Mk~:N|i,+Rnu O' );
define( 'WP_CACHE_KEY_SALT', ' Tu@j!cO@$.xH{`Pf;wL3x4)U~P>xAO84j*kmuL<!<ii[H~L/W5Ek#`=L{ok,~)v' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
