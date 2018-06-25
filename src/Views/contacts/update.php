<?php $this->layout('layout'); ?>

<div class="container edit-container container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h2>Modifier un contact</h2>
        </div>
        <?php
        if(!empty($message)): ?>
            <div class="alert alert-warning">
                <?= $message ?>
            </div>
        <?php
        endif; ?>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $contact->getName(); ?>" pattern="[A-z]{2-20}">
                </div>
                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?= $contact->getPhone(); ?>" pattern="[0-9-+s()]*${10,}">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn" class="btn btn-success">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
