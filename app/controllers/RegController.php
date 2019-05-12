<?php

namespace app\controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Views\PhpRenderer;

/**
 * Class RegController
 * @package app\controllers
 */
class RegController
{

    /**
     * @var string
     */
    private $wallet;

    /**
     * @var PhpRenderer
     */
    private $view;

    /**
     * RegController constructor.
     * @param string $wallet
     * @param PhpRenderer $view
     */
    public function __construct(string $wallet, PhpRenderer $view)
    {
        $this->view = $view;
        $this->wallet = $wallet;
    }

    /**
     * @param Request $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(Request $request, ResponseInterface $response, array $args)
    {
        $login = $this->stringGenerator(10);
        $password = $this->stringGenerator(7);
        return $this->view->render($response, 'registrationForm.php', [
            'login' => $login,
            'password' => $password,
            'wallet' => $this->wallet
        ]);
    }

    /**
     * @param int $charNumber
     * @return string
     */
    private function stringGenerator(int $charNumber)
    {
        $symbolsArray = array_merge(range('0', '9'), range('A', 'Z'), range('a', 'z'));
        $generatedString = '';
        for ($i = 0; $i < $charNumber; $i++) {
            $generatedString .= $symbolsArray[array_rand($symbolsArray)];
        }
        return $generatedString;
    }

}