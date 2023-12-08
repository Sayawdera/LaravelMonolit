<?php

namespace App\Helpers;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\{Model, Builder};
use Throwable;
trait RepositoryHelper
{
    /**
     * @return Model
     * @throws Throwable
     */
    protected function getModel(): Model
    {
        return $this->modelClass;
    }

    /**
     * @return Builder|BaseModel
     * @throws Throwable
     */
    protected function query(): Builder|BaseModel
    {
        /** @var Model $class */
        $query = $this->getModel()->query();
        return $query->orderByDesc('id');
    }
}
