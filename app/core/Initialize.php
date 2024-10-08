<?php
namespace App\Core;

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . 'xampp'.DS. 'VG-projects');
//xampp/VG-Projects
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'app' . DS . 'core');

require_once(INC_PATH.DS."config.php");

require_once(CORE_PATH . DS ."task.php");
require_once(CORE_PATH . DS ."user.php");
require_once(CORE_PATH . DS ."auth.php");
require_once(CORE_PATH . DS ."token.php");

