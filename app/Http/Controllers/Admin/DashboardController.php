<?php

namespace Melbourne\Http\Controllers\Admin;
use Melbourne\Event;

use Carbon\Carbon;

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
		$resolved = $this->events->where('status', '=', 'Resolved')->count();
		$active = $this->events->where('status', '!=', 'Resolved')->where('scheduled_for', '<', Carbon::now())->count();
		$scheduled = $this->events->where('status', '!=', 'Resolved')->where('scheduled_for', '>', Carbon::now())->count();
		return view('admin.dashboard', compact('resolved', 'active', 'scheduled'));
	}
}