<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <title>PhoneBook</title>
    <link rel="stylesheet" href="<?=$baseUrl?>/public/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="wrapper">
            <?php $this->insert('partials/header') ?>
            <main class="container">
                <?=$this->section('content')?>
            </main>
                <?php $this->insert('partials/footer') ?>
        </div>
        <script type="text/javascript">
        var BASE_PATH = "<?=$baseUrl?>";
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
