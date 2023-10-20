<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Event;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Events\CommentCreated; 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, Post $post)
{
    // Check if the user is authenticated
    if (auth()->check()) {
        $this->validate($request, [
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:255',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->input('post_id'),
            'content' => $request->input('content'),
        ]);


        Event::dispatch(new CommentCreated($comment, $post));

        return redirect()->route('posts.show', $request->input('post_id'));
    } else {
        return redirect()->route('login'); // Redirect to the login page or handle as needed
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
