<?php

namespace App\Models;

class PointModel{

    protected $db;
    protected $table;

    function __construct(){
        $this->db = \Config\Database::connect();
        $this->table = 'cctv_point';
    }

    function insert($data){
        $builder = $this->db->table($this->table);
        $builder->insert($data);
        return $this->db->affectedRows();
    }

    function search($where = NULL){
        $builder = $this->db->table($this->table);
        if($where != NULL){
            $query = $builder->getWhere($where);
        }else{
            $query = $builder->get();
        }
        return $query->getResultObject();;
    }
}