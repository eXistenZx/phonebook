<?php
include 'header.php';
require_once "database.php";

$message = '';

if ( isset($_POST['name']) && isset($_POST['phone']) ) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$sql = 'INSERT INTO contacts(contact_name, contact_phone) VALUES (:name, :phone)';
	$statement = $db_connect->prepare($sql);

	if ($statement->execute(array(
		':name' => $name,
		':phone' 	=> $phone
		)))
		{
		$message = 'Contact ajouté';
		header("Refresh: 0.5; url=index.php");
	}
}
?>

<div class="container">
	<div class="card text-center">
		<div class="card-header">
			<h2>Ajouter un contact</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="name">Nom</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Saisissez le nom de votre contact (3 caractères minimum)" pattern="[a-z]{3-20}">
				</div>
				<div class="form-group">
					<label for="phone">Numéro de téléphone</label>
					<input type="text" name="phone" id="phone" class="form-control" placeholder="Saisissez le numéro de votre contact" pattern="[0-9]{10}">
				</div>
				<div class="form-group">
					<button type="submit" name="btn" class="btn btn-primary">Ajouter</button>
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
