<?php

namespace Melbourne\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	public function __construct()
	{
		$this->middleware('auth');
	}
}
