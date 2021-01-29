<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validate = (object) $this->validate(request(), [
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'text' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug',
        ]);
        $post = new Post();
        $post->title = $validate->title;
        $post->description = $validate->description;
        $post->text = $validate->text;
        $post->slug = $validate->slug;
        if (!isset($request->status)) $post->status = false;

        $post->save();

        return redirect('/');
        //dd(request()->all());

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
