<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel Monolith Architecture API",
 *     description="Laravel Monolith Architecture Documentation for API",
 *     @OA\Contact(
 *          email="sayavdera@protonmail.com"
 * )
 * )
 */



abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
