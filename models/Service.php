<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Exception;
use PDO;

/**
 * Description of Service
 *
 * @author belal
 */
class Service {

    private $idservice;
    private $name;
    private $description;
    private $db;

    public function __construct() {

        $this->db = Database::getInstance();
    }

    public function createService($name, $description) {
        try {
            $sql = "INSERT INTO `service`(`name`, `description`) VALUES (:name,:description)";
            $req = $this->db->prepare($sql);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->execute();
            $error = $req->errorInfo();
            var_dump($error);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllServices() {
        $sql = 'SELECT * FROM `service`';
        $serviceQuery = $this->db->query($sql);
        return $serviceQuery->fetchAll(PDO::FETCH_OBJ);
    }

}
