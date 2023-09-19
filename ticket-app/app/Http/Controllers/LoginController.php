<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            if (Auth::attempt($request->getDto()->toArray(), true)) {
                $request->session()->regenerate();
            } else {
                return response()->json([
                    'errors' => 'Incorrect login credentials.'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Throwable $exception) {
            Log::error($exception);

            return response()->json([
                'errors' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'errors' => false
        ], Response::HTTP_OK);
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            if ($request->user()) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return response()->json([
                    'errors' => false
                ]);
            }

            return response()->json([
                'errors' => 'User is not logged in'
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage()
            ]);
        }
    }

    public function getUser(Request $request): JsonResponse
    {
        try {
            return response()->json([
                'errors' => false,
                'user' => $request->user() ? new UserResource($request->user()) : null,
            ], Response::HTTP_OK);
        } catch (\Throwable $exception) {
            return response()->json([
                'errors' => $exception->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
