<?php

namespace App\Services;

use App\Interfaces\IBaseServices;
use App\Models\BaseModel;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;


abstract class BaseService implements IBaseServices
{
    protected ?BaseRepository $repository = null;

    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList($data = []): LengthAwarePaginator
    {
        return $this->repository->paginatedList($data);
    }

    /**
     * @param $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function createModel($data): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->create($data);
    }

    /**
     * @return BaseRepository
     * @throws Throwable
     */
    protected function getRepository(): BaseRepository
    {
        throw_if(! $this->repository, get_class($this) . ' repository property not implemented');
        return $this->repository;
    }

    /**
     * @param $data
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function updateModel($data, $id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->update($data, $id);
    }

    /**
     * @param $id
     * @return array|Builder|Builder[]|Collection|Model|Model[]
     * @throws Throwable
     */
    public function deleteModel($id): array |Builder|Collection|Model
    {
        return $this->getRepository()->delete($id);
    }

    /**
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function getModelById($id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->findById($id);
    }
}
