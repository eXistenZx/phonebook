<?php
include 'header.php';
require_once "database.php";

$contacts = $db_connect->query("SELECT * FROM contacts ORDER BY contact_name ASC");
$total_contacts = $contacts->rowCount();

if(isset($_GET['q']) AND !empty($_GET['q'])) {
  $q = htmlspecialchars($_GET['q']);
  $contacts = $db_connect->query("SELECT * FROM contacts WHERE contact_name LIKE '%$q%' OR contact_phone LIKE '%$q%' ORDER BY contact_name ASC");

  if($contacts->rowCount() == 0) {
    $contacts = $db_connect->query("SELECT * FROM contacts WHERE CONCAT(contact_name, contact_phone) LIKE '%$q%' OREDER BY contact_name ASC");
  }
}
?>
<!-- content section -->
<div class="container">
	<div class="card-header">
		<h5><?php echo "Vous avez " . $total_contacts . " contacts dans votre sélection" ?></h5>
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
        <?php
        if($contacts->rowCount() > 0) { ?>
          <?php
          while($a = $contacts->fetch()) { ?>
          <tr>
            <td><?= $a['contact_name'] ?></td>
            <td><?= $a['contact_phone'] ?></td>
            <td>
              <a href="edit-contact.php?id=<?= $a['contact_id'] ?>" class="btn btn-info">Modifier</a>
              <a onclick="return confirm('Êtes vous sûr de vouloir supprimer ce contact ?')" href="delete-contact.php?id=<?= $a['contact_id'] ?>" class="btn btn-danger">Supprimer</a>
            </td>
          </tr>
          <?php
          }
        }
        else { ?>
          Aucun résultat pour: <?= $q ?>...
        <?php
        } ?>
			</tbody>
		</table>
	</div>
</div>

<?php	require 'footer.php'; ?>
