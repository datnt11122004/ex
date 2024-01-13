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
        $config = $this -> config();

        $config['seo'] = config('apps.user');

        $template = 'BE.user.index';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
            'user'
        ));

    }
    public function create()
    {
        $config['seo'] = config('apps.user');
        $template = 'BE.user.create';
        return view(
            'BE.dashboard.layout',compact(
                'template','config'
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
