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

    public function pagination(
        array $colum = ['*'],
        array $condition = [],
        array $join = [],
        int $perpage = 20
    ){
        $query = $this->model->select($colum)
                        ->where($condition);
        if(isset($join) && !empty($join)){
            $query->join(...$join);

        }
        return $query->paginate($perpage);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $payload = [])
    {
        $model =$this->model->create($payload);
        return $model -> fresh();
    }

    public function update(int $id = 0, array $payload = [] )
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function findById(
        int $modelId,
        array $colum = ['*'],
        array $relation = []
    ){
        return $this->model->select($colum)->with($relation)->findOrFail($modelId);
    }

    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }

}
