<?php

namespace App\Services;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRespository;
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
        $users = $this -> userRespository->getAllPaginate();
        return $users;
    }
}
