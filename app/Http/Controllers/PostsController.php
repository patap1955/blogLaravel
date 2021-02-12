<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', true)->latest()->get();
        return view('welcome', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validate = $this->validate(request(), [
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug',
        ]);
        if (!isset($request->status)) $status = false;
        else $status = true;

        Post::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'text' => $validate['text'],
            'slug' => $validate['slug'],
            'status' => $status
        ]);

        return redirect(route('index'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
