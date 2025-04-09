<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    return Post::where('user_id', auth()->id())->get();
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = auth()->user()->posts()->create($data);

    return response()->json($post, 201);
}

public function show(Post $post)
{
    $this->authorize('view', $post);
    return response()->json($post);
}

public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);

    $data = $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post->update($data);
    return response()->json($post);
}

public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    $post->delete();
    return response()->json(['message' => 'Post deleted']);
}

}