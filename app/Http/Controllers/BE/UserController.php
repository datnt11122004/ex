<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRespsitory;
    public function __construct(
        UserService $userService,
        ProvinceService $provinceRespsitory
    ){
        $this -> userService = $userService;
        $this -> provinceRespsitory = $provinceRespsitory;
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
        $provinces = $this -> provinceRespsitory -> all();
//        dd($provinces);
        $config = [
            'js' => [
                'library/location.js'
            ]
        ];
        $config['seo'] = config('apps.user');
        $template = 'BE.user.create';
        return view(
            'BE.dashboard.layout',compact(
                'template','config','provinces'
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
