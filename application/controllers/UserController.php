<?php
namespace application\controllers;
use application\libs\Application;

class UserController extends Controller{
    public function sel_user(){
        $url = getUrlPaths();
        $param = [
            'uuid' => $url[2]
        ];
        $result = $this->model->sel_user($param);
        return [_RESULT => $result];
    }

    public function signup(){
        $json = getJson();
        $param = [
            'uuid' => $json[0],
            'nickname'=> $json[1]
        ];
        $result = $this->model->signup($param);
        if($result){
            $this->flash(_LOGINUSER, $result);
            return [_RESULT => $result];
        }
        return [_RESULT => $result];
    }
    //유저 닉네임 변경
    public function upd_nick(){
        $url = getUrlPaths();
        $param = [
            'nickname' => $url[2],
            'uuid' => $url[3]
        ];
        $result = $this->model->upd_nick($param);
        return [_RESULT => $result];
    }
    //유저 favtag 셀렉트
    public function sel_fav(){
        $url = getUrlPaths();
        $param = [
            'uuid' => $url[2]
        ];
        $result = $this->model->sel_fav($param);
        return [_RESULT => $result];
    }

    //유저 favtag 추가 및 업데이트
    public function ins_fav(){
        $url = getUrlPaths();
        $param = [
            'uuid' => $url[2],
            'tag' => $url[3]
        ];
        $result = $this->model->ins_fav($param);
        return [_RESULT => $result];
    }
    
    //유저 rootcode 업데이트
    public function ins_rootcode(){
        $url = getUrlPaths();
        $param = [
            'uuid' => $url[2],
            'rootcode' => $url[3]
        ];
        $result = $this->model->ins_rootcode($param);
        return [_RESULT => $result];
    }
}
