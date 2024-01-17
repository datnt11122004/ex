<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;


class LocationController extends Controller{

    protected $districtRepository;
    public function __construct(
        DistrictRepository $districtRepository
    ){
        $this -> districtRepository = $districtRepository;
    }

    public function getLocation(
        Request $request
    )
    {
        $province_id = $request -> input('province_id');
        $district = $this -> districtRepository->findDistrictByProvinceId($province_id);
        $response = [
            'district'=>$this->renderHTML($district)
        ];
        return response() -> json($response);
    }

    public function renderHTML($district)
    {
        $html = '<option value="0">Chọn Quận/Huyện</option>';
        foreach ($district as $value){
            $html .= "<option value='$value->code'>$value->full_name</option>";
        }
        return $html;
    }

}
?>
