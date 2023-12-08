<?php

namespace App\DTos;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class ApiResponse
{
    public static function Success($data): JsonResponse
    {
        return Response::json([
            "data" => $data,
            "Success" => true,
        ], Status::HTTP_OK);
    }

    /**
     * @param $message
     * @param int $status
     * @param bool $isArray
     * @return JsonResponse
     */
    public static function Error($message, int $status = Status::HTTP_OK, bool $isArray = false): JsonResponse
    {
        if ($isArray)
        {
            $message = reset($message[0]);
        }

        return Response::json([
            "Message" => $message,
            "Success" => false,
        ], $status);
    }
}
