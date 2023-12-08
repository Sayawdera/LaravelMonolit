<?php

namespace App\Services;

use App\Helpers\ServiceHelper;
use App\Interfaces\IBaseService;
use App\Models\BaseModel;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;


abstract class BaseService implements IBaseService
{
    use ServiceHelper;
    protected ?BaseRepository $baseRepository = null;

    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList(array $data): LengthAwarePaginator
    {
        return $this->getRepository()->paginatedList($data);
    }

    /**
     * @param $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function createModel(array $data): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function UpdateModel(array $data, int $id): Model|array|Collection|Builder|BaseModel|null
    {
        return $model = $this->getRepository()->update($data, $id);
    }

    /**
     * @param $id
     * @return array|Builder|Builder[]|Collection|Model|Model[]
     * @throws Throwable
     */
    public function deleteModel(int $id): array|Builder|Collection|Model
    {
        return $this->getRepository()->delete($id);
    }

    /**
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function getModelByID(int $id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->findByID($id);
    }
}
