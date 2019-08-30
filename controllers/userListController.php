<?php

use Models\Service;
use Models\User;
$User = new User();
$service = new Service();
$serviceList = $service->getAllServices();
$UserList = $User->getAllUsers();
if (isset($_POST['idService']))  {
    $idService = (int)$_POST['idService'];
    if (!empty($idService)){
        $UserList = $user->getFilterUser($idService);
    }
    exit(json_encode($UserList));
}
$pageTitle = 'Liste des utilisateurs';
require_once __DIR__.'/../views/userList.php';
