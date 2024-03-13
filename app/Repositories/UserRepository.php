<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface UserServiceInterface
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

   public function __construct(
       User $model
   ){
       $this->model = $model;
   }

   // pagination methods and search methods for user repositories
    public function pagination(
        array $colum = ['*'],
        array $condition = [],
        array $join = [],
        array $extend = [],
        int $perpage = 20,

    ){
        $query = $this->model->select($colum)
            ->where(function ($query) use ($condition){
                if(isset($condition['keyword']) && !empty($condition['keyword'])){
                    $query->where('name','LIKE','%'.$condition['keyword'].'%')
                        ->orWhere('email','LIKE','%'.$condition['keyword'].'%')
                        ->orWhere('address','LIKE','%'.$condition['keyword'].'%')
                        ->orWhere('phone','LIKE','%'.$condition['keyword'].'%');
                }
                if(isset($condition['publish']) && !empty($condition['publish']) && $condition['publish'] !== -1) {
                    $query->where('publish','=',$condition['publish']);
                }
                if(isset($condition['user_catalogue_id']) && !empty($condition['user_catalogue_id']) && $condition['user_catalogue_id'] !== 0){
                    $query->where('user_catalogue_id','=',$condition['user_catalogue_id']);
                }
                return $query;
            });
        // join table
        if(isset($join) && !empty($join)){
            $query->join(...$join);
        }
        // return sql query
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
}
