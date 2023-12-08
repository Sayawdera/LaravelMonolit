<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Throwable;
use App\Models\CrudGenerator;
use App\Services\CrudGeneratorService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequests\StoreCrudGeneratorRequest;
use App\Http\Requests\UpdateRequests\UpdateCrudGeneratorRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class CrudGeneratorControllerController
 * @package  App\Http\Controllers
 */
class CrudGeneratorController extends Controller
{
    /**
     * @var CrudGeneratorService
     */
    private CrudGeneratorService $service;

    /**
     * @param CrudGeneratorService $service
     */
    public function __construct(CrudGeneratorService $service)
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
     * @param StoreCrudGeneratorRequest $request
     * @return array|Builder|Collection|CrudGenerator
     * @throws Throwable
     */
    public function store(StoreCrudGeneratorRequest $request): array |Builder|Collection|CrudGenerator
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @param $crudgeneratorId
     * @return array|Builder|Collection|CrudGenerator
     * @throws Throwable
     */
    public function show($crudgeneratorId): array |Builder|Collection|CrudGenerator
    {
        return $this->service->getModelById($crudgeneratorId);
    }

    /**
     * @param UpdateCrudGeneratorRequest $request
     * @param int $crudgeneratorId
     * @return array|CrudGenerator|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateCrudGeneratorRequest $request, int $crudgeneratorId): array |CrudGenerator|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'), $crudgeneratorId);

    }

    /**
     * @param int $crudgeneratorId
     * @return array|Builder|Collection|CrudGenerator
     * @throws Throwable
     */
    public function destroy(int $crudgeneratorId): array |Builder|Collection|CrudGenerator
    {
        return $this->service->deleteModel($crudgeneratorId);
    }
}
