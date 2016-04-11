<?php

namespace Melbourne\Http\Controllers;

use Melbourne\Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

use Melbourne\Http\Requests;

class FrontendController extends Controller
{
	protected $events;

	public function __construct(Event $events)
	{
		$this->events = $events;
	}

    public function index()
	{
		$events = $this->events->orderBy('scheduled_for', 'desc')->get();
		return view('pages.index', compact('events'));
	}

	public function ShowResolved()
	{
		$events = $this->events->where('status', '=', 'Resolved')->orderBy('updated_at', 'desc')->paginate(10);
		return view('pages.resolved', compact('events'));
	}

	public function ShowScheduled()
	{
		$events = $this->events->where('scheduled_for','>', Carbon::now())->where('status', '!=', 'Resolved')->orderBy('scheduled_for', 'desc')->paginate(10);
		return view('pages.scheduled', compact('events'));
	}

	public function ShowEvent($id)
	{
		$event = $this->events->findOrFail($id);

        return view('pages.event', compact('event'));
	}

	public function rss()
	  {
	    //
	  }
}
