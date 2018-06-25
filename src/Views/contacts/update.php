<?php $this->layout('layout'); ?>

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
            <?php
            endif; ?>
        </div>
    </div>
</div>
