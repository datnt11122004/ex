<?php

namespace App\Repositories;
use App\Models\Province;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
/**
 * Interface UserServiceInterface
 * @package App\Services
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(
        Province $model
    )
    {
        $this->model = $model;
    }

    public function all()
    {
        return Province::all();
    }
}
