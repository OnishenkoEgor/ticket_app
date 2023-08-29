<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): JsonResponse
    {
        try {
            if (Auth::attempt($request->getDto()->toArray())) {
                $request->session()->regenerate();
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
}
