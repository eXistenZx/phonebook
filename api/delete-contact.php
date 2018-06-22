<?php
include('header.php');

if( !empty($_GET['contact_id']) ){
	// If client entry ID
	$sql = $db_connect->prepare("DELETE FROM contacts WHERE contact_id = :id");
	$sql->bindParam(':id', $_GET['contact_id']);
	$sql->execute();

	$return["success"] = true;
	$return["message"] = "Le contact est supprimé";

} else {
	$return["success"] = false;
	$return["message"] = "Il manque des informations";
}
echo json_encode($return);
