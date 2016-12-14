<?php

namespace App;

use \App\Libs\Twig as Twig;
use \Klein\Klein as Klein;

class Route
{
    private $twig;
    private $route;
    private $language;

    /**
     * Instance class twig, create routes && verify if fails and dispatch
     */
    public function ready()
    {
        $this->twig = new Twig();
        $this->route = new Klein();
        $this->language = new Libs\Language();
        $this->routing();
        $this->fails();
        $this->route->dispatch();
    }

    /**
     * Creating routes
     */
    public function routing()
    {
        $this->route->respond('GET', '/', function($request) {
            $this->twig->render('index.tpl.html', [
                'lang' => $this->language->getLang()
            ]);
        });
    }

    /**
     * Routes problem, is fails
     */
    public function fails()
    {
        $this->route->onHttpError(function($code, $router) {
            $data = [
                'lang' => $this->language->getLang()
            ];
            switch($code) {
                case 404:
                    $router->response()->body(
                        $this->twig->render('/errors/error404.tpl.html', $data)
                    );
                    break;
                case 405:
                    $router->response()->body(
                        $this->twig->render('/errors/error405.tpl.html', $data)
                    );
                    break;
                default:
                    $router->response()->body(
                        $this->twig->render('/errors/default.tpl.html', $data)
                    );
            }
        });
    }
}