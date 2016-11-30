<?php

namespace App;

class Route extends \Klein\Klein
{
    private $twig;

    /**
     * Instance class twig, create routes && verify if fails and dispatch
     */
    public function ready()
    {
        $this->twig = new Libs\Twig();
        $this->routing();
        $this->fails();
        $this->dispatch();
    }

    /**
     * Creating routes
     */
    public function routing()
    {
        $this->respond('GET', '/', function () {
            $teste = new \App\Controllers\NoticeController();
            $file = 'index.tpl.html';
            $this->twig->render($file);
        });

        $this->respond('GET', '/teste/[a:name]', function ($request) {
            $controller = new \App\Controllers\NoticeController();
            $file = 'index2.tpl.html';
            $response = $controller->teste($request->name);
            $this->twig->render($file, $response);
        });
    }

    /**
     * Routes problem, is fails
     */
    public function fails()
    {
        $this->onHttpError(function ($code, $router) {
            switch ($code) {
                case 404:
                    $router->response()->body(
                        $this->twig->render('error404.tpl.html')
                    );
                    break;
                case 405:
                    $router->response()->body(
                        'You can\'t do that!'
                    );
                    break;
                default:
                    $router->response()->body(
                        'Oh no, a bad error happened that caused a '. $code
                    );
            }
        });
    }
}