<?php

namespace App\Http\Controllers;

use App\Dao\UserDao;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private readonly UserDao $userDao)
    {
    }

    public function getAll(): JsonResponse
    {
        try {
            $users = $this->userDao->getAll();
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
            'data' => UserResource::collection($users)
        ]);
    }
}
