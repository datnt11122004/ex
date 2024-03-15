<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

use App\Services\Interfaces\UserCatalogueServiceInterface  as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface  as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface  as PermissionRepository;
use App\Http\Requests\StoreUserCatalogueRequest;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;
    protected $permissionRepository;

    public function __construct(
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository,
        PermissionRepository $permissionRepository
    ){
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @throws AuthorizationException
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        $this->authorize('modules', 'user.catalogue.index');
        $userCatalogues = $this->userCatalogueService->paginate($request);
        $config = [
            'js' => [
                'js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'css/plugins/switchery/switchery.css',
            ],
            'model' => 'UserCatalogue',
        ];
        $config['seo'] = config('apps.usercatalogue');
        $template = 'BE.user.catalogue.index';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
            'userCatalogues'
        ));
    }

    public function create(){
//        $this->authorize('modules', 'user.catalogue.create');
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'create';
        $template = 'BE.user.catalogue.store';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    public function store(StoreUserCatalogueRequest $request){
        if($this->userCatalogueService->create($request)){
            return redirect()->route('auth.user.catalogue')->with('success','Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Thêm mới bản ghi không thành công. Hãy thử lại');
    }

    public function edit($id){
//        $this->authorize('modules', 'user.catalogue.update');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'edit';
        $template = 'BE.user.catalogue.update';
        return view('BE.dashboard.layout', compact(
            'template',
            'config',
            'userCatalogue',
        ));
    }

    public function update($id, StoreUserCatalogueRequest $request){
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.catalogue.index')->with('success','Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id){
//        $this->authorize('modules', 'user.catalogue.destroy');
        $config['seo'] = config('apps.usercatalogue');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'BE.user.catalogue.delete';
        return view('BE.dashboard.layout', compact(
            'template',
            'userCatalogue',
            'config',
        ));
    }

    public function destroy($id){
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('auth.user.catalogue')->with('success','Xóa bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Xóa bản ghi không thành công. Hãy thử lại');
    }

    public function permission(){
        $this->authorize('modules', 'user.catalogue.permission');
        $userCatalogues = $this->userCatalogueRepository->all(['permissions']);

        $permissions = $this->permissionRepository->all();
        $config['seo'] = __('messages.userCatalogue');
        $template = 'BE.user.catalogue.permission';
        return view('BE.dashboard.layout', compact(
            'template',
            'userCatalogues',
            'permissions',
            'config',
        ));
    }

    public function updatePermission(Request $request){
        if($this->userCatalogueService->setPermission($request)){
            return redirect()->route('user.catalogue.index')->with('success','Cập nhật quyền thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Có vấn đề xảy ra, Hãy thử lại');
    }

}
