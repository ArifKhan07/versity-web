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
define( 'DB_NAME', 'aladdin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'G#XazRz*V*=#8j=vSra}oHVORt^L4NUPx~8NEN] =1u:s$$*.cVi@0{/Mib3~M@H' );
define( 'SECURE_AUTH_KEY',  'vYje%^9]yJc+-/_p]/TP?#<qUUnMGN9]c87[D]fPO<C8aE$qU}c()o!g N[f4o8`' );
define( 'LOGGED_IN_KEY',    'JI,Wsd;%n<OaB#|]gv@r5dbH.04gi88EZsxO%HaSdFL(eo$ja9V<a7YwmUnC#K8D' );
define( 'NONCE_KEY',        'T(7f:LSBU+2Ker~*|WvF0xr#SEL6KBIVx?QF# X*n{OAF856OPFARU-ciAct]z(i' );
define( 'AUTH_SALT',        'g[,YxXBn^Q/4icA;oS`n05SKW`d/[$tD>-pMVT<_*Cp^${e0J)d=/tl-ESct?gSj' );
define( 'SECURE_AUTH_SALT', '%U%HK`*/k0FEyz{V|^B%z{guqbk!Fx[OL&[ &dPeRS|0U1i2E}C1p~l+VVx!LR^l' );
define( 'LOGGED_IN_SALT',   'wt,G4SF7qEZ.9I%co^Qi88?Q:wpUJ5qCj&&x[G@OAe{~RQ$M;@%*Jcc`{#O]`KRB' );
define( 'NONCE_SALT',       'cGBjIJtAM8$Q`Y>67RUsOq`{@B{] j8S6Cy3wf=}=vPC~m{->;@ ~OT.;hn4_S,(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ak_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
