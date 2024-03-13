<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;


class DashboardController extends Controller
{

    protected $serviceInstance;

    public function __construct(){

    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $post = $request->input();
        $serviceInterfaceNamespace = 'App\Services\\' . ucfirst($post['model']) . 'Service';

        if (class_exists($serviceInterfaceNamespace)) {
            $this->serviceInstance = app($serviceInterfaceNamespace);
        }
        $flag = $this->serviceInstance->updateStatus($post);

        return response()->json(['flag' => $flag]);
    }

    public function changeStatusAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $post = $request->input();
        $serviceInterfaceNamespace = '\App\Services\\' . ucfirst($post['model']) . 'Service';
        if (class_exists($serviceInterfaceNamespace)) {
            $serviceInstance = app($serviceInterfaceNamespace);
        }
        $flag = $serviceInstance->updateStatusAll($post);
        return response()->json(['flag' => $flag]);

    }


}
