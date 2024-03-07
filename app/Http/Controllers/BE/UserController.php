<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    protected $userService;
    protected $provinceRespsitory;
    protected $userRepository;
    public function __construct(
        UserService $userService,
        ProvinceService $provinceRespsitory,
        UserRepository $userRepository
    ){
        $this -> userService = $userService;
        $this -> provinceRespsitory = $provinceRespsitory;
        $this -> userRepository = $userRepository;
    }

    public function index(Request $request){

        $user = $this -> userService->paginate($request);
        $config = $this -> config();

        $config['seo'] = config('apps.user');

        $template = 'BE.user.index';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
            'user'
        ));

    }
    // render html form add user
    public function create()
    {
        $provinces = $this -> provinceRespsitory -> all();
        $config = [
            'js' => [
                'library/location.js',
            ]
        ];
        $config['method'] = 'create';
        $config['seo'] = config('apps.user');

        $template = 'BE.user.store';
        return view(
            'BE.dashboard.layout',compact(
                'template','config','provinces'
        ));
    }
    // add user to db
    public function store(StoreUserRequest $request)
    {
        if($this->userService->create($request)){
            return redirect() -> route('auth.user') -> with('success', 'Thêm người dùng thành công');
        }
        return redirect() -> route('user.create') -> with('error', 'Thêm người dùng thất bại');
    }

    // render html form update
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
//        dd($user);
        $provinces = $this -> provinceRespsitory -> all();
        $config = [
            'js' => [
                'library/location.js',
            ]
        ];
        $config['method'] = 'edit';
        $config['seo'] = config('apps.user');
        $template = 'BE.user.update';
        return view(
            'BE.dashboard.layout',compact(
            'template','config','provinces','user'
        ));
    }

    // update user by form
    public function update($id, UpdateUserRequest $request)
    {
        if($this->userService->update($id,$request)){
            return redirect()->route('auth.user')->with('success','Cập nhật người dùng thành công');
        }

        return redirect()->route('user.edit',$id)->with('error','Cập nhật người dùng không thành công. Hãy thử lại');
    }
    //delete user
    public function delete($id)
    {
        $config['method'] = 'delete';
        $config['seo'] = config('apps.user');
        $user = $this->userRepository->findById($id);
        $template = 'BE.user.delete';
        return view(
            'BE.dashboard.layout',compact(
            'template','user','config'
        ));
    }

    public function destroy($id)
    {
        if($this->userService->delete($id)){
            return redirect()->route('auth.user')->with('success','Xóa người dùng thành công');
        }

        return redirect()->route('user.delete',$id)->with('error','Xóa người dùng không thành công. Hãy thử lại');
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
