<?php
header('Content-Type: application/json');
require 'config.php';

try {
    $db_connect = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    $return["success"] = true;
    $return["message"] = "Connexion à la base de donnée réussie";
} catch(Exception $e) {
    $return["success"] = false;
    $return["message"] = "Connexion à la base de donnée impossible";
}
