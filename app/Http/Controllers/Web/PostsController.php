<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Post::class);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:64',
            'content' => 'required|min:10|max:1024'
        ]);
        $post = Post::make($validated);
        $post->user_id = auth()->id();
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
