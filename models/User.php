<?php
namespace Models;

use PDO;
use Utils\Hydrate;
class User {
    use Hydrate;
    private $lastName;
    private $firstName;
    private $birthDate;
    private $address;
    private $zipCode;
    private $phoneNumber;
    private $idService;
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function getFirstName() {
        return $this->firstName;
    }
    public function getBirthDate() {
        return $this->birthDate;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getZipCode() {
        return $this->zipCode;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getIdService() {
        return $this->idService;
    }
    public function getAllUsers() {
        $sql  = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") birthdate, `address`, `zipCode`, `phone`, `service`.`name` AS service FROM `user` INNER JOIN `service` USING (idService);';        
        $usersRequest = $this->db->query($sql);
        $userList = $usersRequest->fetchAll(PDO::FETCH_OBJ);
        return $userList;
    }
    public function getFilterUser($idService){
        $sql  = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") birthdate, `address`, `zipCode`, `phone`, `service`.`name` AS service FROM `user` INNER JOIN `service` USING (idService) WHERE idService = :idService';        
        $usersRequest = $this->db->preapre($sql);
        $usersRequest->bindValue(':idService', $idService, PDO::PARAM_INT);
        $usersRequest->execute();
        return $usersRequest->fetchAll(PDO::FETCH_OBJ);
    }
}
