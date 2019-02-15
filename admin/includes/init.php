<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);      //defines this slash symbol \ which is different in different OS
defined('SITE_ROOT') ? null : define('SITE_ROOT', "F:" . DS . "xampp" . DS . "htdocs" . DS . "laiko_rezervacija");
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS. 'includes');


require_once("functions.php");
require_once(SITE_ROOT .DS. "config.php");
require_once("classes" . DS. "database.php");
require_once("classes" . DS. "db_object.php");
require_once("classes" . DS. "user.php");
require_once("classes" . DS. "session.php");
require_once("classes" . DS. "rezervacija.php");



?>
