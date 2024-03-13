<?php

namespace App\Services;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRespository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
/**
 * Interface UserServiceInterface
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRespository;

    public function __construct(
        UserRespository $userRepository
    )
    {
        $this -> userRespository = $userRepository;
    }

    public function paginateSelect()
    {
        return ['id','name','email','phone','address','publish'];
    }
    public function paginate($request = []){
        $condition['keyword'] = $request->input('keyword');
        $perpage = $request->integer('perpage');
        $condition['user_catalogue_id'] = $request->input('user_catalogue_id');
        $condition['publish'] = $request->integer('publish');


        $users = $this -> userRespository->pagination(
            $this->paginateSelect(),
            $condition,
            [],
            ['path' => 'user/index'],
            $perpage
        );
//        dd($users);
        return $users;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request ->except(['_token','send','re_password']);
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);
            $user = $this->userRespository->create($payload);
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            echo $e -> getMessage();
//            die();
            return false;
        }
    }

    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            $payload = $request ->except(['_token','send']);
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
//            dd($payload);
            $user = $this->userRespository->update($id,$payload);
//            dd($user);
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            echo $e -> getMessage();
//            die();
            return false;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRespository->forceDelete($id);
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            echo $e -> getMessage();
            return false;
        }
    }

    public function updateStatus($post= []){
        DB::beginTransaction();
        try{
            $payload[$post['field']] = (($post['value'] == 1)?0:1);
            $user = $this->userRespository->update($post['modelId'], $payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function updateStatusAll($post=[])
    {
        DB::beginTransaction();
        try{
            $payload[$post['field']] = $post['value'];
            $flag = $this->userRespository->updateByWhereIn('id', $post['id'], $payload);

            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }
    private function convertBirthdayDate($birthday = '')
    {
        if(!empty($birthday)){
            $birthday = Carbon::createFromFormat('Y-m-d',$birthday)->format('Y-m-d');
        }
        return $birthday;
    }

}
