<?php

namespace App\Repositories;

use App\Helpers\RepositoryHelper;
use App\Interfaces\IBaseRepository;
use App\Constants\PaginatorPerPageEnum;
use Illuminate\Database\Eloquent\{Model, Collection, Builder};
use App\Models\BaseModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Throwable;

abstract class BaseRepository implements IBaseRepository
{
    use RepositoryHelper;

    /**
     * @var Model
     */
    protected Model $modelClass;

    /**
     * @param Model $modelClass
     */
    public function __construct(Model $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @param array $data
     * @param array|string|null $with
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList(array $data, array|string $With = NULL): LengthAwarePaginator
    {
        $query = $this->query();

        if (method_exists($this->getModel(), 'scopeFilter'))
        {
            $query->filter($data);
        }

        if (!is_null($With))
        {
            $query-with($With);
        }
        return $query->paginate(PaginatorPerPageEnum::PER_PAGE);
    }

    /**
     * @param $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function create(array $data): Model|array|Collection|Builder|BaseModel|NULL
    {
        $model = $this->getModel();
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $data
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function update(array $data, int $id): Model|array|Collection|Builder|BaseModel|NULL
    {
        $model = $this->findByID($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $id
     * @return array|Builder|Builder[]|Collection|BaseModel|BaseModel[]
     * @throws Throwable
     */
    public function delete(int $id): array|Builder|Collection|BaseModel
    {
        $model = $this->findByID($id);
        $model->delete();
        return $model;
    }

    /**
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function findByID(int $id): Model|array|Collection|Builder|BaseModel|NULL
    {
        return $this->getModel()::query()->findOrFail($id);
    }
}
