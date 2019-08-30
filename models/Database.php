<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Exception;
use PDO;
use const DSN;
use const PASSWORD;
use const USER;

/**
 * Description of Database
 *
 * @author belal
 */
class Database {
    private $db;
    private static $instance = null;

    private function __construct() {
        try {
            $this->db = new \PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    public static function getInstance(){
        if (self::$instance == null){
           self::$instance = new self();
        }
        return self::$instance;
    }
    public function query($query){
        return $this->db->query($query);
    }
    public function prepare($query){
        return $this->db->prepare($query);
    }
}
