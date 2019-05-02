<?php

use app\controllers\MainController;
use app\services\DirScannerService;
use app\services\DirScannerServiceInterface;
use Psr\Container\ContainerInterface;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    /**
     * @param $c
     * @return \Slim\Views\PhpRenderer
     */
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container[DirScannerServiceInterface::class] = function ($c) {
      return new DirScannerService();
    };

    /**
     * @param $c
     * @return MainController
     */
    $container[MainController::class] = function (ContainerInterface $container) {
        return new MainController(
            $container->get('imagesFolder'),
            $container->get(DirScannerServiceInterface::class),
            $container['renderer']
        );
    };

};
