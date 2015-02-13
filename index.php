<?php

/*if (session_status() == PHP_SESSION_NONE) {
  session_start();
}*/

if (!isset($_SESSION)) {
  session_start();
}

/** Error reporting on **/
error_reporting(E_ALL);

/** Define site's path constant **/
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH', $site_path);

/** Include additional files **/
$optional = array(
  'functions',
);

for ($i = 0; $i < count($optional); $i++) {
  include_once __SITE_PATH . '/includes/' . $optional[$i] . '.php';
}

/** Include app's core files **/
$cores = array(
  'router',
  'model',
  'view',
  'controller',
);

for ($i = 0; $i < count($cores); $i++) {
  include_once __SITE_PATH . '/app/' . $cores[$i] . '.class.php';
}

/** Auto load model classes **/
function __autoload($model_name) {
  $filename = strtolower($model_name) . '.model.php';
  $file = __SITE_PATH . '/model/' . $filename;

  if (!file_exists($file)) {
    return false;
  }
  include_once $file;
}

$router = new router(__SITE_PATH . '/controller');
$router->load();

?>
