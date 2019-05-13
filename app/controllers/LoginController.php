<?php

namespace app\controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Views\PhpRenderer;

/**
 * Class LoginController
 * @package app\controllers
 */
class LoginController
{

    /**
     * @var PhpRenderer
     */
    private $view;

    /**
     * LoginController constructor.
     * @param PhpRenderer $view
     */
    public function __construct(PhpRenderer $view)
    {

        $this->view = $view;
    }

    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return ResponseInterface
     */
    public function __invoke(Request $request, $response, $args)
    {
        $info = '';
        if ($request->isPost()) {
            sleep(1.5);
            $info = 'Incorrect login or password';
        }
        return $this->view->render($response, 'loginForm.php', [
            'info' => $info
        ]);
    }

}