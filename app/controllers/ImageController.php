<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 02.05.2019
 * Time: 13:27
 */

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

/**
 * Class ImageController
 * @package app\controllers
 */
class ImageController
{

    /**
     * @var string
     */
    private $imagesFolder;

    /**
     * @var PhpRenderer
     */
    private $view;

    /**
     * ImageController constructor.
     * @param string $imagesFolder
     * @param PhpRenderer $view
     */
    public function __construct(string $imagesFolder, PhpRenderer $view)
    {
        $this->imagesFolder = $imagesFolder;
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, array $args) {
        $image = @file_get_contents($this->imagesFolder . $args['url']);
        if ($image === false) {
            return $this->view->render($response, '404.php');
        }
        $response->write($image);
        return $response->withHeader('Content-Type', FILEINFO_MIME_TYPE);
    }

}