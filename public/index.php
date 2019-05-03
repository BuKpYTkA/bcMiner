<?php
//if (PHP_SAPI == 'cli-server') {
//    // To help the built-in PHP dev server, check if the request was actually for
//    // something which should probably be served as a static file
//    $url  = parse_url($_SERVER['REQUEST_URI']);
//    $file = __DIR__ . $url['path'];
//    if (is_file($file)) {
//        return false;
//    }
//}

if (PHP_SAPI == 'cli-server') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/../src/dependencies.php';
$dependencies($app);

$controllers = require __DIR__ . '/../src/controllers_dependencies.php';
$controllers($app);

$services = require __DIR__ . '/../src/services_dependencies.php';
$services($app);

// Register middleware
$middleware = require __DIR__ . '/../src/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

// Run app
$app->run();
