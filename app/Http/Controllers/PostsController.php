<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Post;
use App\Services\TagsSynchronizer;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,post')->except(['create', 'store', 'show', 'index', 'destroy']);
    }

    public function index()
    {
        $posts = Post::with('tags')->where('status', '=', true)->latest()->get();
        return view('welcome', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(
        PostRequest $request,
        TagsSynchronizer $synchronizer,
        TagsRequest $tagsRequest
    )
    {
        $validate = $request->validated();
        $validate['status'] = $request->has('status');
        $validate['owner_id'] = auth()->id();

        $post = Post::create($validate);
        $tags = $tagsRequest->tagsCollect($request->tags);

        $synchronizer->sync($tags, $post);

        session()->flash('success', 'Статья успешно добавленна');

        return redirect(route('user_posts.index'));

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(
        Post $post,
        PostRequest $request,
        TagsSynchronizer $synchronizer,
        TagsRequest $tagsRequest
    )
    {
        $validate = $request->validated();
        $validate['status'] = $request->has('status');

        $post->update($validate);
        $tags = $tagsRequest->tagsCollect($request->tags);

        $synchronizer->sync($tags, $post);

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
