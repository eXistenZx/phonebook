<?php $this->layout('layout'); ?>

<!-- content section -->
<div class="container container-fluid">
    <div class="card-header">
        <h5><?= \Phonebook\Controllers\ContactsController::homeSentence() ?></h5>
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
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="name-column">Nom</th>
                    <th class="phone-column">Téléphone</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contacts = \Phonebook\Controllers\ContactsController::search();
                if(!empty($contacts)) {
                    foreach($contacts as $row) { ?>
                    <tr>
                        <td class="name-column"><?= $row['contact_name'] ?></td>
                        <td class="phone-column"><?= $row['contact_phone'] ?></td>
                        <td class="action-column">
                            <a href="<?=$router->generate('contact_update')?>?id=<?= $row['contact_id'] ?>" class="btn btn-info">Modifier</a>
                            <a onclick="return confirm('Êtes vous sûr de vouloir supprimer ce contact ?')" href="<?=$router->generate('contact_delete')?>?id=<?= $row['contact_id'] ?>" class="btn btn-danger">Supprimer</a>
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
