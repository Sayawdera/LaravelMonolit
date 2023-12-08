<?php

namespace App\Helpers;

use App\Repositories\BaseRepository;
use Throwable;
trait ServiceHelper
{
    protected ?BaseRepository $baseRepository = NULL;
    /**
     * @return BaseRepository
     * @throws Throwable
     */
    protected function getRepository(): BaseRepository
    {
        throw_if(! $this->baseRepository, get_class($this) . ' Repository Property Not Implemented!');
        return $this->baseRepository;
    }
}
