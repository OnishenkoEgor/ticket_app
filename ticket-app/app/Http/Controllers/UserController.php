<?php

namespace App\Http\Controllers;

use App\Dao\UserDao;
use App\Events\User\UserCreatedEvent;
use App\Events\User\UserDeletedEvent;
use App\Events\User\UserUpdatedEvent;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
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

    public function get(int $id): JsonResponse
    {
        try {
            $user = $this->userDao->get($id);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
            'data' => new UserResource($user)
        ]);
    }

    public function create(CreateUserRequest $request): JsonResponse
    {
        try {
            dump($request->getDto());
            $user = $this->userDao->create($request->getDto()->toArray());

            UserCreatedEvent::dispatch($user);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
        ]);
    }

    public function update(int $userId, UpdateUserRequest $request): JsonResponse
    {
        try {
            $this->userDao->update($userId, $request->getDto()->toArray());
            $user = $this->userDao->get($userId);
            UserUpdatedEvent::dispatch($user);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
        ]);
    }

    public function delete(int $userId): JsonResponse
    {
        try {
            $user = $this->userDao->get($userId);
            $this->userDao->delete($userId);
            UserDeletedEvent::dispatch($user);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'errors' => false,
        ]);
    }
}
