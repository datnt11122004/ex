<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
/**
 * Interface UserServiceInterface
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterface
{

    public function getALlpaginate(){
        $users = User::paginate(20);
        return $users;
    }
}
