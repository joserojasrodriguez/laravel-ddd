<?php
declare(strict_types=1);
namespace Speeden;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    function successResponse($data, $code = 200): JsonResponse
    {
        return response()->json(['data' => $data], $code);
    }

    function errorResponse($message, $code = 400): JsonResponse
    {
        return response()->json(
            [
                'error' =>
                    [
                        'message' => $message,
                        'code' => $code
                    ]
            ], $code
        );
    }
}
