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
}