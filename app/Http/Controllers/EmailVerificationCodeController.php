<?php

namespace App\Http\Controllers;


use Throwable;
use App\Models\EmailVerificationCode;
use App\Services\EmailVerificationCodeService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequests\StoreEmailVerificationCodeRequest;
use App\Http\Requests\UpdateRequests\UpdateEmailVerificationCodeRequest;

/**
 * Class EmailVerificationCodeControllerController
 * @package  App\Http\Controllers
 */

class EmailVerificationCodeController extends Controller
{
    /**
     * @var EmailVerificationCodeService
     */
    private EmailVerificationCodeService $service;

    /**
     * @param EmailVerificationCodeService $service
     */
    public function __construct(EmailVerificationCodeService $service)
    {
        $this->service = $service;
    }

    /**
     * @param StoreEmailVerificationCodeRequest $request
     * @return array|Builder|Collection|EmailVerificationCode
     * @throws Throwable
     */
    public function sendEmailVerification(StoreEmailVerificationCodeRequest $request): array |Builder|Collection|EmailVerificationCode
    {
        return $this->service->createModel($request->validated('data'));
    }

    /**
     * @param UpdateEmailVerificationCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmailVerification(UpdateEmailVerificationCodeRequest $request)
    {
        return $this->service->checkVerificationCode($request->validated('data'));
    }
}
