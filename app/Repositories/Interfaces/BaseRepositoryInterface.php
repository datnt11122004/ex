<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();

    public function findById(int $modelId, array $colum, array $relation);

    public function update(int $id=0,array $payload=[]);

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []);

    public function delete(int $id = 0);

    public function forceDelete(int $id = 0);

    public function pagination(array $colum = ['*'], array $condition = [], array $join = [],array $extend  = [], int $perpage = 20);

}
