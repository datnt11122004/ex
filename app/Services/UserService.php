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

    public function paginate(){
        $users = $this -> userRespository->pagination(['id','fullname','email','phone','address','publish']);
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
            $user = $this->userRespository->Delete($id);
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            echo $e -> getMessage();
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
