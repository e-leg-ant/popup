<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Totally hide index.php for better SEO
// (avoid pages duplicates)
if (0 === strpos($_SERVER['REQUEST_URI'], '/index.php')) {
    header('Location: /' . ltrim(preg_replace('~^/index\.php~', '', $_SERVER['REQUEST_URI']), '/'), true, 301);
    exit(0);
}

// change the following paths if necessary
$config = __DIR__ . '/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', false);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',  0);

require_once '/var/www/yii/yii.php';

Yii::createWebApplication($config)->run();
