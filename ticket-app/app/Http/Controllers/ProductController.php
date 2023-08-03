<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function get(int $id)
    {

    }

    public function getAll(): JsonResponse
    {
        try {

        } catch (\Throwable $exception) {
            return Response::json([
                'errors' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
