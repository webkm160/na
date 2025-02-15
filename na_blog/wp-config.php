<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'na' );

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
define( 'AUTH_KEY',         '/.%&L-QH8A)Y5L6#mkn6]8u!.R&?Wyvas;_SG5Q&WI{U3}5to,0C0UrtG,Wzc<rC' );
define( 'SECURE_AUTH_KEY',  'E~W{y,YKY1!/eG:$0,bo28WO7C1##%FR u)*H_;@Id]#  R,k$*{QE<(V1k4dI^g' );
define( 'LOGGED_IN_KEY',    '$1t~c1$_$hkM*lv+22l7vR,(i*H2~:X}MXe>-7K.61Vg+}0^LP,<e 94,=UuCyMs' );
define( 'NONCE_KEY',        '8hjwkZI!)E.kkU7w.!o|3U0%r`rOS4+[v]G_Me8^>Sp3oRY0GLX1Ml=kddNp?5VQ' );
define( 'AUTH_SALT',        '&i9Ul|cq?Y;?33}V?iX*N!dgt;3b5[Ng}:`7D~`l E/aV6CeOV=a-k?Z<(DDK:A;' );
define( 'SECURE_AUTH_SALT', '#S4`&M2J[&JCtb!=`.=trimdoe6(Q3VFXd<@+CkwKS;WbdCOU:L]&o^:4F::C% J' );
define( 'LOGGED_IN_SALT',   '1jRFV#}9)2ij8?HLK<mDt6Rl]-fq$+E7wb=j} ?~b|r`>`p(rpV8s9Xs_*8FB1lL' );
define( 'NONCE_SALT',       '?2LR84.vxhMam7T8zF,zz*M`Jup3DQjaIyZb4F3F-~-se?5*XIKP7PwV%l6~*>v?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'na_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
