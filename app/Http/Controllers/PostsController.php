<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Models\Tag;

class PostsController extends Controller
{
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

    public function store(PostRequest $request)
    {
        $validate = $request->validated();
        $validate['status'] = $request->has('status');

        $post = Post::create($validate);

        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', $request->tags))->keyBy(function ($item) {{ return $item; }});
        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $post->tags()->sync($syncIds);

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

//        $postTags = $post->tags->keyBy('name');
//        $tags = collect(explode(',', $request->tags))->keyBy(function ($item) {{ return $item; }});
//        $tagsToAttach = $tags->diffKeys($postTags);
//        $tagsToDetach = $postTags->diffKeys($tags);
//
//        foreach ($tagsToAttach as $tag) {
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $post->tags()->attach($tag);
//        }
//
//        foreach ($tagsToDetach as $tag) {
//            $post->tags()->detach($tag);
//        }

        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', $request->tags))->keyBy(function ($item) {{ return $item; }});
        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $post->tags()->sync($syncIds);

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
