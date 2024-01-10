<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
class UserController extends Controller
{
    protected $userService;
    public function __construct(
        UserService $userService
    ){
        $this -> userService = $userService;
    }

    public function index(){

        $user = $this -> userService->paginate();
//        $user = User::paginate(20);


        $config = $this -> config();
        $template = 'BE.user.index';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
            'user'
        ));

    }
    private function config(){
        $config = [
            'js' => [
                'js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'css/plugins/switchery/switchery.css'
            ]
        ];
        return $config;
    }
}
