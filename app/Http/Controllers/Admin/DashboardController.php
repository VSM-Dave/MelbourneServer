<?php

namespace Melbourne\Http\Controllers\Admin;

class DashboardController extends Controller
{
	
	public function index()
	{
		return view('admin.dashboard');
	}
}