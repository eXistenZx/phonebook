<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1" href="index.php">Annuaire</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$router->generate('home');?>">Mes contacts<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$router->generate('contact_create');?>">Ajouter un contact</a>
                </li>
            </ul>
            <form method="GET" action="<?=$router->generate('contacts_search');?>" class="form-inline my-2 my-lg-2">
                <input class="form-control search-input mr-sm-2" type="search" placeholder="Saisir un nom ou un numéro" aria-label="Recherche" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>
