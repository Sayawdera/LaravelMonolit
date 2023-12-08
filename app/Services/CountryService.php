<?php

namespace App\Services;

use App\Helpers\ServiceHelper;
use App\Repositories\CountryRepository;

class CountryService extends BaseService
{
    use ServiceHelper;
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

}
