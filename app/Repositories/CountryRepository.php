<?php

namespace App\Repositories;

use App\Helpers\RepositoryHelper;
use App\Models\Country;

class CountryRepository extends BaseRepository
{
    use RepositoryHelper;
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
