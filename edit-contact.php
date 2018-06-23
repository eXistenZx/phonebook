<?php
include 'header.php';
require_once "database.php";

$message = '';
// Get ID from URL
$id = $_GET['id'];
// Request to get contact infos object
$sql = 'SELECT * FROM contacts WHERE contact_id=:id';
$statement = $db_connect->prepare($sql);
$statement->execute([':id' => $id]);
$contact = $statement->fetch(PDO::FETCH_OBJ);

// Update request if infos are informed
if ( isset($_POST['name']) && isset($_POST['phone']) ) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$sql = 'UPDATE contacts SET contact_name=:name, contact_phone=:phone WHERE contact_id=:id';
	$statement = $db_connect->prepare($sql);

	if ($statement->execute(array(
		':id'   => $id,
		':name' => $name,
		':phone' 	=> $phone
		)))
		{
		$message = 'Modification effectuée';
		// redirect to index.php page after 0.5sec to read confirm message
		header("Refresh: 0.5; url=index.php");
	}
}
?>

<div class="container edit-container container-fluid">
	<div class="card text-center">
		<div class="card-header">
			<h2>Modifier un contact</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="name">Nom</label>
					<input type="text" name="name" id="name" class="form-control" value="<?= $contact->contact_name; ?>" pattern="[A-z]{3-20}">
				</div>
				<div class="form-group">
					<label for="phone">Numéro de téléphone</label>
					<input type="tel" name="phone" id="phone" class="form-control" value="<?= $contact->contact_phone; ?>" pattern="[0-9]{10,}">
				</div>
				<div class="form-group">
					<button type="submit" name="btn" class="btn btn-success">Valider</button>
				</div>
			</form>
			<?php
			if(!empty($message)): ?>
				<div class="alert alert-success">
					<?= $message ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
