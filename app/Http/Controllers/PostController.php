<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    
    public function index()
    {
        return response()->json(['status' => 200, 'data' => Post::all()]);
    }
    
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        return response()->json(['status' => 201, 'data' => $post]);
    }
    
    public function show(Post $post)
    {
        return response()->json(['status' => 200, 'data' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json(['status' => 200, 'data' => $post]);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['status' => 200, 'message' => 'Post deleted']);
    }
}