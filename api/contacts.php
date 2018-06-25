<?php
include('header.php');
print_r($_GET);

if ( !empty($_GET["contact_name"]) ) {
    $sql = $db_connect->prepare("SELECT * FROM contacts WHERE contact_name LIKE :name");
    $sql->bindParam(':name', $_GET["contact_name"]);
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
