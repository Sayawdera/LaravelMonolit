<?php

namespace App\Repositories;

use App\Helpers\RepositoryHelper;
use App\Models\CrudGenerator;
class CrudGeneratorRepository extends BaseRepository
{
    use RepositoryHelper;
    public function __construct(CrudGenerator $model)
    {
        parent::__construct($model);
    }
}
