<?php $this->layout('layout'); ?>

<div class="container add-container container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <h2>Ajouter un contact</h2>
        </div>
        <?php
        if(!empty($message)): ?>
        <div class="alert alert-warning">
            <?= $message ?>
        </div>
    <?php endif; ?>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Saisissez le nom de votre contact (3 caractères minimum)" pattern="[a-z]{2-20}">
                </div>
                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Saisissez le numéro de votre contact" pattern="[0-9-+s()]*${10,}">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
