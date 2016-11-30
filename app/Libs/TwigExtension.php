<?php

namespace App\Libs;

class TwigExtension extends \Twig_Extension
{
    public function getGlobals()
    {
        @session_start();
        $_SESSION["usuario"] = [
            'usuario' => 'yvescleuder',
            'email' => 'aaa'
        ];

        return [
            'session' => $_SESSION["usuario"],
        ];
    }
}