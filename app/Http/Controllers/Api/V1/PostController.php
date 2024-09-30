<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\PostResource;
use App\Http\Resources\V1\PostCollection;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(12);
        return new PostCollection($posts);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }
}
