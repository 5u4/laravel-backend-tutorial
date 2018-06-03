<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    /**
     * Create a post.
     *
     * Note: This API is built for post testing. The actual project uses a post fetcher that fetches posts and store in
     * to database. Since it is only for testing, The request validation is not implemented.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        /* outsource to a post service will make the controller cleaner */
        $post = Post::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'link' => $request->link,
            'images' => $request->images,
            'details' => $request->details
        ]);

        /* response */
        return PostResource::make($post)->response();
    }
}
