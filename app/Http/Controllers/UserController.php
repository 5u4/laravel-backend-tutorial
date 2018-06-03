<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
