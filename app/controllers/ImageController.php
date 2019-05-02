<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 02.05.2019
 * Time: 13:27
 */

namespace app\controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ImageController
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * MainController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, array $args) {
        $dir = $this->container->get('imagesFolder');
        $image = @file_get_contents($dir . $args['url']);
        if ($image === false) {
            return $this->container->get('renderer')->render($response, '404.php');
        }
        $response->write($image);
        return $response->withHeader('Content-Type', FILEINFO_MIME_TYPE);
    }

}