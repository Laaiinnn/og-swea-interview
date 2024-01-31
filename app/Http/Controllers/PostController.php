<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('id')->get();
        return response()->json(['user' => auth()->user(), 'posts' => $posts]);
    }
}
