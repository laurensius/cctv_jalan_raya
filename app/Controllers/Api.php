<?php

namespace App\Controllers;
use App\Models\RegionModel;
use App\Models\PointModel;

class Api extends BaseController{

    public function index(){
        $response = array(
            "code" => 200,
            "message" => "Server live",
            "body" => array(
                "developer" => "Laurensius Dede Suhardiman",
                "company" => "ganeshlabs",
                "companySite" => "https://ganesh.co.id"
            )
        );
        return $this->response->setStatusCode($response["code"])->setJSON($response);
    }

    public function get_region($idRegion = NULL){
        $response = array();
        $rm = new RegionModel();
        $parameter_pencarian = (isset($idRegion)) ? array("idRegion" => $idRegion) : NULL;
        $data_region = $rm->search($parameter_pencarian);
        if(sizeof($data_region) > 0){
            $response = array(
                "code" => 200,
                "message" => "Data ruas jalan / region tersedia",
                "body" => $data_region 
            );
        }else{
            $response = array(
                "code" => 404,
                "message" => "Data ruas jalan / region tidak tersedia",
                "body" => $data_region 
            );
        }
        return $this->response->setStatusCode($response["code"])->setJSON($response);
    }

    public function get_point_list($idRegion = NULL){
        $response = array();
        $pm = new PointModel();
        $parameter_pencarian = (isset($idRegion)) ? array("idRegion" => $idRegion) : NULL;
        $data_point = $pm->search($parameter_pencarian);
        if(sizeof($data_point) > 0){
            $response = array(
                "code" => 200,
                "message" => "Data cctv / stream tersedia",
                "body" => $data_point 
            );
        }else{
            $response = array(
                "code" => 404,
                "message" => "Data cctv / stream tidak tersedia",
                "body" => $data_point 
            );
        }
        return $this->response->setStatusCode($response["code"])->setJSON($response);
    }



}
