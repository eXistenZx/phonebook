<?php
include 'header.php';
require_once "database.php";

// Request to get all contacts
$sql = "SELECT * FROM contacts ORDER BY contact_name ASC";
$sql_all_contacts = $db_connect->query($sql);
// Get number of contacts
$total_contacts = $sql_all_contacts->rowCount();

// Get list of contacts in an object
$statement = $db_connect->prepare($sql);
$statement->execute();
$contacts = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!-- content section -->
<div class="container">
	<div class="card-header">
		<h5><?php echo "Vous avez " . $total_contacts . " contacts dans votre annuaire" ?></h5>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Téléphone</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact): ?>
					<tr>
						<td><?= $contact->contact_name; ?></td>
						<td><?= $contact->contact_phone; ?></td>
						<td>
							<a href="edit-contact.php?id=<?= $contact->contact_id ?>" class="btn btn-info">Modifier</a>
							<a onclick="return confirm('Êtes vous sûr de vouloir supprimer ce contact ?')" href="delete-contact.php?id=<?= $contact->contact_id ?>" class="btn btn-danger">Supprimer</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php	require 'footer.php'; ?>
