<?php
namespace application\Controllers;

class LocationController extends Controller {

    public function LocationList() {
        $param = [];

        if(isset($_GET["sub_nm"])) {
            $sub_nm = intval($_GET["sub_nm"]);
            if($sub_nm > 0) {
                $param["sub_nm"] = $sub_nm;
            }
        } else {
            if(isset($_GET["region_nm"])) {
                $param["region_nm"] = $_GET["region_nm"];
            }
        }
        return $this->model->LocationList($param);
    }

    public function optionList1() {
        return $this->model->optionList1();
    }

    public function optionList2() {
        $json = getUrlPaths();
        $param = [
            'root_code' => end($json)
        ];
        return $this->model->optionList2($param);
    }

    // 현재 위치 주소값 
    public function recentLocation() {
        $json = getUrlPaths();
        $param = [
            'my_addr' => end($json)
        ];
    }

}