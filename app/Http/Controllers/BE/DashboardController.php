<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller{
    public function __construct()
    {

    }

    public function index(){
        $config = $this->config();
//        dd(Auth::user());
        $template = 'BE.dashboard.home.index';
        return view('BE.dashboard.layout', compact('template','config'));
    }

    private function config(){
        return [
            'js' =>  [
                'js/plugins/flot/jquery.flot.js',
                'js/plugins/flot/jquery.flot.tooltip.min.js',
                'js/plugins/flot/jquery.flot.spline.js',
                'js/plugins/flot/jquery.flot.resize.js',
                'js/plugins/flot/jquery.flot.pie.js',
                'js/plugins/flot/jquery.flot.symbol.js',
                'js/plugins/flot/jquery.flot.time.js',
                'js/plugins/peity/jquery.peity.min.js',
                'js/demo/peity-demo.js',
                'js/inspinia.js',
                'js/plugins/pace/pace.min.js',
                'js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'js/plugins/easypiechart/jquery.easypiechart.js',
                'js/plugins/sparkline/jquery.sparkline.min.js',
                'js/demo/sparkline-demo.js',
            ]
        ];
    }
}

