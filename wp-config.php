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
define('DB_NAME', 'codeline_wordpress_films');

/** MySQL database username - localhost */
define('DB_USER', 'root');

/** MySQL database password - localhost*/
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '<W$p7{zCCrcV^mESeZ>:nS_(z4.eHPikdGYuSx2m44zh{V3JUMrLmXeek|v[LwMA');
define('SECURE_AUTH_KEY',  'Z1f:MT~)%$@T T[A~^GykP(ykR|t7~ex2P!HQYc1&()r<dQ]YPwsWxE?DZtaPf^K');
define('LOGGED_IN_KEY',    'cS7~wf^gZ0OuwGhi}pYe.~8+s31n_+DCouSmg;3t>5-A-LRdx+ztfW3U ]vcxbgM');
define('NONCE_KEY',        'eUt&.QijT4z,HQoAEOXey e}i~0BZ,jm:9+2m=$Iwn/yN2W}&uT{Q@hO}AUix(mP');
define('AUTH_SALT',        '<Bb^O/-%bCPx^_-W=NP2I=MI@5|$-/rMkIs=T;_>n6h-I:MkUZX/o%2b-Q.H@`r_');
define('SECURE_AUTH_SALT', '%B9IqAmA.}=>6/QqRyY$Fp;bm=+|bSW->.D6AWtQzu2Z8&yHY5l22JPFMp_`$V6t');
define('LOGGED_IN_SALT',   'mJk@~T!rGO=$SHR@l;NzCC,W54Ad>q$fQE&ZtA+RU7F`M];?86ZX 1>eY-#*cYcX');
define('NONCE_SALT',       '!7N!r-mrb-gC$xH][7P5wWAZ-Z0[j3hky@Vl)EHE3$GO:V5[fa%9.2BBZ&G.$$^i');

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
