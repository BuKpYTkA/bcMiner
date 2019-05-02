<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 02.05.2019
 * Time: 12:02
 */

namespace app\controllers;

use app\services\DirScannerServiceInterface;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

/**
 * Class MainController
 * @package controllers
 */
class MainController
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var string
     */
    private $imagesDir;
    /**
     * @var DirScannerServiceInterface
     */
    private $dirScanner;
    /**
     * @var PhpRenderer
     */
    private $view;

    /**
     * MainController constructor.
     * @param string $imagesDir
     * @param DirScannerServiceInterface $dirScanner
     * @param PhpRenderer $view
     */
    public function __construct(string $imagesDir, DirScannerServiceInterface $dirScanner, PhpRenderer $view) {
        $this->imagesDir = $imagesDir;
        $this->dirScanner = $dirScanner;
        $this->view = $view;
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function __invoke($request, $response, $args) {
        $images = $this->dirScanner->scan($this->imagesDir);
        return $this->view->render($response, 'main.php', [
            'images' => $images
        ]);
    }
}