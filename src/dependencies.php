<?php

use Psr\Container\ContainerInterface;
use Slim\App;

return function (App $app) {

    $container = $app->getContainer();

    // view renderer
    /**
     * @param $c
     * @return \Slim\Views\PhpRenderer
     */
    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

};
