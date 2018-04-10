<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Custom config for developers of Cultivate Wordpress ** //

if ( file_exists( dirname( __FILE__ ) . '/developer-config.php' ) ) {

    //DEVELOPMENT SITE CONFIGURATION
    include( dirname( __FILE__ ) . '/developer-config.php' );

}

if ( file_exists( dirname( __FILE__ ) . '/master-config.php' ) ) {

    //MASTER SITE CONFIGURATION
    include( dirname( __FILE__ ) . '/master-config.php' );

}

/** MySQL hostname */
if ( !defined( 'DB_HOST' ) ) {
    define( 'DB_HOST', 'localhost' );
}

define( 'WP_DEFAULT_THEME', 'core' );
define( 'WP_AUTO_UPDATE_CORE', false );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */

if ( !defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', false ); // debugging mode: 'true' = enable; 'false' = disable
}

define( 'WP_POST_REVISIONS', 10 ); // set the number of revisions
define( 'WP_ALLOW_REPAIR', false ); // wp-admin/maint/repair.php
define( 'WP_ALLOW_MULTISITE', false ); // multisite
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'DISALLOW_FILE_EDIT', true );

if ( !defined( 'DISALLOW_FILE_MODS' ) ) {
    define( 'DISALLOW_FILE_MODS', true ); // Disable Plugin and Theme Update and Installation
}

if ( !defined( 'FORCE_SSL_ADMIN' ) ) {
    define( 'FORCE_SSL_ADMIN', true ); // force ssl on admin
}

define( 'WPLANG', 'en_GB' );

/* That's all, stop editing! Happy blogging. */

define( 'WP_CONTENT_DIR', dirname(dirname(dirname( __FILE__ ))) . '/web/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/plugins' );

/** Absolute path to the WordPress directory. **/
if ( !defined( 'ABSPATH' ) )
    define( 'ABSPATH', dirname(dirname(dirname(__FILE__))) . '/vendor/wordpress/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );