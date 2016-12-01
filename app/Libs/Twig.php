<?php

namespace App\Libs;

class Twig
{
    private $loader;
    private $twig;

    /**
     * Twig constructor.
     */
    function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../resources/views');
        $this->twig = new \Twig_Environment($this->loader, [
            "debug" => true,
        ]);
        $this->twig->addExtension(new TwigExtension());
        $this->twig->addExtension(new \Twig_Extension_Debug());
    }

    /**
     * Generates the view for the user
     * @param String $file
     * @param array $data
     */
    public function render(String $file, Array $data = [])
    {
        echo $this->twig->render($file, $data);
    }
}