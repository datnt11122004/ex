<?php

namespace App\Repositories;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;
/**
 * Interface BaseServiceInterface
 * @package App\Services
 */
class BaseRepository implements  BaseRepositoryInterface
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(
        Model $model
    ){
        $this->model = $model;
    }


    public function all()
    {
        return $this->model->all();
    }
}
