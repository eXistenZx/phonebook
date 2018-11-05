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
        <script
          src="https://code.jquery.com/jquery-3.3.1.js"
          integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./src/utils/app.js"></script>
    </body>
</html>
