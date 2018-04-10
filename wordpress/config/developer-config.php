<?php

//////// DEVELOPER ENVIRONMENT SETTINGS /////////

define('DEVELOPER', getenv("DEVELOPER"));

if( DEVELOPER != '' ) {

    switch( DEVELOPER ){

        case 'Paul':
            define('DB_NAME', 'hyperext_box_platic-card-factory');
            define('DB_USER', 'root');
            define('DB_PASSWORD', 'root');
            define('DB_HOST', 'localhost');
            define('WP_HOME', 'http://plasticcardfactory.local'); // ENSURE WP_HOME IS SET //
            define('WP_SITEURL', 'http://plasticcardfactory.local'); // ENSURE WP_SITEURL IS SET //
            define('WP_DEBUG', true);
            define('DISALLOW_FILE_MODS', false);
            define('FORCE_SSL_ADMIN', false);
            define('ENVIRONMENT', 'development');
            break;

    }

}
