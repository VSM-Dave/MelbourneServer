<?php

namespace Melbourne\Http\Controllers\Admin;

use Melbourne\Comment;
use Melbourne\Event;
use Illuminate\Http\Request;

use Melbourne\Http\Requests;
use Melbourne\Http\Controllers\Controller;

class CommentsController extends Controller
{
    protected $comments;
    protected $events;

    public function __construct(Comment $comments, Event $events)
    {
        $this->comments = $comments;
        $this->events = $events;

        // parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comments = $this->comments->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $comment)
    {

        $events = Event::all(['id', 'title', 'status']);
        $event_id = null;


        return view('admin.comments.form', compact('comment', 'events', 'event_id'));
    }

    public function createFromEvent(Comment $comment, $event_id)
    {
        $events = $this->events->findOrFail($event_id)->get();

        return view('admin.comments.form', compact('comment', 'events', 'event_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = $this->comments->create($request->only('content', 'post_id', 'user_id'));
        $comment->event->fill($request->only('status'))->save();

        return redirect(route('admin.comments.index'))->with('status','Comment has been created.')->with('status', 'Event has been updated.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = $this->comments->findOrFail($id);

        return view('admin.comments.form', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = $this->comments->findOrFail($id);

        $comment->fill($request->only('content', 'post_id'))->save();

        $comment->event->fill($request->only('status'))->save();

        return redirect(route('admin.comments.edit', $comment->id))->with('status', 'Event has been updated.');
    }

    public function confirm(Request $request, $id)
    {
        $comment = $this->comments->findOrFail($id);

        return view('admin.comments.confirm', compact('comment'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->comments->findOrFail($id);

        $comment->delete();

        return redirect(route('admin.comments.index'))->with('status', 'Comment has been deleted.');
    }
}
