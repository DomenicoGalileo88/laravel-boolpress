<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])->orderByDesc('id')->paginate(6);

        return $posts;
    }

    public function show()
    {
        $post = Post::with(['category', 'tags', 'user'])->where('slug')->first();

        return $post;
    }
}
