<?php

namespace App\Interfaces;

interface IBaseServices
{
    /**
     * @param $data
     * @return mixed
     */
    public function paginatedList($data = []): mixed;

    /**
     * @param $data
     * @return mixed
     */
    public function createModel($data): mixed;

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateModel($data, $id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function deleteModel($id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getModelById($id): mixed;
}
