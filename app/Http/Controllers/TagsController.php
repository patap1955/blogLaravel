<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag) {
        $posts = $tag->posts()->with('tags')->get();

        return view('welcome', compact('posts'));
    }
}
