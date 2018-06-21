<?php
header('Content-Type: application/json');
require 'config.php';

// $success = false;
// $data = array();

try {
	//On test la connexion à la base de donnée
    $db_connect = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    $return["success"] = true;
    $return["message"] = "Connexion à la base de donnée réussie";
} catch(Exception $e) {
  $return["success"] = false;
  $return["message"] = "Connexion à la base de donnée impossible";
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	// return_json($success, $data, 'Echec de la connexion à la base de données');
  //   exit();
}

//
// function return_json($success, $message, $data) {
//   $array["success"] = $success;
//   $array["message"] = $message;
//   $array["results"] = $data;
//
//   echo json_encode($data);
// }
