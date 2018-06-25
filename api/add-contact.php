<?php
include('header.php');

$name = $_POST["contact_name"];
$phone = $_POST["contact_phone"];

if ( !empty($name) && !empty($phone) ) {

    if( is_numeric($phone) && strlen($phone) >= 10 ) {
        $sql = $db_connect->prepare("INSERT INTO contacts (contact_id, contact_name, contact_phone) VALUES (NULL, :name, :phone);");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        $return["success"] = true;
        $return["message"] = "Le contact a bien été ajouté";
        $return["results"] = array();
    }	else {
        $return["success"] = false;
        $return["message"] = "Le numéro de téléphone a un format invalide";
        }
    } else {
    $return["success"] = false;
    $return["message"] = "Il manque des infos";
}
echo json_encode($return);
