<?php

namespace Melbourne\Http\Controllers\Admin;

use Melbourne\Comment;
use Illuminate\Http\Request;

use Melbourne\Http\Requests;
use Melbourne\Http\Controllers\Controller;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
