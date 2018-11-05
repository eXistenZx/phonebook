<?php $this->layout('layout'); ?>

<!-- content section -->
<div class="container container-fluid">
    <div class="card-header">
        <h5>Vous avez <span id="span1"></span> <span id="span2"></span> dans votre annuaire</h5>
    </div>

    <?php
    if(!empty($message)): ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $message;
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    endif; ?>

    <form class="form-inline" method="post" action="././api/add-contact.php">
      <label class="sr-only col-4" for="inlineFormInputName2" >Nom</label>
      <input type="text" class="form-control mb-2 mr-sm-2  col-6"  name="name" id="inlineFormInputName2" placeholder="Saisissez le nom de votre contact (3 caractères minimum)" >
      <!-- pattern="[a-z]{2-20}" -->

      <label class="sr-only" for="inlineFormInputGroupUsername2">Numéro de téléphone</label>
      <div class="input-group mb-2 mr-sm-2">
        <input type="text" class="form-control col-12" name="phone" id="inlineFormInputGroupUsername2" placeholder="Saisissez le numéro de votre contact" >
        <!-- pattern="[0-9-+s()]*${10,}" -->
      </div>
      <button type="submit" name="btn" class="btn btn-primary mb-2 col-2">Ajouter</button>
    </form>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="name-column">Nom</th>
                    <th class="phone-column">Téléphone</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                $contacts = \Phonebook\Controllers\ContactsController::search();
                if(!empty($contacts)) {
                    foreach($contacts as $row) { ?>
                    <tr class="contact-line" >
                        <td class="name-column"><?= $row['contact_name'] ?></td>
                        <td class="phone-column"><?= $row['contact_phone'] ?></td>
                        <td class="action-column">
                            <button data-value="<?= $row['contact_id'] ?>"  class="btn btn-info modify-btn">Modifier</button>
                            <button data-value="<?= $row['contact_id'] ?>"  class="btn btn-danger delete-btn">Supprimer</button>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                echo "Aucune entrée...";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
