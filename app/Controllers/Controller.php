<?php

namespace App\Controllers;

use App\Libs\Input;

abstract class Controller
{
    private $input;
    private $response;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->input = new Input();
        $this->response = "";
    }

    /**
     * Method to access the class Input
     * @return input
     */
    public function input() : Input
    {
        return $this->input;
    }

    /**
     * Method to give a response to the user
     * @return string|array
     */
    public function getResponse() : array
    {
        return $this->response;
    }

    /**
     * Set response to the user
     * @param array $response
     */
    public function setResponse(array $response)
    {
        $this->response = $response;
    }
}