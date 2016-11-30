<?php

namespace App\Controllers;

use App\Models\Notice;

class NoticeController extends Controller
{
	private $notice;

    /**
     * NoticeController constructor.
     */
    public function __construct()
	{
		parent::__construct();
		$this->notice = new Notice();
	}

	public function getAll()
	{
		return $this->notice->getAll();
	}

    public function teste($name)
    {
        return [
            "nome_usuario" => $name,
        ];
    }

    public function teste2()
    {
        echo 'asasasa';
    }
}