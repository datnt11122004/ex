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
        array $extend = [],
        int $perpage = 1,
    ){
        $query = $this->model->select($colum)
                        ->where(function ($query) use ($condition){
                            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                                $query->where('name','LIKE','%'.$condition['keyword'].'%');
                            }
                            if(isset($condition['user_catalogue_id']) && !empty($condition['user_catalogue_id'])){
                                $query->where('user_catalogue_id','=',$condition['user_catalogue_id']);
                            }
                        });
        if(isset($join) && !empty($join)){
            $query->join(...$join);

        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
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

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []){
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
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
