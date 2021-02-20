<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only']);
    }

    public function index()
    {
        $posts = auth()->user()->posts()->latest()->get();
        return view('welcome', compact('posts'));
    }
}
