<?php

namespace App\Models;

class Notice extends Model
{
    /**
     * Notice constructor.
     */
    public function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
        return 1;
	}
}