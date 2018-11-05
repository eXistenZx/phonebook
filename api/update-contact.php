<?php
include('header.php');

$id = $_POST["id"];
$name = $_POST["name"];
$phone = $_POST["phone"];

if ( !empty($name) && !empty($phone) ) {

    if( is_numeric($phone) && strlen($phone) >= 10 ) {
        $sql = $db_connect->prepare("UPDATE contacts SET contact_name = :name, contact_phone = :phone WHERE contact_id = :id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':name', $name);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        $return["success"] = true;
        $return["message"] = "Le contact a bien été modifié";
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
