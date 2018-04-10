<?php

$contentTypes = array( 'css' =>  'text/css', 'js' => 'text/javascript', 'svg' => 'image/svg+xml');
$wpPath= dirname(dirname(__FILE__));

if( isset($_GET['cfile']) ): $cFile = $_GET['cfile']; unset( $_GET['cfile'] ); else : $cFile = ''; endif;
if( isset($_GET['cext']) ): $cExt = $_GET['cext']; unset( $_GET['cext'] ); else : $cExt = ''; endif;
if( isset($_GET['cname']) ): $cName = $_GET['cname']; unset( $_GET['cname'] ); else : $cName = ''; endif;
if( isset($_GET['cpage']) ): $cPage = $_GET['cpage']; unset( $_GET['cpage'] ); else : $cPage = ''; endif;

if($cExt == '') {
    $ext = pathinfo($cFile, PATHINFO_EXTENSION);
    if( array_key_exists( $ext, $contentTypes) ){
        $cFile = substr($cFile, 0, -strlen($ext));
        $cExt = $ext;
    }
}

switch ($cName) {

    //login
    case 'login.php':
        require( $wpPath . '/vendor/wordpress/wp-login.php' );
        break;

    //rewrite
    case 'rewrite':
        require( $wpPath . '/vendor/wordpress/'.$cPage.'.php');
        break;

    //admin
    case 'admin':

        if( $cExt != '' ) :

            $_SERVER['PHP_SELF'] = '/wp-admin/' . $cFile . '.' . $cExt;
            if( array_key_exists( $cExt, $contentTypes) )
                header("Content-type: ". $contentTypes[ $cExt ]);
            require( $wpPath . '/vendor/wordpress/wp-admin/' . $cFile . $cExt );

        elseif ( !empty( $cFile ) && $cFile != '/' ) :

            $_SERVER['PHP_SELF'] = '/wp-admin/' . $cFile;
            require( $wpPath . '/vendor/wordpress/wp-admin/' . $cFile );

        else :

            $_SERVER['PHP_SELF'] = '/wp-admin/index.php';
            require( $wpPath . '/vendor/wordpress/wp-admin/index.php');

        endif;

        break;

    case 'includes':
    
        //includes
        if( $cExt != '' ) :
            if( array_key_exists( $cExt, $contentTypes) )
                header("Content-type: ". $contentTypes[ $cExt ]);
            require( $wpPath . '/vendor/wordpress/wp-includes/' . $cFile . $cExt );

        elseif ( !empty( $cFile  ) ) :

            require( $wpPath . '/vendor/wordpress/wp-includes/' . $cFile );

        else:

            require( $wpPath . '/vendor/wordpress/wp-includes/index.php');

        endif;

        break;

}