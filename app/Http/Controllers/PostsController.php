<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', true)->latest()->get();
        return view('welcome', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $validate = $request->validated();
        $validate['status'] = $request->has('status');

        Post::create($validate);

        session()->flash('success', 'Статья успешно добавленна');

        return redirect(route('index',));

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $validate = $request->validated();
        $validate['status'] = $request->has('status');

        $post->update($validate);

        session()->flash('success', 'Статья успешно отредактированна');
        return redirect(route('index'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Статья успешно удалена');
        return redirect(route('index'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
}
