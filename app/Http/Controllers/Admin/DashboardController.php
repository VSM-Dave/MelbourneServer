<?php

namespace Melbourne\Http\Controllers\Admin;
use Melbourne\Event;

class DashboardController extends Controller
{
	protected $events;

    public function __construct(Event $events)
    {
    	$this->events = $events;

    	parent::__construct();
    }
	
	public function index()
	{
		return view('admin.dashboard');
	}
}