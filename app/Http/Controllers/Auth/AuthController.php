<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\ApiResponse;
use Illuminate\Http\Request;
use Throwable;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\resetPasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

/**
 * Class AuthControllerController
 * @package  App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private AuthService $service;

    /**
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->service->login($request->validated('data'));
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->service->register($request->validated('data'));
    }

    /**
     * @param resetPasswordRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        return $this->service->resetPassword($request->validated('data'));
    }

    /**
     * @return JsonResponse
     * @throws Throwable
     */
    public function logout(): JsonResponse
    {
        return ApiResponse::success($this->service->logout());
    }

    /**
     * @return JsonResponse
     */
    public function checkUserToken(): JsonResponse
    {
        $success = Auth()->user();
        return ApiResponse::success($success);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateYourself(Request $request)
    {
        auth()->user()->update($request->all());
        return ApiResponse::success(auth()->user());
    }
}
