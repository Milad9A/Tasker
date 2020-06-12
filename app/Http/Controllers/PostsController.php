<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }
}
