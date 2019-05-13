<?php

use app\controllers\ImageController;
use app\controllers\LoginController;
use app\controllers\MainController;
use app\controllers\RegController;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->get('/tax', MainController::class);
    $app->get('/image/{url}', ImageController::class);
    $app->map(['GET', 'POST'], '/login', LoginController::class);
    $app->get('/reg', RegController::class);
};
