<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

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
    $this->authorize('create', [Comment::class, $post]);
    
    $this->validate($request, [
        'content' => 'required|max:255',
        'post_id' => 'exists:posts,id',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'post_id' => $request->post_id,
        'content' => $request->content,
    ]);

    // Rediriger l'utilisateur vers la page du post ou une autre page de votre choix
    return redirect()->route('posts.show', $request->post_id);
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
