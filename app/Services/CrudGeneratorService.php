<?php

namespace App\Services;

use App\Helpers\ServiceHelper;
use App\Repositories\CrudGeneratorRepository;
class CrudGeneratorService extends BaseService
{
    use ServiceHelper;
    public function __construct(CrudGeneratorRepository $repository)
    {
        $this->repository = $repository;
    }
}
