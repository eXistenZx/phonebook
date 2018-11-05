<?php
include('header.php');

if( !empty($_GET['id'])){
    $sql = $db_connect->prepare("DELETE FROM contacts WHERE contact_id = :id");
    $sql->bindParam(':id', $_GET['id']);
    $sql->execute();
    $response["success"] = true;
    $response["message"] = "Le contact est supprimé";
} else {
    $response["success"] = false;
    $response["message"] = "Erreur";
}
echo json_encode($response);
