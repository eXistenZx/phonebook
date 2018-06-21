<?php
require_once "database.php";

// Get ID from URL
$id = $_GET['id'];
// Delete request
$sql = "DELETE FROM contacts WHERE contact_id=:id";
$statement = $db_connect->prepare($sql);
if ($statement->execute([':id' => $id])) {
	// redirect to index.php page
	header("Refresh: 0;url=index.php");
}
