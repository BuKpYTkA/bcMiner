<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 03.05.2019
 * Time: 11:48
 */

use app\services\DirScanner\DirScannerService;
use app\services\DirScanner\DirScannerServiceInterface;
use Slim\App;

return function (App $app) {

    $container = $app->getContainer();

    /**
     * @return DirScannerService
     */
    $container[DirScannerServiceInterface::class] = function () {
        return new DirScannerService();
    };

};