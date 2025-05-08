<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestController
{
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'message' => 'Успешный GET-запрос',
                'data'    => ['item1', 'item2', 'item3'],
            ],
        );
    }
}
