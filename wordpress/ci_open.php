<?php 
$codeIgniterVendorPath = dirname(dirname(__FILE__)) . '/vendor/ellislab/codeigniter';
/**
 * This file is pretty much index.php with a few modifications
 * which are:
 *    - the loading of the front controller is removed from the bottom since
 *      this file is now included from ci_model_remote_open.php
 *    - when setting $system_folder and $application_folder we check for previous
 *    existence of those variables so we can set them previous to including
 *    ci_model_remote_open.php. This way it's more flexible.
 *    - error reporting control has been removed
 */
 
//--------------------------------------------------------------------------------------

/*
|---------------------------------------------------------------
| SYSTEM FOLDER NAME
|---------------------------------------------------------------
|
| This variable must contain the name of your "system" folder.
| Include the path if the folder is not in the same  directory
| as this file.
|
| NO TRAILING SLASH!
|
*/
if( !isset($system_folder) )
    //$system_folder = "system";
    //$system_path = $codeIgniterVendorPath . '/system';
    $system_folder = $codeIgniterVendorPath . '/system';

/*
|---------------------------------------------------------------
| APPLICATION FOLDER NAME
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. The folder 
| can also be renamed or relocated anywhere on your server.
| For more info please see the user guide:
| http://www.codeigniter.com/user_guide/general/managing_apps.html
|
|
| NO TRAILING SLASH!
|
*/
if( !isset($application_folder) )
    // $application_folder = "application";
    $application_folder = dirname(dirname(dirname(__FILE__))) . '/rt';


/*
|===============================================================
| END OF USER CONFIGURABLE SETTINGS
|===============================================================
*/


/*
|---------------------------------------------------------------
| DEFINE APPLICATION CONSTANTS
|---------------------------------------------------------------
|
| EXT        - The file extension.  Typically ".php"
| FCPATH    - The full server path to THIS file
| SELF        - The name of THIS file &#40;typically "index.php&#41;
| BASEPATH    - The full server path to the "system" folder
| APPPATH    - The full server path to the "application" folder
|
*/
define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define('FCPATH', __FILE__);
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_folder.'/');

if (is_dir($application_folder))
{
    define('APPPATH', $application_folder.'/');
}
else
{
    if ($application_folder == '')
    {
        $application_folder = 'application';
    }
    define('APPPATH', BASEPATH);
}
echo APPPATH;
/*
|---------------------------------------------------------------
| DEFINE E_STRICT
|---------------------------------------------------------------
|
| Some older versions of PHP don't support the E_STRICT constant
| so we need to explicitly define it otherwise the Exception class 
| will generate errors.
|
*/
if ( ! defined('E_STRICT'))
{
    define('E_STRICT', 2048);
}

/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
require(BASEPATH.'core/Common'.EXT);
/*
 * ------------------------------------------------------
 *  Define a custom error handler so we can log PHP errors
 * ------------------------------------------------------
 */
set_error_handler('_exception_handler');
set_magic_quotes_runtime(0); // Kill magic quotes
/*
 * ------------------------------------------------------
 *  Instantiate the base classes
 * ------------------------------------------------------
 */

$CFG     =& load_class('Config');
$LANG    =& load_class('Language');

/*
 * ------------------------------------------------------
 *  Load controller
 * ------------------------------------------------------
 *
 *  Note: Due to the poor object handling in PHP 4 we'll
 *  conditionally load different versions of the base
 *  class.  Retaining PHP 4 compatibility requires a bit of a hack.
 *
 *  Note: The Loader class needs to be included first
 *
 */
if (floor(phpversion()) < 5)
{
    load_class('Loader', FALSE);
    require(BASEPATH.'codeigniter/Base4'.EXT);
}
else
{
    require(BASEPATH.'codeigniter/Base5'.EXT);
}

// instantiate a "fake" controller
$CI = load_class('Controller');

/*
 * ------------------------------------------------------
 *  Prepare for model instantiation
 * ------------------------------------------------------
 */

// load Model parent class
require_once(BASEPATH.'libraries/Model'.EXT);

/**
 * Again, cannibalized from the end of "system/codeigniter/CodeIgniter.php",
 * this takes care of cleaning up after a model
 */
 
//--------------------------------------------------------------------------------------


/*
 * ------------------------------------------------------
 *  Close the DB connection if one exists
 * ------------------------------------------------------
 */
if (class_exists('CI_DB') AND isset($CI->db))
{
    $CI->db->close();
}

$system_folder = "CodeIgniter/system";
require_once('ci_model_remote_open.php');