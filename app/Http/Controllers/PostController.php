<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Get all the posts ordered by published date.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        /* get all posts ordered by published date */
        $posts = Post::orderBy('date', 'desc')->get();

        /* wrap posts in a resource */
        return PostResource::collection($posts)->response();
    }
}
