<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;

class LocationController extends Controller{

    protected $districtRepository;
    protected $provinceRepository;

    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository
    ){
        $this -> districtRepository = $districtRepository;
        $this -> provinceRepository = $provinceRepository;
    }

    public function getLocation(
        Request $request
    )
    {
        $get = $request -> input();

        $html = '';
        if($get['target'] == 'districts'){
            $provinces = $this->provinceRepository->findByID($get['data']['location_id'],['code','name'],['districts']);
            $html = $this->renderHTML($provinces->districts);
        }else if($get['target'] == 'wards'){
            $district = $this->districtRepository->findByID($get['data']['location_id'],['code','name'],['wards']);
            $html = $this->renderHTML($district->wards,'Chọn phường/xã');
        }

        $response = [
            'html'=>$html
        ];
        return response() -> json($response);
    }

    public function renderHTML($dataLocation, $root = 'Chọn Quận/Huyện')
    {
        $html = '<option value="0">'.$root.'</option>';
        foreach ($dataLocation as $value){
            $html .= "<option value='$value->code'>$value->full_name</option>";
        }
        return $html;
    }

}
?>
