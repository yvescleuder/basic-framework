<?php

namespace App;

use \App\Libs\Twig as Twig;
use \Klein\Klein as Klein;

class Route
{
    private $twig;
    private $route;

    /**
     * Instance class twig, create routes && verify if fails and dispatch
     */
    public function ready()
    {
        $this->twig = new Twig();
        $this->route = new Klein();
        $this->routing();
        $this->fails();
        $this->route->dispatch();
    }

    /**
     * Creating routes
     */
    public function routing()
    {
        $this->route->respond('GET', '/', function() {
            $this->twig->render('index.tpl.html');
        });
    }

    /**
     * Routes problem, is fails
     */
    public function fails()
    {
        $this->route->onHttpError(function($code, $router) {
            switch($code) {
                case 404:
                    $router->response()->body(
                        $this->twig->render('/errors/error404.tpl.html')
                    );
                    break;
                case 405:
                    $router->response()->body(
                        $this->twig->render('/errors/error405.tpl.html')
                    );
                    break;
                default:
                    $router->response()->body(
                        $this->twig->render('/errors/default.tpl.html', '["code" => $code]')
                    );
            }
        });
    }
}