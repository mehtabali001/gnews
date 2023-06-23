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
define( 'DB_NAME', 'gnews' );

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
define( 'AUTH_KEY',         'cqy:X;4C:&+w9>f/zSC~>>~:C#^T|g6)d8xW.i*5~^w$!goifZ.%,y/E^T{a7Hp ' );
define( 'SECURE_AUTH_KEY',  '4(h&<a*K,kt^Y:F#polo?p_V/Z6:SFTHY7 Q4pzJxTbr5oCbKHo]kV?r@UCQ>ORS' );
define( 'LOGGED_IN_KEY',    'MdLl<B;,S|kG$Itar-)6Y$;,QB62^Y^[k75{IVmv}$HMZ/IT,vt&*#%|.)1cN^Ts' );
define( 'NONCE_KEY',        '6QF+,8~:>nJD?zVK8P@h-A&V#_]6(BhK^_oNBil,a}OH0j` YBW7c$Y^NnxtQ83j' );
define( 'AUTH_SALT',        'ai.#@hUD+XF@q.U=$F~.SOkJ+(OJV_8TK1PC6XNUM,-KXgDeOdrl(_!X,W#5JHC0' );
define( 'SECURE_AUTH_SALT', '&dCa8QSsTVA.)[W@;uNg?C<U5truAKMke>G69h{>uh^phedS$,Iw1j]{)wB_n:_t' );
define( 'LOGGED_IN_SALT',   '3O5@tt+1}m_-!&%;+*z%I_@CuP@t?2`AY@;kgJv+wl 2iL#SO8iJqZSC7BE|;S*p' );
define( 'NONCE_SALT',       '0||Oe./`wi)k=lWll|U<oc]8m,FQCB7@-`O!cLU>_$EI83a&J-G%}Z)08XsS=}PX' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
