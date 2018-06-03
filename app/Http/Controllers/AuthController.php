<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Services\UserService;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /** @var UserService $userService */
    private $userService;

    /**
     * AuthController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Register a user.
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function register(CreateUserRequest $request): JsonResponse
    {
        /* create a new user */
        $user = $this->userService->create(
            $request->name,
            $request->email,
            $request->password
        );

        /* response */
        return UserResource::make($user)->additional([
            'api_token' => $user->api_token
        ])->response();
    }
}
