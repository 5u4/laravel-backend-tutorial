<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

class UserController extends Controller
{
    /**
     * Get all user's shortlisted posts
     *
     * @return JsonResponse
     */
    public function shortlistIndex(): JsonResponse
    {
        return PostResource::collection(
            Auth::user()->shortlistPosts()
                ->orderByDesc('shortlists.created_at')
                ->get()
        )->response();
    }

    /**
     * Add a post to user's shortlist.
     *
     * @param int $postId
     * @return JsonResponse
     */
    public function shortlist(int $postId): JsonResponse
    {
        /* add post to user's shortlist */
        Auth::user()->shortlistPosts()->attach($postId);

        /* response */
        return response()->json();
    }

    /**
     * Remove post in user's shortlist.
     *
     * @param int $postId
     * @return JsonResponse
     */
    public function unshortlist(int $postId): JsonResponse
    {
        /* remove post in user's shortlist */
        Auth::user()->shortlistPosts()->detach($postId);

        /* response */
        return response()->json();
    }
}
