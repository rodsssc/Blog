<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; // Required for auth()->id()

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        // $comments = Comment::all();
        // return view('comment',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);
    
        Comment::create([
            'user_id' => auth()->id(), // Ensure user is authenticated
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);
        
        return view('comment');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the post with its comments and user data
        $post = Post::with('comments.user')->findOrFail($id);
    
        return view('comment', compact('post'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
