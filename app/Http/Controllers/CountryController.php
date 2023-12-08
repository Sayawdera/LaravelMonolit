<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Throwable;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequests\StoreCountryRequest;
use App\Http\Requests\UpdateRequests\UpdateCountryRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CountryController extends Controller
{
    /**
     * @var CountryService
     */
    private CountryService $service;

    /**
     * @param CountryService $service
     */
    public function __construct(CountryService $service)
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
     * @param StoreCountryRequest $request
     * @return array|Builder|Collection|Country
     * @throws Throwable
     */
    public function store(StoreCountryRequest $request): array |Builder|Collection|Country
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @param $crudgeneratorId
     * @return array|Builder|Collection|Country
     * @throws Throwable
     */
    public function show($crudgeneratorId): array |Builder|Collection|Country
    {
        return $this->service->getModelById($crudgeneratorId);
    }

    /**
     * @param UpdateCountryRequest $request
     * @param int $crudgeneratorId
     * @return array|Country|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateCountryRequest $request, int $crudgeneratorId): array |Country|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'), $crudgeneratorId);

    }

    /**
     * @param int $crudgeneratorId
     * @return array|Builder|Collection|Country
     * @throws Throwable
     */
    public function destroy(int $crudgeneratorId): array |Builder|Collection|Country
    {
        return $this->service->deleteModel($crudgeneratorId);
    }
}
