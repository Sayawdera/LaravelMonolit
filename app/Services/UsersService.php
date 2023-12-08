<?php

namespace App\Services;

use App\Helpers\ServiceHelper;
use App\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\{Model, Collection, Builder};
use Throwable;

class UsersService extends BaseService
{
    use ServiceHelper;

    public function __construct(UsersRepository $repository)
    {
        $this->baseRepository = $repository;
    }

    /**
     * @param array $data
     * @return Model|array|Collection|Builder|null
     * @throws Throwable
     */
    public function createModel($data): Model|array|Collection|Builder|null
    {
        $data['password'] = bcrypt($data['password']);
        return parent::createModel($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model|array|Collection|Builder[]|Builder[]|null
     * @throws Throwable
     */
    public function updateModel($data, $id): Model|array|Collection|Builder|null
    {
        $data['password'] = bcrypt($data['password']);
        return parent::updateModel($data, $id);
    }

}
