<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 03.05.2019
 * Time: 11:47
 */

use app\controllers\ImageController;
use app\controllers\LoginController;
use app\controllers\MainController;
use app\controllers\RegController;
use app\services\DirScanner\DirScannerServiceInterface;
use Psr\Container\ContainerInterface;
use Slim\App;

return function (App $app) {

    $container = $app->getContainer();

    /**
     * @param ContainerInterface $container
     * @return MainController
     */
    $container[MainController::class] = function (ContainerInterface $container) {
        return new MainController(
            $container->get('imagesFolder'),
            $container->get(DirScannerServiceInterface::class),
            $container['renderer']
        );
    };

    /**
     * @param ContainerInterface $container
     * @return ImageController
     */
    $container[ImageController::class] = function (ContainerInterface $container) {
        return new ImageController(
            $container->get('imagesFolder'),
            $container['renderer']
        );
    };

    /**
     * @param ContainerInterface $container
     * @return LoginController
     */
    $container[LoginController::class] = function (ContainerInterface $container) {
        return new LoginController(
            $container['renderer']
        );
    };

    /**
     * @param ContainerInterface $container
     * @return RegController
     */
    $container[RegController::class] = function (ContainerInterface $container) {
        return new RegController(
            $container->get('wallet'),
            $container['renderer']
        );
    };

};