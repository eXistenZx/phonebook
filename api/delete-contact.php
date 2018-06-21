<?php
include('header.php');

if( !empty($_POST['contact_id']) ){
	// Si le client a saisi un id
	$sql = $db_connect->prepare("DELETE FROM contacts WHERE contact_id = :id");
	$sql->bindParam(':id', $_POST['contact_id']);
	$sql->execute();

	$return["success"] = true;
	$return["message"] = "Le contact est supprimé";

} else {
	$return["success"] = false;
	$return["message"] = "Il manque des informations";
}
echo json_encode($return);
