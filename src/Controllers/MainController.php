<?php

namespace Phonebook\Controllers;

class MainController extends CoreController
{

    // Affiche la page d'accueil
    public function home() {

        // On récupère la liste des communautés
        // afin de pouvoir les transmettre au template
        $contacts = \Phonebook\Models\ContactsModel::findAll();

        // On affiche le template "home.php"
        echo $this->templates->render(
            'main/home',
            [
                'title' => 'Phonebook',
                'contacts' => $contacts
            ]
        );
    }

    // Affiche la page 404
    public function error404() {

        echo $this->templates->render('main/404');
    }
}
