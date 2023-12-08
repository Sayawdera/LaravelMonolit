<?php

namespace App\Http\Controllers;


use App\DTos\ApiResponse;
use App\Models\UserRoles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;
use App\Models\User;
use App\Services\UsersService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequests\StoreUsersRequest;
use App\Http\Requests\UpdateRequests\UpdateUsersRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


/**
 * Class UsersControllerController
 * @package  App\Http\Controllers
 */

class UsersController extends Controller
{
    /**
     * @var UsersService
     */
    private UsersService $service;

    /**
     * @param UsersService $service
     */
    public function __construct(UsersService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator|Collection
     * @throws Throwable
     */
    public function index(Request $request): LengthAwarePaginator|Collection
    {
        return $this->service->paginatedList($request->all());
    }

    /**
     * @param StoreUsersRequest $request
     * @return array|Builder|Collection|User
     * @throws Throwable
     */
    public function store(StoreUsersRequest $request): array |Builder|Collection|User
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @param $crudgeneratorId
     * @return array|Builder|Collection|User
     * @throws Throwable
     */
    public function show($crudgeneratorId): array|Builder|Collection|User
    {
        return $this->service->getModelById($crudgeneratorId);
    }

    /**
     * @param UpdateUsersRequest $request
     * @param int $crudgeneratorId
     * @return array|User|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateUsersRequest $request, int $crudgeneratorId): array |User|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'), $crudgeneratorId);

    }

    /**
     * @param int $crudgeneratorId
     * @return array|Builder|Collection|User|bool
     * @throws Throwable
     */
    public function destroy(int $crudgeneratorId): array |Builder|Collection|User|bool
    {
        return $this->service->deleteModel($crudgeneratorId);
    }

    /**
     * @return JsonResponse
     */
    public function roles(): JsonResponse
    {
        $role = new UserRoles();
        return ApiResponse::success($role->getRoleList());
    }
}
