<?php
include('header.php');

if ( !empty($_POST["contact_name"]) ) {
  $sql = $db_connect->prepare("SELECT * FROM contacts WHERE contact_name LIKE :name");
  $sql->bindParam(':name', $_POST["contact_name"]);
  $sql->execute();
} else {
  $sql = $db_connect->prepare("SELECT * FROM contacts");
  $sql->execute();
}

$results = $sql->fetchAll(PDO::FETCH_ASSOC);

$return["success"] = true;
$return["message"] = "Liste des contacts";
$return["results"]["nb"] = count($results);
$return["results"]["contacts"] = $results;

echo json_encode($return);


// $success = false;
// $data = array();
//
// function reponse_json($success, $data, $msgErreur=NULL) {
// 	$array['success'] = $success;
// 	$array['msg'] = $msgErreur;
// 	$array['result'] = $data;
// 	echo json_encode($data);
// }
