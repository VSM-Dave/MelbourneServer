<?php

namespace Melbourne\Http\Controllers\Admin;

use Melbourne\Event;
use Illuminate\Http\Request;

use Melbourne\Http\Requests;

class EventsController extends Controller
{
    protected $events;

    public function __construct(Event $events)
    {
    	$this->events = $events;

    	parent::__construct();
    }

    public function index()
    {

        $events = $this->events->orderBy('scheduled_for', 'desc')->orderBy('updated_at', 'desc')->paginate(10);


        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreEventRequest $request)
    {
        $this->events->create($request->only('title', 'description', 'status', 'scheduled_for'));

        return redirect(route('admin.events.index'))->with('status','Event has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->events->findOrFail($id);

        return view('admin.events.form', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreEventRequest $request, $id)
    {
        $event = $this->events->findOrFail($id);

        $event->fill($request->only('title', 'description', 'status'))->save();

        return redirect(route('admin.events.edit', $event->id))->with('status', 'Event has been updated.');
    }

    public function confirm(Request $request, $id)
    {
        $event = $this->events->findOrFail($id);

        return view('admin.events.confirm', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $event = $this->events->findOrFail($id);

        $event->delete();

        return redirect(route('admin.events.index'))->with('status', 'Event has been deleted.');

    }
}
